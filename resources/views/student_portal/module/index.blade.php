@extends('layouts.student_portal.layout')
@section('main')

<div class="container mx-auto px-4 ">
    <!-- Course Enrollment Section -->
    <h2 class="text-2xl font-bold mb-6">Course Enrollment</h2>

    <!-- Available Courses for Enrollment -->
    <div>
        <h3 class="text-lg font-semibold mb-4">Available Courses for Enrollment</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse($data as $course)
            <div class="bg-white rounded-lg p-4 border border-gray-200">
                <div class="flex justify-between items-start">
                    <div class="text-xl">
                        {{ $course->course }}
                    </div>

                </div>
                <small class="text-gray-500">
                    {{ $course->description }}
                </small>
                <!-- Enroll Button -->
                <!-- { { route ('student.courses.enroll', $course->id) } } -->
                <form action="{{ route('module.store')}}" method="POST">
                    @csrf
                    <button type="submit"
                        class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                        Enroll in Course
                    </button>
                </form>
            </div>
            @empty
            <div class="col-span-full text-center py-4 text-gray-500">
                No available courses for enrollment.
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection