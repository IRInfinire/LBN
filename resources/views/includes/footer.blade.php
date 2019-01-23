</body>

<script src="{{asset('assets/physician/js/jquery-2.1.4.js')}}"></script>
<script src="{{asset('assets/physician/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/physician/js/bootstrap-select.js')}}"></script>
<script src="{{asset('assets/physician/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('assets/physician/js/scrolling-nav.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/common/js/ajax_validator.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/common/js/bootstrap-datetimepicker.min.js')}}"></script>

<script>

// Add slideDown animation to Bootstrap dropdown when expanding.
$('.dropdown').on('show.bs.dropdown', function () {
    $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
});

// Add slideUp animation to Bootstrap dropdown when collapsing.
$('.dropdown').on('hide.bs.dropdown', function () {
    $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
});


//$(document).on('click', 'a#about_us, a#contact_us', function (event) {
//    event.preventDefault();
//
//    $('html, body').animate({
//        scrollTop: $($.attr(this, 'href')).offset().top
//    }, 500);
//});
</script>

<script>
    $(".not-done").click(function (e) {
        e.preventDefault();
        alert("Not implemented");
    });
    $(".auto_fade").fadeTo(5000, 500).slideUp(500, function () {
        $(".auto_fade").slideUp(500);
    });
    $('.form_date').datetimepicker({
   autoclose: 1,
   todayHighlight: 1,
   minView: 2,
   pickerPosition: "bottom-left",
   endDate: '+0d'
});
</script>
</html>