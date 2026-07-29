<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SchoolAIService;
use App\Services\AIIntentService;
use App\Services\ResultTool;
use App\Services\StudentTool;
use App\Services\AttendanceTool;
use App\Models\Student;
use App\Services\TeacherTool;

class ChatController extends Controller
{
    public function ask(
    Request $request,
    SchoolAIService $ai,
    AIIntentService $intent,
    ResultTool $resultTool,
    StudentTool $studentTool,
    TeacherTool $teacherTool,
    AttendanceTool $attendanceTool
){

        $request->validate([
            'message' => 'required|string',
        ]);


        $message = $request->message;


        // Detect what user is asking
        $type = $intent->detect($message);

        if ($type === 'attendance') {

    // Find student
    $student = $this->findStudent($message);

    if (!$student) {
        return response()->json([
            'success' => true,
            'reply' => 'Student not found.'
        ]);
    }

    $context = [
        'student' => [
            'name' => $student->first_name . ' ' . $student->last_name,
        ],
        'summary' => $attendanceTool->summary($student->id),
        'attendance' => $attendanceTool->studentAttendance($student->id),
    ];

    $reply = $ai->ask(
        $message,
        json_encode($context, JSON_PRETTY_PRINT)
    );

    return response()->json([
        'success' => true,
        'reply' => $reply,
    ]);
}

if ($type === 'student_info') {

    $student = $this->findStudent($message);

    if (!$student) {
        return response()->json([
            'success' => true,
            'reply' => 'Student not found.'
        ]);
    }

    $context = [
        'student' => $student
    ];

    $reply = $ai->ask(
        $message,
        json_encode($context, JSON_PRETTY_PRINT)
    );

    return response()->json([
        'success' => true,
        'reply' => $reply
    ]);
}
        /*
        |--------------------------------------------------------------------------
        | Report Card / Result Request
        |--------------------------------------------------------------------------
        */

        if ($type === 'report_card') {


            // Extract student name from message
            preg_match(
                '/report card (?:for|of)?\s+(.+)/i',
                $message,
                $matches
            );


            $studentName = trim($matches[1] ?? '');



            $student = $resultTool->reportCard($studentName);



            if (!$student) {

                return response()->json([
                    'success' => true,
                    'reply' => "Student {$studentName} was not found."
                ]);

            }



            $context = [

                'student' => [

                    'name' =>
                        $student->first_name .
                        ' ' .
                        $student->last_name,


                    'admission_number' =>
                        $student->admission_number,

                ],


                'results' => $student->results->map(function ($result) {

                    return [

                        'subject' =>
                            optional($result->subject)->name,


                        'class' =>
                            optional($result->schoolClass)->name,


                        'term' =>
                            $result->term,


                        'session' =>
                            $result->session,


                        'ca_score' =>
                            $result->ca_score,


                        'exam_score' =>
                            $result->exam_score,


                        'total_score' =>
                            $result->total_score,


                        'grade' =>
                            $result->grade,


                        'remark' =>
                            $result->remark,


                        'position' =>
                            $result->position,

                    ];

                })->values()

            ];



            $reply = $ai->ask(
                $message,
                json_encode($context, JSON_PRETTY_PRINT)
            );



            return response()->json([

                'success' => true,

                'reply' => $reply

            ]);

        }
/*
|--------------------------------------------------------------------------
| Student Requests
|--------------------------------------------------------------------------
*/
if ($type === 'students') {

    $student = $this->findStudent($message);

    if ($student) {

        $context = [

            'student' => [

                'id' => $student->id,

                'name' => $student->first_name . ' ' . $student->last_name,

                'admission_number' => $student->admission_number,

                'class' => optional($student->schoolClass)->name,

                'email' => $student->email,

                'phone' => $student->phone,

                'parents' => $student->parents->map(function ($parent) {
                    return [
                        'name' => trim(($parent->first_name ?? '') . ' ' . ($parent->last_name ?? '')),
                        'phone' => $parent->phone,
                        'email' => $parent->email,
                    ];
                })->values(),

            ],

        ];

    } else {

        // No specific student mentioned, return all students
        $context = [

            'total_students' => $studentTool->count(),

            'students' => $studentTool->all(),

        ];

    }

    $reply = $ai->ask(
        $message,
        json_encode($context, JSON_PRETTY_PRINT)
    );

    return response()->json([
        'success' => true,
        'reply' => $reply,
    ]);
}        /*
        |--------------------------------------------------------------------------
        | General AI Question
        |--------------------------------------------------------------------------
        */

        $reply = $ai->ask(
            $message,
            ''
        );


        return response()->json([

            'success' => true,

            'reply' => $reply

        ]);

    }
private function findStudent(string $message)
{
    $messageLower = strtolower($message);

    return Student::with([
        'parents',
        'schoolClass',
        'results.subject',
        'results.schoolClass'
    ])->get()->first(function ($student) use ($messageLower) {

        $fullName = strtolower($student->first_name . ' ' . $student->last_name);

        return str_contains($messageLower, strtolower($student->first_name))
            || str_contains($messageLower, strtolower($student->last_name))
            || str_contains($messageLower, $fullName);
    });
}
}