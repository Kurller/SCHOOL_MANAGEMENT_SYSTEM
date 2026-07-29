<?php

namespace App\Services;

use App\Models\Attendance;

class AttendanceTool
{
    /**
     * Total attendance records
     */
    public function count()
    {
        return Attendance::count();
    }

    /**
     * Attendance records for a student
     */
    public function studentAttendance($studentId)
    {
        return Attendance::with('classRoom')
            ->where('student_id', $studentId)
            ->orderBy('date', 'desc')
            ->get();
    }

    /**
     * Attendance summary for a student
     */
    public function summary($studentId)
    {
        return [
            'present' => Attendance::where('student_id', $studentId)
                ->where('status', 'Present')
                ->count(),

            'absent' => Attendance::where('student_id', $studentId)
                ->where('status', 'Absent')
                ->count(),

            'late' => Attendance::where('student_id', $studentId)
                ->where('status', 'Late')
                ->count(),
        ];
    }

    /**
     * Today's attendance
     */
    public function today()
    {
        return Attendance::with([
                'student',
                'classRoom'
            ])
            ->whereDate('date', today())
            ->get();
    }

    /**
     * Students absent today
     */
    public function absentToday()
    {
        return Attendance::with('student')
            ->whereDate('date', today())
            ->where('status', 'Absent')
            ->get();
    }

    /**
     * Students present today
     */
    public function presentToday()
    {
        return Attendance::with('student')
            ->whereDate('date', today())
            ->where('status', 'Present')
            ->get();
    }
}