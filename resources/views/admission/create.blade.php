<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    <style>
        ._group {
            display: none;
        }

        ._group.current {
            display: inline;
        }

        .parsley-required,
        .parsley-type {
            color: red;
            font-size: small;

        }
    </style>
</head>

<body>
    <!-- TODO fix ui -->
    <!-- component -->
    @if (session('message'))
    <script>
        Swal.fire({
            title: "Admission Successful!",
            text: "That thing is still around?",
            icon: "success"
        });
    </script>
    @endif

    @if (session('error'))
    <script>
        Swal.fire({
            title: "Error",
            text: "{{ is_array(session('error')) ? implode(', ', session('error')) : session('error') }}",
            icon: "error"
        });
    </script>
    @endif

    @if ($errors->any())
    <script>
        Swal.fire({
            title: "Validation Errors",
            text: "{{ implode(', ', $errors->all()) }}",
            icon: "error"
        });
    </script>
    @endif



    <div class="bg-gray-100  transition-colors duration-300">
        <div class="container mx-auto p-4">
            <div class="bg-white  shadow rounded-lg p-6 lg:mx-52">

                <div class="flex justify-center">
                    <span class="step-1 p-5 m-2 shadow-sm rounded text-white bg-slate-400">Step 1</span>
                    <span class="step-2 p-5 m-2 shadow-sm rounded text-white bg-slate-400">Step 2</span>
                    <span class="step-3 p-5 m-2 shadow-sm rounded text-white bg-slate-400">Step 3</span>
                    <span class="step-4 p-5 m-2 shadow-sm rounded text-white bg-slate-400">Step 4</span>
                    {{-- <span class="step-4 p-5 m-2 shadow-sm rounded text-white bg-slate-400">Step 3</span> --}}
                    {{-- <span class="step-5 p-5 m-2 shadow-sm rounded text-white bg-slate-400">Step 3</span> --}}
                </div>
                <div class="_group text-center">
                    <h1 class="text-xl font-semibold mb-4 text-gray-900 ">Requirements</h1>
                    <p class="text-gray-600  mb-6">At least High School Graduate (Old Curr)</p>
                    <p class="text-gray-600  mb-6">At least Senior High School Graduate (New Curr)</p>
                    <p class="text-gray-600  mb-6">Furnished Registration Form</p>
                    <p class="text-gray-600  mb-6">Copy of Birth certificate</p>
                    <p class="text-gray-600  mb-6">Form 137 of SF9 or SF10</p>
                    <p class="text-gray-600  mb-6">For vocational or degree holder, Diploma and TOR is preferred</p>
                </div>
                <form class="admission-form" method="POST" action="{{ route('admission.store') }}">
                    @csrf
                    @method('POST')

                    <div class="_group grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <h1 class="text-xl font-semibold mb-4 text-gray-900 ">Personal Information</h1>

                        <label for="">First name:</label>
                        <input required type="text" name="firstname" placeholder="First name"
                            class="border p-2 mt-1 rounded w-full">

                        <label for="">Last name:</label>
                        <input required type="text" name="lastname" placeholder="Last name"
                            class="border p-2 mt-1 rounded w-full">

                        <label for="">Middle name</label>
                        <input required type="text" name="middlename" placeholder="Middle name"
                            class="border p-2 mt-1 rounded w-full">

                        <select class="border p-2 my-4 rounded w-full" name="course_id">
                            <option selected disabled value="">-- Course --</option>
                            @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->course }}</option>
                            @endforeach
                        </select>

                        <label for="">Email:</label>
                        <input required type="email" name="email" placeholder="Email address"
                            class="border p-2 mt-1 rounded w-full">

                        <label for="">Contact Number:</label>
                        <input required type="number" name="contactnumber" placeholder="Contact Number"
                            class="border p-2 mt-1 rounded w-full">
                    </div>

                    <!-- Address -->
                    <div class="_group grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <h1 class="text-xl font-semibold mb-4 text-gray-900 ">Address Information</h1>
                        <label for="">Country:</label>
                        <input required type="text" name="country" placeholder="country"
                            class="border p-2 mt-1 rounded w-full">

                        <label for="">Street Address:</label>
                        <input required type="text" name="streetaddress" placeholder="Street address"
                            class="border p-2 mt-1 rounded w-full">

                        <label for="">City:</label>
                        <input required type="text" name="city" placeholder="City"
                            class="border p-2 mt-1 rounded w-full">
                    </div>
                    <!-- parent -->
                    <div class="_group grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <h1 class="text-xl font-semibold mb-4 text-gray-900 ">Parent Information</h1>

                        <div>
                            <label for="father_name">Father's Name</label>
                            <input type="text" name="fathername" class="border p-2 mt-1 rounded w-full"
                                name="father_name" id="father_name" required>
                        </div>

                        <div>
                            <label for="mother_name">Mother's Name</label>
                            <input type="text" name="mothername" class="border p-2 mt-1 rounded w-full"
                                name="mother_name" id="mother_name" required>
                        </div>

                        <div>
                            <label for="parent_contact">Parent/Guardian Contact Number</label>
                            <input type="number" name="guardiancontactnumber" class="border p-2 mt-1 rounded w-full"
                                name="parent_contact" id="parent_contact" required>
                        </div>
                    </div>
                    <!-- btn -->
                    <div class="mt-5">
                        <button type="button" id="prev-btn"
                            class="prev-btn px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600 focus:outline-none transition-colors">

                            Prev
                        </button>
                        <button type="submit" id="theme-toggle"
                            class=" px-4 py-2 rounded bg-green-500 text-white hover:bg-green-600 focus:outline-none transition-colors">
                            Submit
                        </button>
                        <button type="button" id="next-btn"
                            class="next-btn px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600 focus:outline-none transition-colors">

                            Next
                        </button>

                    </div>
                </form>
            </div>
        </div>

    </div>
    <script>
        $(function() {


            // const {
            //     value: accept
            // } = Swal.fire({
            //     title: "Terms and conditions",
            //     input: "checkbox",
            //     inputValue: 1,
            //     inputPlaceholder: ` I agree with the terms and conditions `,
            //     confirmButtonText: `Continue&nbsp;<i class="fa fa-arrow-right"></i> `,
            //     inputValidator: (result) => {
            //         return !result && "You need to agree with T&C";
            //     }
            // });
            // if (accept) {
            //     Swal.fire("You agreed with T&C :)");
            // }

            var $section = $('._group');

            function navigateTo(index) {
                $section.removeClass('current').eq(index).addClass('current');

                $('.prev-btn').toggle(index > 0);

                var atTheEnd = index >= $section.length - 1;
                $('.next-btn').toggle(!atTheEnd);
                $('[type=submit]').toggle(atTheEnd);

                // Update the step indicator
                $('.step-1, .step-2, .step-3, .step-4, .step-5').css({
                    backgroundColor: 'slategray',
                    color: 'white'
                });

                $('.step-' + (index + 1)).css({
                    backgroundColor: 'black',
                    color: 'white'
                });
            }

            function curIndex() {
                return $section.index($section.filter('.current'));
            }


            $('.prev-btn').click(function() {
                navigateTo(curIndex() - 1);
            });

            $('.next-btn').click(function() {
                $('.admission-form').parsley().whenValidate({
                    group: 'block-' + curIndex()
                }).done(function() {
                    navigateTo(curIndex() + 1);
                });
            });

            $section.each(function(index, section) {
                $(section).find(':input').attr('data-parsley-group', 'block-' + index);
            });

            // Start at the first section
            navigateTo(0);

        });
    </script>


</body>

</html>