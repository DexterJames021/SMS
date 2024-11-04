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
        return view('admission.create');
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
            'course' => 'required|string',
            'email' => 'required|email|unique:students,email',
            'contactnumber' => 'required|string|unique:students,contactnumber',
            'country' => 'required|string',
            'city' => 'required|string',
            'guardiancontactnumber' => 'required|string',
        ]);

        // Create User
        $user = User::create([
            'name' => "{$validatedData['firstname']} {$validatedData['lastname']}",
            'email' => $validatedData['email'],
            'password' => bcrypt('@Test12345'),
        ]);

        // Create Student
        $student = Student::create([
            'email' => $validatedData['email'],
            'contactnumber' => $validatedData['contactnumber'],
            'course' => $validatedData['course'],
        ]);

        // Create Admission with foreign keys linking to User and Student
        $admission = Admission::create(array_merge($validatedData, [
            'user_id' => $user->id,
            'student_id' => $student->id,
        ]));

        // Moodle account creation data
        $moodleData = [
            'users[0][username]' => "{$validatedData['firstname']}{$student->id}",
            'users[0][password]' => '@Test123',
            'users[0][firstname]' => $validatedData['firstname'],
            'users[0][lastname]' => $validatedData['lastname'],
            'users[0][email]' => $validatedData['email'],
        ];

        // Send request to Moodle API to create the account
        $response = Http::asForm()->post(
            env('MOODLE_API_URL') . '?wstoken=' . env('MOODLE_API_TOKEN') . '&wsfunction=core_user_create_users&moodlewsrestformat=json',
            $moodleData
        );

        if ($response->successful()) {
            return response()->json(['message' => 'Admission and Moodle account created successfully.']);
        } else {
            return response()->json(['message' => 'Failed to create Moodle account.'], 500);
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
