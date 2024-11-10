@extends('layouts.admin.layout')
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
            {{ __('Student Records') }}
        </h2>
        <!-- <a href="{{ route ('students.create')}}" class="">
            <button class=" bg-blue-500 items-end hover:bg-blue-700 hover:text-white rounded-md px-3 py-2 text-gray-700">Add</button>
        </a> -->
    </div>
    <div>
        <ul role="list" class="divide-y divide-gray-100">
            @forelse ($students as $student)
            <li class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{asset('assets/img/default.png')}}" alt="">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">
                            <a href="{{ route('students.show',  $student->id )}}">
                                {{ $student->admission->lastname?? 'N/A'}} {{ $student->admission->firstname?? 'N/A'}}
                            </a>
                        </p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $student->admission->email?? 'N/A'}}</p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $student->admission->contactnumber?? 'N/A'}}</p>
                    </div>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <p class="text-sm leading-6 text-gray-900">{{ $student->admission->course_id?? 'N/A'}}</p>
                    <p class="mt-1 text-xs leading-5 text-gray-500">{{ $student->admission->country?? 'N/A'}}<time datetime="2023-01-23T13:23Z"> {{ $student->admission->city?? 'N/A'}}</time></p>
                </div>
            </li>
            @empty
            <li class="flex justify-between gap-x-6 py-5">No Data Found</li>

            @endforelse
        </ul>

    </div>
</section>
@endsection