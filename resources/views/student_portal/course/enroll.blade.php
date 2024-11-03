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
        </ul>

    </div>
</section>

@endsection