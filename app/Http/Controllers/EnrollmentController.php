<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Facades\Http;

class EnrollmentController extends Controller
{
    public function enrollCourse(Request $request)
    {
        // Validate the request
        $request->validate([
            'course_id' => 'required|exists:courses,id', // Ensure the course exists in your SMS
        ]);

        $courseId = $request->input('course_id');
        $student = auth('student')->user()->student;

        // Prepare data to send to Moodle
        $moodleData = [
            'enrolments[0][roleid]' => 5, // Student role ID in Moodle
            'enrolments[0][userid]' => $student->id, // Moodle user ID for the student
            'enrolments[0][courseid]' => $courseId,
            'enrolments[0][timestart]' => time(),
            'enrolments[0][timeend]' => 0,
            'enrolments[0][suspend]' => 0
        ];

        $token = env('MOODLE_API_TOKEN');
        $serverUrl = env('MOODLE_API_URL') . "/webservice/rest/server.php";
        $moodleUrl = "{$serverUrl}?wstoken={$token}&wsfunction=enrol_manual_enrol_users&moodlewsrestformat=json";

        // Send enrollment request to Moodle
        $response = Http::asForm()->post($moodleUrl, $moodleData);

        if ($response->successful()) {
            return redirect()->back()->with('success', 'You have been successfully enrolled in the course.');
        } else {
            return redirect()->back()->withErrors(['error' => 'Failed to enroll in course. Please try again.']);
        }
    }
}
