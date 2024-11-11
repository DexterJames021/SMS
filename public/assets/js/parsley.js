$(function () {

    function delete_course() {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                });
            }
        });

    }




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
            backgroundColor: 'lightblue',
            color: 'white'
        });


    }

    function curIndex() {
        return $section.index($section.filter('.current'));
    }


    $('.prev-btn').click(function () {
        navigateTo(curIndex() - 1);
    });

    $('.next-btn').click(function () {
        $('.admission-form').parsley().whenValidate({
            group: 'block-' + curIndex()
        }).done(function () {
            navigateTo(curIndex() + 1);
        });
    });

    $section.each(function (index, section) {
        $(section).find(':input').attr('data-parsley-group', 'block-' + index);
    });

    $section.each(function (index, section) {
        $(section).find(':input').attr('data-parsley-group', 'block-' + index);
    });

    // Start at the first section
    navigateTo(0);

});