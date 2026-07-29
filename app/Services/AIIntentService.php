<?php

namespace App\Services;

class AIIntentService
{

    public function detect($message)
    {

        $message = strtolower($message);


        // Report card requests
        if (
            str_contains($message, 'report card') ||
            str_contains($message, 'result') ||
            str_contains($message, 'grade') ||
            str_contains($message, 'score')
        ) {

            return 'report_card';

        }


        // Student requests
        if (
            str_contains($message, 'student') ||
            str_contains($message, 'students') ||
            str_contains($message, 'pupil') ||
            str_contains($message, 'pupils') ||
            str_contains($message, 'class list') ||
            str_contains($message, 'list all')
        ) {

            return 'students';

        }
        // Attendance requests
if (
    str_contains($message, 'attendance') ||
    str_contains($message, 'present') ||
    str_contains($message, 'absent') ||
    str_contains($message, 'late')
) {
    return 'attendance';
}
// Student information
if (
    str_contains($message, 'information about') ||
    str_contains($message, 'tell me about') ||
    str_contains($message, 'details of') ||
    str_contains($message, 'who is') ||
    str_contains($message, 'profile')
) {
    return 'student_info';
}


        // Teacher requests
        if (
            str_contains($message, 'teacher') ||
            str_contains($message, 'teachers')
        ) {

            return 'teachers';

        }


        // Fee requests
        if (
            str_contains($message, 'fee') ||
            str_contains($message, 'payment')
        ) {

            return 'fees';

        }
        


        return 'general';

    }

}