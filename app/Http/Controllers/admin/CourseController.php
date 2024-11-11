<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Course::all();
        return view('admin.courses.index')->with('courses', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->successful());
        // $validated = $request->validate([
        //     'course'=> 'required|string',
        //     'course_mdl_id'=> 'required|numeric',
        //     'enrollment_key'=> 'required|string',
        //     'description'=> 'nullable|string',
        // ]);
        Course::create($request->all());
        return redirect()->route('courses.index')->with('message','Successful addeds');
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
        $data = Course::find($id);
        return view('admin.courses.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([]);
        $post = Course::find($id);
        $post->update($request->all());
        return redirect()->route('courses.index')->with('message', 'Edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::find($id);
        $course->delete();
        return redirect()->route('courses.index')->with('message', 'Delete successfully');
    }
}
