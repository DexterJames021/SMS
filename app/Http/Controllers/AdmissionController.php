<?php

namespace App\Http\Controllers;

$token = 'bb29f3e6dfbb925813aadb5dffaa9da5'; // Replace with your actual token
use App\Models\Admission;
use App\Models\Student;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use GuzzleHttp\Client; // For making HTTP requests to the LMS API
use Illuminate\Support\Facades\Http; // Import the Http facade
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Admission::get();
        return view('admin.admission.lists')
            ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $data = Course::with('student')->get();
        $data = Course::all();
        return view('admission.create')->with('courses', $data);
        // return view('admission.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email',
            'course_id' => 'required|exists:courses,id',
            'contactnumber' => 'required|string',
            'country' => 'required|string',
            'streetaddress' => 'nullable|string',
            'city' => 'required|string',
            'fathername' => 'nullable|string',
            'mothername' => 'nullable|string',
            'guardiancontactnumber' => 'required|numeric',
        ]);

        DB::beginTransaction();

        try {
            // Create Student
            $student = Student::create([
                // 'email' => $validatedData['email'],
                'contactnumber' => $validatedData['contactnumber'],
                'course_id' => $validatedData['course_id'],
            ]);

            // Create User
            $user = User::create([
                'name' => "{$validatedData['firstname']} {$validatedData['lastname']}",
                'email' => $validatedData['email'],
                'password' => bcrypt('@Student2024'),
            ]);

            // Create Admission
            $admission = Admission::create(array_merge([
                'user_id' => $user->id,
                'student_id' => $student->id,
                'course_id' => $validatedData['course_id'],
            ], $validatedData));

            // Moodle account creation data
            $moodleData = [
                'users' => [
                    [
                        'username' => "{$validatedData['lastname']}{$student->id}",
                        'password' => '@Student2024',
                        'firstname' => $validatedData['firstname'],
                        'lastname' => $validatedData['lastname'],
                        'email' => $validatedData['email'],
                    ]
                ]
            ];

            // $moodleApiUrl = env('MOODLE_API_URL') .'?wstoken='. env('MOODLE_API_TOKEN') .'&wsfunction=core_user_create_users&moodlewsrestformat=json';
            $moodleApiUrl = 'http://localhost/moodle_sms/moodle/webservice/rest/server.php?wstoken=bb29f3e6dfbb925813aadb5dffaa9da5&wsfunction=core_user_create_users&moodlewsrestformat=json';


            Log::info('Moodle API URL: ' . $moodleApiUrl);
            Log::info('Moodle Data: ' . json_encode($moodleData));

            // Send request to Moodle
            $response = Http::asForm()->post($moodleApiUrl, $moodleData);
            
            $moodleResponse = $response->json();
            $moodleUser = $moodleResponse[0]['username'];

            Log::info("Moodle username: " . $moodleUser);

            if ($response->successful()) {
                Log::info('Moodle API info: ' . $response->status() . ' - ' . $response->body());

                if (isset($moodleResponse[0]['id'])) {
                    $moodleUserId = $moodleResponse[0]['id'];
    
                    // Update the admission with Moodle user ID
                    $admission->update(['moodle_id' => $moodleUserId]);
                }else {
                    throw new \Exception('Moodle user creation failed. No user ID returned. ');
                }

            } else {
                Log::error('Moodle API error: ' . $response->status() . ' - ' . $response->body());
                throw new \Exception('Failed to create Moodle account');
            }

            DB::commit();

            return redirect()->route('admission')
                ->with(['message' => 'Admission created successfully.','user'=> $moodleUser,'pass'=> '@Student2024']);
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('admission')
                ->with(['error' => 'An error occurred: Contact admin office' . $e->getMessage()]);
        }
    }




    public function success()
    {
        return view('admission.success');
    }


    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        // Admission::findOrFail($student);
        // return view();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Student $student, Student $student)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Admission $admission)
    // {
    //     //
    // }
}
