<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
    </div>
    <div class="footer-right">
        2.3.0
    </div>
</footer>
</div>
</div>
<!-- JS Libraies -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="{{ asset('public/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('public/assets/js/stisla.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('public/js/iziToast.min.js') }}"></script>

<script src='https://code.jquery.com/ui/1.12.1/jquery-ui.js'></script>
<script src="{{ asset('public/js/fullcalendar.js') }}"></script>

<script>
    // Code goes here
    $(document).ready(function() {

        // page is now ready, initialize the calendar...

        var calendar = $('#calendar').fullCalendar({
            // put your options and callbacks here
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'year,month,basicWeek,basicDay'

            },
            timezone: 'local',
            height: "auto",
            selectable: true,
            dragabble: true,
            defaultView: 'month',
            yearColumns: 3,

            durationEditable: true,
            bootstrap: false,

            events: "{{ route('post.event') }}",
            select: function(start, end, allDay) {
                var title = prompt('Event Title:');
                if (title) {
                    var event = {
                        title: title,
                        start: start.clone(),
                        end: end.clone(),
                        allDay: true,
                        editable: true,
                        eventDurationEditable: true,
                        eventStartEditable: true,
                        color: 'red',
                    };


                    calendar.fullCalendar('renderEvent', event, true);
                }
            },
        })
    });

</script>


<!-- Custom JS File -->
<script src="{{ asset('public/js/crud_user.js') }}"></script>
<script src="{{ asset('public/js/crud_tag.js') }}"></script>



<!-- Template JS File -->
<script src="{{ asset('public/assets/js/scripts.js') }}"></script>
<script src="{{ asset('public/assets/js/custom.js') }}"></script>

<!-- Page Specific JS File -->
{{-- <script>
    CKEDITOR.replace('postContent');
    CKEDITOR.replace('postContentEdit');

</script> --}}
</body>

</html>
