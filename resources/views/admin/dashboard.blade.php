@extends('layouts.admin.layout')
@section('main')
<section>
    <div class="flex mb-3">
        <div class=" grow mx-1 border rounded shadow-md p-5">
            <h1 class="text-2xl mb-2 text-gray-700">Students</h1>
            <p class="text-4xl text-gray-500">
                {{ $student }}
            </p>
            <span class=" float-end">as of: {{ date('Y') }}</span>
        </div>
        <div class="grow mx-1 border rounded shadow-md p-5">
            <h1 class="text-2xl mb-2 text-gray-700">Teachers</h1>
            <p class="text-4xl text-gray-500">
                {{ $teacher }}
            </p>
            <span class=" float-end">as of: {{ date('Y') }}</span>
        </div>
        <div class="grow mx-1 border rounded shadow-md p-5">
            <h1 class="text-2xl mb-2 text-gray-700">Courses</h1>
            <p class="text-4xl text-gray-500">
                {{ $course }}
            </p>
            <span class=" float-end">as of: {{ date('Y') }}</span>
        </div>

    </div>
    <div class="flex justify-center mx-1 border rounded shadow-md p-5">
        <canvas id="admission"></canvas>
    </div>
</section>

@endsection