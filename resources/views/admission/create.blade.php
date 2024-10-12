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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- parsley -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        ._group {
            display: none;
        }

        ._group.current {
            display: inline;
        }

        .parsley-required {
            color: red;
        }
    </style>
</head>

<body>
    <!-- TODO fix ui -->
    <!-- component -->
    <div class="bg-gray-100  transition-colors duration-300">
        <div class="container mx-auto p-4">
            <div class="bg-white  shadow rounded-lg p-6">

                <div class="flex justify-center">
                    <span class="step-1 p-5 m-2 shadow-sm rounded text-white bg-slate-400">Step 1</span>
                    <span class="step-2 p-5 m-2 shadow-sm rounded text-white bg-slate-400">Step 2</span>
                    <span class="step-3 p-5 m-2 shadow-sm rounded text-white bg-slate-400">Step 3</span>
                    <span class="step-4 p-5 m-2 shadow-sm rounded text-white bg-slate-400">Step 3</span>
                    <span class="step-5 p-5 m-2 shadow-sm rounded text-white bg-slate-400">Step 3</span>
                </div>
                <div class="_group">
                    <h1 class="text-xl font-semibold mb-4 text-gray-900 ">Requirement</h1>
                    <p class="text-gray-600  mb-6">requirement</p>
                    <p class="text-gray-600  mb-6">psa</p>
                    <p class="text-gray-600  mb-6">brgy something</p>
                    <p class="text-gray-600  mb-6">etc</p>
                </div>
                <form class="admission-form">
                    <div class="_group grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <h1 class="text-xl font-semibold mb-4 text-gray-900 ">Personal Information</h1>

                        <label for="">First name</label>
                        <input required type="text" placeholder="First name" class="border p-2 mt-1 rounded w-full">

                        <label for="">Last name</label>
                        <input required type="text" placeholder="Last name" class="border p-2 mt-1 rounded w-full">

                        <label for="">Email</label>
                        <input required type="email" placeholder="Email address" class="border p-2 mt-1 rounded w-full">

                        <select class="border p-2 mt-1 rounded w-full">
                            <option>United States</option>
                            <!-- Add more countries as needed -->
                        </select>
                        <!-- </div>
                    <div class="_group mb-4"> -->
                        <input required type="text" placeholder="Street address" class="border p-2 mt-1 rounded w-full">
                        <!-- </div>
                    <div class="_group grid grid-cols-1 md:grid-cols-3 gap-4 mb-6"> -->
                        <input required type="text" placeholder="City" class="border p-2 mt-1 rounded w-full">
                        <input required type="text" placeholder="State / Province" class="border p-2 mt-1 rounded w-full">
                        <input required type="text" placeholder="ZIP / Postal code" class="border p-2 mt-1 rounded w-full">
                    </div>
                    <!-- parent -->
                    <div class="_group grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <h1 class="text-xl font-semibold mb-4 text-gray-900 ">Parent Information</h1>

                        <div>
                            <label for="father_name">Father's Name</label>
                            <input type="text" class="border p-2 mt-1 rounded w-full" name="father_name" id="father_name" required>
                        </div>

                        <div>
                            <label for="mother_name">Mother's Name</label>
                            <input type="text" class="border p-2 mt-1 rounded w-full" name="mother_name" id="mother_name" required>
                        </div>

                        <div>
                            <label for="parent_contact">Parent/Guardian Contact Number</label>
                            <input type="text" class="border p-2 mt-1 rounded w-full" name="parent_contact" id="parent_contact" required>
                        </div>
                    </div>
                    <!-- btn -->
                    <div class="mt-5">
                        <button
                            type="button"
                            id="prev-btn"
                            class="prev-btn px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600 focus:outline-none transition-colors">

                            Prev
                        </button>
                        <button
                            type="submit"
                            id="theme-toggle"
                            class=" px-4 py-2 rounded bg-green-500 text-white hover:bg-green-600 focus:outline-none transition-colors">
                            Submit
                        </button>
                        <button
                            type="button"
                            id="next-btn"
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