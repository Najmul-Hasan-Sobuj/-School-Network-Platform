// Sidebar
$(document).ready(function () {
    $(".toggle-sidebar").click(function () {
        $(".navbar").toggleClass("active");
        $(".main").toggleClass("active");
        $(".main_content").toggleClass("active");
        $(".nav_text").toggleClass("active");
        $(".nav").toggleClass("active");
        $(".toggle-sidebar").toggleClass("rotate");
        $(".nav_text2").toggleClass("hidden");
    });

    $(".menu").click(function () {
        $(".submenu").slideToggle("hidden");
        $(".nav_text").toggleClass("active_svg");
    });

    $(".navmenu").click(function (event) {
        event.stopPropagation();
        $(".navsubmenu").toggleClass("opacity-0");
        $(".navsubmenu").toggleClass("opacity-1");
        $(".navsubmenu").toggleClass("hidden");
    });

    $(document).click(function () {
        if ($(".navsubmenu").hasClass("opacity-1")) {
            $(".navsubmenu").removeClass("opacity-1");
            $(".navsubmenu").addClass("opacity-0");
            $(".navsubmenu").addClass("hidden");
        }
    });

    $(".navsubmenu").click(function (event) {
        event.stopPropagation();
    });

});


// Preview uploaded image
function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
        const img = document.getElementById('preview_image')
        img.src = URL.createObjectURL(file);
    }
}

$(document).ready(function () {
    $('.dropdown').select2({
        placeholder: 'Select an option'
    });
});

$(function () {
    $("#datepicker").datepicker({
        placeholder: 'Enter a date'
    });
});
