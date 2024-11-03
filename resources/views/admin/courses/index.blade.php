@extends('layouts.admin.layout')
@section('main')


<div class="container mx-auto px-4 py-8">
    <!-- Header Section -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Course Mapping Management</h1>
        <a href="{{ route('courses.create')}}"
            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add New Mapping
        </a>
    </div>

    <!-- Main Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        SMS Course
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Moodle Course
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap" x-text="mapping.sms_course"></td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span x-text="mapping.moodle_course_name"></span>
                            <span class="text-gray-500 text-sm" x-text="'(ID: ' + mapping.moodle_course_id + ')'"></span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button
                                class="bg-orange-500 hover:bg-orange-600 text-white px-2 py-1 rounded-lg">
                                Edit
                            </button>
                            <button
                                class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded-lg ml-2">
                                Remove
                            </button>
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>

    <!-- Add/Edit Modal -->
    <div
        x-show="isOpen"
        class="fixed z-10 inset-0 overflow-y-auto"
        aria-labelledby="modal-title"
        role="dialog"
        aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <!-- <form>
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
                        </form> -->
            </div>
        </div>
    </div>
</div>
</div>


@endsection