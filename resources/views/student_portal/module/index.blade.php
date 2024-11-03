@extends('layouts.student_portal.layout')
@section('main')

<div class="container mx-auto px-4 py-8">
    <!-- Course Enrollment Section -->
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-bold mb-6">Course Enrollment</h2>

        <!-- Currently Enrolled Courses -->
        <div class="mb-8">
            <h3 class="text-lg font-semibold mb-4">Currently Enrolled Courses</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- @ forelse($enrolledCourses as $course) -->
                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                    <div class="flex justify-between items-start">
                        <div>
                            <!-- <h4 class="font-medium text-gray-900">{ { $ course-> name } }</h4>
                            <p class="text-sm text-gray-600">Code: { { $ course-> code } }</p>
                            <p class="text-sm text-gray-600">Semester: { { $ course-> semester } }</p> -->
                        </div>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Enrolled
                        </span>
                    </div>
                    <!-- Moodle Access Button -->
                    <!-- { { $ course-> moodle_url } } -->
                    <a href="" target="_blank"

                        class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                        Access Course in Moodle
                        <svg class="ml-2 -mr-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                </div>
                <!-- @ empty -->
                <div class="col-span-full text-center py-4 text-gray-500">
                    No courses enrolled yet.
                </div>
                <!-- @ endforelse -->
            </div>
        </div>

        <!-- Available Courses for Enrollment -->
        <div>
            <h3 class="text-lg font-semibold mb-4">Available Courses for Enrollment</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- @ forelse($availableCourses as $course) -->
                <div class="bg-white rounded-lg p-4 border border-gray-200">
                    <div class="flex justify-between items-start">
                        <div>

                        </div>
                    </div>
                    <!-- Enroll Button -->
                    <!-- { { route ('student.courses.enroll', $course->id) } } -->
                    <form action="" method="POST">
                        @csrf
                        <button type="submit"
                            class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                            Enroll in Course
                        </button>
                    </form>
                </div>
                <!-- @e mpty -->
                <div class="col-span-full text-center py-4 text-gray-500">
                    No available courses for enrollment.
                </div>
                <!-- @e ndforelse -->
            </div>
        </div>
    </div>
</div>
@endsection