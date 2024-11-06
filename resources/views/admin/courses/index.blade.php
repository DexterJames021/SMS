@extends('layouts.admin.layout')
@section('main')

@if (session('message'))
    <script>
        Swal.fire({
            title: "Successful!",
            text: "That thing is still around?",
            icon: "success"
        });
    </script>
    @endif
<div class="container mx-auto px-4 py-8">
    <!-- Header Section -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Course Mapping</h1>
        <a href="{{ route('courses.create')}}"
            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add New Course
        </a>
    </div>

    <!-- Main Table -->
    <div class="bg-white">
        <table class="w-full mt-4 text-left table-auto min-w-max rounded border">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                        <p class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
                            SMS Course
                        </p>
                    </th>
                    <th class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                        <p class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
                            Moodle Course
                        </p>
                    </th>
                    <th class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                        <p class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
                            Key
                        </p>
                    </th>
                    <th class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
                        <p class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
                            Actions
                        </p>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($courses as $course)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap ">
                        <span title="{{ $course->description}}" class="hover:text-gray-500 cursor-pointer">{{ $course->course}}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                    <span class="hover:text-gray-500 cursor-pointer">{{ $course->course_mdl_id }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                    <span class="hover:text-gray-500 cursor-pointer">{{ $course->enrollment_key }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a class=" px-2 py-1 rounded-lg">
                            Edit
                        </a>
                        <a class=" px-2 py-1 rounded-lg ml-2">
                            Remove
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add/Edit Modal -->
    <!-- <div
        x-show="isOpen"
        class="fixed z-10 inset-0 overflow-y-auto"
        aria-labelledby="modal-title"
        role="dialog"
        aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <form>
                            <div class="mt-3">
                                <label for="sms_course" class="block text-sm font-medium text-gray-700">SMS Course</label>
                                <input type="text">
                            </div>
                            <div class="mt-3">
                                <label for="moodle_course_id" class="block text-sm font-medium text-gray-700">Moodle Course ID</label>
                                <input type="text">
                            </div>
                            <div class="mt-3">
                                <label for="is_active" class="block text-sm font-medium text-gray-700">Active</label>
                                <input 
                                    id="is_active" 
                                    v-model="formData.is_active" 
                                    type="checkbox" 
                                    class="mt-1 block w-full pl-10 text-sm text-gray-700"
                                >
                            </div>
                            <button 
                                type="submit" 
                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg"
                            >
                            Submit
                                <template x-if="editing">Update</template>
                                <template x-else>Create</template>
                            </button>
                        </form>
            </div>
        </div>
    </div> -->
</div>
</div>


@endsection