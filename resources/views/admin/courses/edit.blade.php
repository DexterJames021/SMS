@extends('layouts.admin.layout')
@section('main')

<section>
  @if ($errors->any())
  <script>
    Swal.fire({
      title: "Validation Errors",
      text: "{{ implode(', ', $errors->all()) }}",
      icon: "error"
    });
  </script>
  @endif
  <form  action="{{ route('courses.update',$data->id)}}" method="post">
    @csrf
    @method('put')

    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base font-semibold leading-7 text-gray-900">Edit Course</h2>
      <!-- <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p> -->
      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
          <label for="course" class="block text-sm font-medium leading-6 text-gray-900">Course:</label>
          <div class="mt-2">
            <input type="text" value="{{ $data->course}}" name="course" id="course" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-3">
          <label for="course_mdl_id" class="block text-sm font-medium leading-6 text-gray-900">Course Moodle:</label>
          <div class="mt-2">
            <input type="number" value="{{ $data->course_mdl_id}}" name="course_moodle_id" id="course_mdl" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-3">
          <label for="enrollment_key" class="block text-sm font-medium leading-6 text-gray-900">Enrollment Key:</label>
          <div class="mt-2">
            <input type="text" value="{{ $data->enrollment_key}}" name="enrollment_key" id="enrollment_key" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>

        </div>
        <div class="sm:col-span-3">
          <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description:</label>
          <div class="mt-2">
            <textarea  name="description" id="description" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $data->description}}</textarea>
          </div>

        </div>
      </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6 m-4">
      <button type="button"  class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
  </form>

</section>

@endsection