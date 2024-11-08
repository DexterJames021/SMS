<?php

namespace App\Http\Controllers\studentPortal;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http; // Import the Http facade
use Illuminate\Support\Facades\Log;


class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(auth()->id());
        $userId = auth::user()->id;

        // Assuming authenticated user is a student
        $student = Admission::where('user_id', $userId)->first();

        if ($student) {
            // Get only the courses that match the student's enrolled course
            $courses = Course::where('id', $student->course_id)->get();
        } else {
            // Handle case where no student record is found (optional)
            $courses = collect(); // Empty collection
        }

        return view('student_portal.module.index', ['data' => $courses]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $userid = Auth::user()->id;
            $admission = Admission::where('user_id', $userid)->first();

            if(!$admission || !$admission->moodle_id){
                return redirect()->back()->with('message', 'ID is not Define');
            }
            
            
            $moodle_id = $admission->moodle_id;
            $courseid = $request->input('course_id');
            $course = Course::findOrFail($courseid);

            if (!$course->course_mdl_id) {
                return redirect()->route('module.index')->with('message', 'Moodle Course is missing');
            }

            $data = [
                "enrolments" => [
                    [
                        'roleid' => 5,
                        'courseid' => $course->course_mdl_id,
                        'userid' => $moodle_id,
                    ]
                ]
            ];

            $moodleUrl = 'http://localhost/moodle_sms/moodle/webservice/rest/server.php?wstoken=bb29f3e6dfbb925813aadb5dffaa9da5&wsfunction=enrol_manual_enrol_users&moodlewsrestformat=json';

            $response = Http::asForm()->post($moodleUrl, $data);

            if (!$response->successful()) {
                Log::error('Moodle API error: ' . $response->status() . ' - ' . $response->body());
                throw new \Exception('Failed');
            } else {
                Log::info('Moodle API info: ' . $response->status() . ' - ' . $response->body());
            }

            // Check if the enrollment was successful
            if ($response->successful()) {
                // return response()->json(['message'=> $response->getBody()]);
                return redirect()->route('module.index')->with('message', 'You have been successfully enrolled in the course!');
            } else {
                // return response()->json(['message'=> $response->getBody()]);
                return redirect()->route('module.index')->with('message', 'Moodle API info: ' . $response->status() . ' - ' . $response->body());
            }
        } catch (\Exception $e) {

            return redirect()->route('admission')
                ->with(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
