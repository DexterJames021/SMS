<?php

namespace App\Http\Controllers;

$token = 'bb29f3e6dfbb925813aadb5dffaa9da5'; // Replace with your actual token
use App\Models\Admission;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client; // For making HTTP requests to the LMS API
use Illuminate\Support\Facades\Http; // Import the Http facade


class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $data = Admission::get();
        return view('admin.admission.lists')
                ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'middlename' => 'required',
            'course' => 'required',
            'email' => 'required|email|unique:students,email',
            'contactnumber' => 'required',
            'country' => 'required',
            'streetaddress' => 'required',
            'city' => 'required',
            'fathername' => 'required',
            'mothername' => 'required',
            'guardiancontactnumber' => 'required',
        ]);

        // Check if student already exists with the same name and email
        $existingStudent = Admission::where('firstname', $request->firstname)
            ->where('lastname', $request->lastname)
            ->where('email', $request->email)
            ->first();

        if ($existingStudent) {
            return response()->json(['message' => 'Student with the same details already exists.'], 409);
        }

        // Create the student record
        $student = Admission::create($validatedData);

        // Create a user record for SMS login access
        $user = User::create([
            'name' => $student->firstname . ' ' . $student->lastname,
            'email' => $student->email,
            'password' => bcrypt('@Test12345'), // Set your default password or generate it dynamically
        ]);

        // Generate Moodle account details
        $username = $student->firstname . $student->id;
        // $password = strtoupper(substr($student->firstname, 0, 1)) . strtoupper(substr($student->lastname, 0, 1)) . 'SN' . $student->id;

        $moodleData = [
            'users[0][username]' => $username,
            'users[0][password]' => "@Test123",
            'users[0][firstname]' => $student->firstname,
            'users[0][lastname]' => $student->lastname,
            'users[0][email]' => $student->email,
        ];

        //$token = 'bb29f3e6dfbb925813aadb5dffaa9da5'; // own pc Replace with your actual token
        //$token = 'd417306f6be52a3ae4b01be54e3b291f'; // asly pc Replace with your actual token
        $token = env('MOODLE_API_TOKEN');
        // $serverUrl = 'http://localhost/moodle_sms/moodle/webservice/rest/server.php';
        $serverUrl = env('MOODLE_API_URL');
        $functionName = 'core_user_create_users';
        $moodleUrl = "{$serverUrl}?wstoken={$token}&wsfunction={$functionName}&moodlewsrestformat=json";

        // Send the request using Laravel's HTTP client with form URL-encoding
        $response = Http::asForm()->post($moodleUrl, $moodleData);

        // Check the response
        if ($response->successful()) {
            // User created successfully in Moodle
            //TODO add user
            return response()->json(['message' => 'User created successfully', 'data' => $response->json()]);
        } else {
            // Handle error
            return response()->json(['message' => 'Failed to create user', 'error' => $response->json()], $response->status());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        Admission::findOrFail($student);
        return view();
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
