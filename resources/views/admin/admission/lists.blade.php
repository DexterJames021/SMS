@extends('layouts.admin.layout')
@section('main')
<section>
    <!-- component -->
    <div class=" mx-auto">
        <div class="relative flex flex-col w-full h-full text-slate-700 bg-white shadow-md rounded-xl bg-clip-border">
            <div class="relative mx-4 mt-4 overflow-hidden text-slate-700 bg-white rounded-none bg-clip-border">
                <div class="flex items-center justify-between ">
                    <div>
                        <h3 class="text-lg font-semibold text-slate-800">Admission</h3>
                        <p class="text-slate-500">Review each person before edit</p>
                    </div>
                    <div class="flex flex-col gap-2 shrink-0 sm:flex-row">
                        <button
                            class="rounded border border-slate-300 py-2.5 px-3 text-center text-xs font-semibold text-slate-600 transition-all hover:opacity-75 focus:ring focus:ring-slate-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            type="button">
                            View All
                        </button>
                        <button
                            class="flex select-none items-center gap-2 rounded bg-slate-800 py-2.5 px-4 text-xs font-semibold text-white shadow-md shadow-slate-900/10 transition-all hover:shadow-lg hover:shadow-slate-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                                stroke-width="2" class="w-4 h-4">
                                <path
                                    d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z">
                                </path>
                            </svg>
                            Add member
                        </button>
                    </div>
                </div>

            </div>
            <div class="p-0 overflow-scroll">
                <table class="w-full mt-4 text-left table-auto min-w-max" id="ad-table">
                    <thead>
                        <tr>
                            <th class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                                <p class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
                                    Status
                                </p>
                            </th>
                            <th class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                                <p class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
                                    Fullname
                                </p>
                            </th>
                            <th class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                                <p class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
                                    Course
                                </p>
                            </th>
                            <th class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                                <p class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
                                    Email
                                </p>
                            </th>
                            <th class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                                <p class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
                                    Contact #
                                </p>
                            </th>
                            <th class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                                <p class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
                                    Guardian Contact#
                                </p>
                            </th>
                            <th class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                                <p class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
                                    Admission Date 
                                </p>
                            </th>
                            <th class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                                <p class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
                                    Action 
                                </p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $admission)
                        <tr>
                            <td class="p-4 border-b border-slate-200">
                                <p class="text-sm font-semibold text-slate-700"> {{ $admission->status }}
                            </td>
                            </p>
                            <td class="p-4 border-b border-slate-200">
                                <a href="">
                                    <p class="text-sm font-semibold text-slate-700"> {{ $admission->lastname }}, {{ $admission->firstname }} {{ $admission->middlename }}
                                </a>
                            </td>
                            </p>
                            <td class="p-4 border-b border-slate-200">
                                <p class="text-sm font-semibold text-slate-700"> {{ $admission->course }}
                            </td>
                            </p>
                            <td class="p-4 border-b border-slate-200">
                                <p class="text-sm font-semibold text-slate-700"> {{ $admission->email }}
                            </td>
                            </p>
                            <td class="p-4 border-b border-slate-200">
                                <p class="text-sm font-semibold text-slate-700"> {{ $admission->contactnumber }}
                            </td>
                            </p>
                            <td class="p-4 border-b border-slate-200">
                                <p class="text-sm font-semibold text-slate-700"> {{ $admission->guardiancontactnumber }}
                            </td>
                            </p>
                            <td class="p-4 border-b border-slate-200">
                                <p class="text-sm font-semibold text-slate-700"> {{ $admission->admission_date }}
                            </td>
                            <td class="p-4 border-b border-slate-200">
                                <a href="">View</a>
                            </td>
                            </p>
                        </tr>
                        @endforeach
                        <!-- <tr>
                            <td class="p-4 border-b border-slate-200">
                                <div class="flex items-center gap-3">
                                    <img src="https://demos.creative-tim.com/test/corporate-ui-dashboard/assets/img/team-3.jpg"
                                        alt="John Michael" class="relative inline-block h-9 w-9 !rounded-full object-cover object-center" />
                                    <div class="flex flex-col">
                                        <p class="text-sm font-semibold text-slate-700">
                                            John Michael
                                        </p>
                                        <p
                                            class="text-sm text-slate-500">
                                            john@creative-tim.com
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4 border-b border-slate-200">
                                <div class="flex flex-col">
                                    <p class="text-sm font-semibold text-slate-700">
                                        Manager
                                    </p>
                                    <p
                                        class="text-sm text-slate-500">
                                        Organization
                                    </p>
                                </div>
                            </td>
                            <td class="p-4 border-b border-slate-200">
                                <div class="w-max">
                                    <div
                                        class="relative grid items-center px-2 py-1 font-sans text-xs font-bold text-green-900 uppercase rounded-md select-none whitespace-nowrap bg-green-500/20">
                                        <span class="">online</span>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4 border-b border-slate-200">
                                <p class="text-sm text-slate-500">
                                    23/04/18
                                </p>
                            </td>
                            <td class="p-4 border-b border-slate-200">
                                <button
                                    class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-slate-900 transition-all hover:bg-slate-900/10 active:bg-slate-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                    type="button">
                                    <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                                            class="w-4 h-4">
                                            <path
                                                d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z">
                                            </path>
                                        </svg>
                                    </span>
                                </button>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>
@endsection