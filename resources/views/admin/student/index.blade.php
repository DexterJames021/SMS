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
        @if($students->isEmpty())
        <li class="flex justify-between gap-x-6 py-5">No Data Found</li>
        @else
            @foreach ($students as $student)
            <li class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{asset('assets/img/default.png')}}" alt="">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">
                            <a href="{{ route('students.show',  $student->id )}}">
                                {{ $student->admission->lastname}} {{ $student->admission->firstname}}
                            </a>
                        </p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $student->admission->email}}</p>
                    </div>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <p class="text-sm leading-6 text-gray-900">course</p>
                    <p class="mt-1 text-xs leading-5 text-gray-500">{{ $student->admission->country}}<time datetime="2023-01-23T13:23Z"> {{ $student->city}}</time></p>
                </div>
            </li>
            @endforeach
            @endif
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
@endsection