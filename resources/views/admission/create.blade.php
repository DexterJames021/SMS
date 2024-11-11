<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- TODO:meta data  -->

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- parsley -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
        integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- custom js -->
    <script src="{{ asset('assets/js/validator.js')}}"></script>
    <script src="{{ asset('assets/js/parsley.js')}}"></script>
    <style>
        ._group {
            display: none;
        }

        ._group.current {
            display: inline;
        }

        .parsley-required,
        .parsley-type {
            color: rgb(220 38 38);
            font-weight: bold;
            font-size: small;
            list-style-type: disc;
            margin-left: 1rem;
        }
    </style>
</head>

<body>
    <!-- component -->
    @if (session('message'))
    <script>
        Swal.fire({
            title: "Admission Successful!",
            // text: "{ { is_arr ay(sess ion('mes sage')) ? implode (', ', session('message')) : session('message') }}",
            html: "<html>Moodle Account: <br> Username: {{ session('user')}} <br> SMS and LMS <br> Password: {{ session('pass')}}</html>",
            icon: "success"
        });
    </script>
    @endif

    @if (session('error'))
    <script>
        Swal.fire({
            title: "System Error",
            text: "{{ is_array(session('error')) ? implode(', ', session('error')) : session('error') }}",
            icon: "error"
        });
    </script>
    @endif
    <!-- validation retuurn -->
    @if ($errors->any())
    <script>
        Swal.fire({
            title: "Validation Errors",
            text: "{{ implode(', ', $errors->all()) }}",
            icon: "error"
        });
    </script>
    @endif
    <!-- //TODO https://parsleyjs.org/doc/index.html#validators -->
    <div class="bg-gray-100  p-3 transition-colors duration-300">
        <div class="container h-full mx-auto p-4">
            <!-- head -->
            <div class=" bg-white  shadow rounded-b-none border-b-2 rounded-lg p-6 lg:mx-52">
                <div class="hidden sm:flex justify-between">
                    <img src="{{ asset('asly-logo-nbg.png')}}" class="h-20 w-auto" alt="">
                    <div class="text-center lg:flex lg:flex-col">
                        <h1 class=" text-2xl font-bold text-gray-800 mb-3">ASLY International College School</h1>
                        <span class="text-xs text-gray-700">Purok 7 Matiyaga Street, Bagong Buhay Ave, San Jose del Monte City, 3024 Bulacan</span>
                        <span class="text-xs text-gray-700">+0923 396 4438</span>
                    </div>
                    <div class=" text-gray-600 text-sm ">
                        {{ date('m/d/Y') }}
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-t-none rounded-lg p-6 lg:mx-52">
                <div class="hidden sm:flex text-sm justify-center">
                    <span class="step-1 p-3 m-2 shadow-sm rounded text-white bg-slate-500"></span>
                    <span class="step-2 p-3 m-2 shadow-sm rounded text-white bg-slate-500"></span>
                    <span class="step-3 p-3 m-2 shadow-sm rounded text-white bg-slate-500"></span>
                    <span class="step-4 p-3 m-2 shadow-sm rounded text-white bg-slate-500"></span>
                    <span class="step-5 p-3 m-2 shadow-sm rounded text-white bg-slate-500"></span>
                </div>

                <div class="_group ">
                    <h1 class=" text-2xl font-medium mt-5 leading-6 text-gray-700">Requirements:</h1>
                    <p class="block text-sm font-medium mb-5 leading-6 text-gray-500">Submit the following Requirements on admin office.</p>

                    <div class="lg:flex gap-3 ">
                        <div class="border rounded-lg my-3 p-5 hover:bg-slate-100">
                            <h1 class=" text-2xl font-medium mb-5 leading-6 text-gray-700">New student/ Freshers:</h1>
                            <ul>
                                <li class=" list-disc text-sm mt-2 font-medium text-gray-700"">At least High School Graduate (Old Curr)</p>
                                <li class=" list-disc text-sm mt-2 font-medium text-gray-700"">At least Senior High School Graduate (New Curr)</p>
                                <li class=" list-disc text-sm mt-2 font-medium text-gray-700"">Furnished Registration Form</p>
                                <li class=" list-disc text-sm mt-2 font-medium text-gray-700"">Copy of Birth certificate</p>
                                <li class=" list-disc text-sm mt-2 font-medium text-gray-700"">Form 137 of SF9 or SF10</p>
                                <li class=" list-disc text-sm mt-2 font-medium text-gray-700"">For vocational or degree holder, Diploma and TOR is preferred</p>
                            </ul>
                        </div>
                        <div class="border rounded-lg my-3 p-5 hover:bg-slate-100">
                            <h1 class=" text-2xl font-medium mb-5 leading-6 text-gray-700">Tranferee:</h1>
                            <ul>
                                <li class="list-disc text-sm mt-2 font-medium text-gray-700"">At least High School Graduate (Old Curr)</p>
                                <li class=" list-disc text-sm mt-2 font-medium text-gray-700"">At least Senior High School Graduate (New Curr)</p>
                                <li class="list-disc text-sm mt-2 font-medium text-gray-700"">Furnished Registration Form</p>
                                <li class=" list-disc text-sm mt-2 font-medium text-gray-700"">Copy of Birth certificate</p>
                                <li class="list-disc text-sm mt-2 font-medium text-gray-700"">Form 137 of SF9 or SF10</p>
                                <li class=" list-disc text-sm mt-2 font-medium text-gray-700"">For vocational or degree holder, Diploma and TOR is preferred</p>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="terms" class="_group  text-center">
                    <h1 class="block text-2xl font-medium leading-6 text-gray-900">Terms and Condition</h1>
                    <p>Data privacy:</p>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente itaque voluptate recusandae earum illo modi asperiores quae, quasi veritatis voluptates deleniti placeat ut dolorum corrupti iure tenetur voluptatem harum tempora!</p>
                    <label for="">Agree</label>
                    <input type="checkbox"  data-parsley-check="[1]" name="" id="">
                </div>
                <form class="admission-form" method="POST" action="{{ route('admission.store') }}">
                    @csrf
                    @method('POST')

                    <div class="_group  grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <h1 class="text-xl font-semibold  text-gray-900 ">Personal Information</h1>
                        <p class="block text-sm font-medium leading-6 text-gray-500 mb-4"> Please, Fill up the form if there's a problem you can ask admin</p>

                        <label class="block text-sm font-medium leading-6 text-gray-900" for="firstname">First Name:</label>
                        <input type="text" name="firstname" placeholder="First name" id="firstname" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>

                        <label class="block text-sm font-medium leading-6 text-gray-900" for="lastname">Last Name:</label>
                        <input type="text" name="lastname" placeholder="Last name" id="lastname" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>

                        <label class="block text-sm font-medium leading-6 text-gray-900" for="middlename">Middle Name:</label>
                        <input type="text" name="middlename" placeholder="Middle name" id="middlename" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>

                        <label class="block text-sm font-medium leading-6 text-gray-900" for="">Course:</label>
                        <select class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" name="course_id">
                            <option class="text-gray-400 text-sm leading-6" selected disabled value="">-- Choose Course --</option>
                            @foreach ($courses as $course)
                            <option class="text-gray-400 leading-6" value="{{ $course->id }}">
                                <p class="text-sm">{{ $course->course }}</p>
                                <!-- <p class="text-gray-200 text-xs">{{ $course->description }}</p> -->
                            </option>
                            @endforeach
                        </select>

                        <label class="block text-sm font-medium leading-6 text-gray-900" for="email">Email:</label>
                        <input type="email" name="email" placeholder="Email address" id="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>

                        <label class="block text-sm font-medium leading-6 text-gray-900" for="contact">Contact Number:</label>
                        <input type="number" name="contactnumber" placeholder="Contact Number" id="contact" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                    </div>

                    <!-- Address -->
                    <div class="_group  grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <h1 class="text-xl font-semibold mb-4 text-gray-900 ">Address Information</h1>
                        <label class="block text-sm font-medium leading-6 text-gray-900" for="country">Country:</label>
                        <input type="text" name="country" placeholder="country" id="country" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>

                        <label class="block text-sm font-medium leading-6 text-gray-900" for="street">Street Address:</label>
                        <input type="text" name="streetaddress" placeholder="Street address" id="street" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>

                        <label class="block text-sm font-medium leading-6 text-gray-900" for="city">City:</label>
                        <input type="text" name="city" placeholder="City" id="city" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                    </div>
                    <!-- parent -->
                    <div class="_group  grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <h1 class="text-xl font-semibold mb-4 text-gray-900 ">Parent Information</h1>

                        <div>
                            <label class="block text-sm font-medium leading-6 text-gray-900" for="fathername">Father's Name:</label>
                            <input type="text" name="fathername" placeholder="Father's Name" id="fathername" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium leading-6 text-gray-900" for="mothername">Mother's Name:</label>
                            <input type="text" name="mothername" placeholder="Mother's Name" id="mothername" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium leading-6 text-gray-900" for="parentcontact">Parent/Guardian Contact Number:</label>
                            <input type="number" name="guardiancontactnumber" placeholder="Guardian Contact Number" id="parentcontact" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        </div>
                    </div>
                    <!-- btn -->
                    <div class="mt-10 flex justify-end gap-2 border-t-2 bg-slate-100 pb-3 pr-3">
                        <div class="mt-5">
                            <button type="button" id="prev-btn"
                                class="prev-btn px-4 py-2 rounded bg-white ring-1 ring-inset ring-gray-300 text-gray-800 hover:bg-gray-200 focus:outline-none transition-colors">
                                Prev
                            </button>
                            <button type="submit" id="theme-toggle" onClick="confirm('Are you want you submit ')"
                                class=" px-4 py-2 rounded bg-green-400 text-white hover:bg-green-500 focus:outline-none transition-colors">
                                Submit
                            </button>
                            <button type="button" id="next-btn"
                                class="next-btn px-4 py-2 rounded bg-blue-400 text-white hover:bg-blue-500 focus:outline-none transition-colors">

                                Next
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>

</html>