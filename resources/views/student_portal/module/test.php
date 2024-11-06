@extends('layouts.student_portal.layout')
@section('main')

<section>
    @if(Session::has('success'))
    <div class="  mr-2 ml-2">
        <span type="text" class="border-8 bg-green-600 text-white mb-2"
            id="type-error">{{Session::get('success')}}
        </span>
    </div>
    @endif
    <div class="flex justify-between">
        <h2 class="font-semibold text-xl my-3 text-gray-800 leading-tight">
            {{ __('Grant module') }}
        </h2>
    </div>
    <div>
        <form action="{{ route('student.course.enroll') }}" method="POST" class="mb-10">
            @csrf
            <label for="course_id">Course ID:</label>
            <input type="text" name="course_id" placeholder="ID" required>
            <button type="submit" class="bg-green-800 text-white px-2 py-2">Enter</button>
            <p class="mt-1 truncate text-xs leading-3 text-gray-500">Course ID will be given by your Teacher.</p>
        </form>
        
        <ul role="list" class="divide-y divide-gray-100">

            <li class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="" alt="">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">
                            <a href=""> Course</a>
                        </p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">course id</p>
                    </div>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <button class=" bg-green-800 text-white px-4 py-4"> + </button>
                    <!-- <p class="text-sm leading-6 text-gray-900">course</p>
                    <p class="mt-1 text-xs leading-5 text-gray-500"><time datetime="2023-01-23T13:23Z"></time></p> -->
                </div>
            </li>
            <!-- @en dforeach -->
            <!-- @ --endif -->
            <!-- <li class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">Michael Foster</p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">michael.foster@example.com</p>
                    </div>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <p class="text-sm leading-6 text-gray-900">Co-Founder / CTO</p>
                    <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time></p>
                </div>
            </li>
            <li class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">Dries Vincent</p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">dries.vincent@example.com</p>
                    </div>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <p class="text-sm leading-6 text-gray-900">Business Relations</p>
                    <div class="mt-1 flex items-center gap-x-1.5">
                        <div class="flex-none rounded-full bg-emerald-500/20 p-1">
                            <div class="h-1.5 w-1.5 rounded-full bg-emerald-500"></div>
                        </div>
                        <p class="text-xs leading-5 text-gray-500">Online</p>
                    </div>
                </div>
            </li>
            <li class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">Lindsay Walton</p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">lindsay.walton@example.com</p>
                    </div>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <p class="text-sm leading-6 text-gray-900">Front-end Developer</p>
                    <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time></p>
                </div>
            </li>
            <li class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">Courtney Henry</p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">courtney.henry@example.com</p>
                    </div>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <p class="text-sm leading-6 text-gray-900">Designer</p>
                    <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time></p>
                </div>
            </li>
            <li class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">Tom Cook</p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">tom.cook@example.com</p>
                    </div>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <p class="text-sm leading-6 text-gray-900">Director of Product</p>
                    <div class="mt-1 flex items-center gap-x-1.5">
                        <div class="flex-none rounded-full bg-emerald-500/20 p-1">
                            <div class="h-1.5 w-1.5 rounded-full bg-emerald-500"></div>
                        </div>
                        <p class="text-xs leading-5 text-gray-500">Online</p>
                    </div>
                </div>
            </li> -->
        </ul>

    </div>
</section>


        <!-- Currently Enrolled Courses -->
        <div class="mb-8">
            <h3 class="text-lg font-semibold mb-4">Currently Enrolled Courses</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- @f orelse($enrolledCourses as $course) -->
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


@endsection