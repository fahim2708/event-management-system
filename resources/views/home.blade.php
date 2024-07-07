@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-9/12 p-6 bg-white rounded-lg">
           
                <div id='calendar' class="w-full"></div>
           
            
            <script>
                $(document).ready(function() {
        
                    var SITEURL = "{{ url('/') }}";
        
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
        
                    var calendar = $('#calendar').fullCalendar({
                        editable: true,
                        events: SITEURL + "/",
                        displayEventTime: false,
                        editable: true,
                        eventRender: function(event, element, view) {
                            if (event.allDay === 'true') {
                                event.allDay = true;
                            } else {
                                event.allDay = false;
                            }
                        },
        
                    });
        
                });
            </script>
        </div>
    </div>
@endsection