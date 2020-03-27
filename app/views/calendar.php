<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Calendar</title>
        <meta name="description" content="Todo List with pure PHP in MVC pattern">
        <meta name="author" content="Nhut Le">

        <!-- styles -->
        <link rel="stylesheet" href="public/vendors/font-awesome/font-awesome.min.css">
        <link rel="stylesheet" href="public/vendors/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="public/vendors/fullcalendar/packages/core/main.css">
        <link rel="stylesheet" href="public/vendors/fullcalendar/packages/daygrid/main.css">
        <link rel="stylesheet" href="public/vendors/fullcalendar/packages/timegrid/main.css">
        <link rel="stylesheet" href="public/vendors/fullcalendar/packages/list/main.css">
        <link rel="stylesheet" href="public/css/main.css">

        <!-- scripts -->
        <script src='public/vendors/fullcalendar/packages/core/main.js'></script>
        <script src='public/vendors/fullcalendar/packages/interaction/main.js'></script>
        <script src='public/vendors/fullcalendar/packages/daygrid/main.js'></script>
        <script src='public/vendors/fullcalendar/packages/timegrid/main.js'></script>
        <script src='public/vendors/fullcalendar/packages/list/main.js'></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let calendarEl = document.getElementById('calendar');

                let calendar = new FullCalendar.Calendar(calendarEl, {
                    plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
                    height: 'parent',
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                    },
                    defaultView: 'dayGridMonth',
                    defaultDate: '2020-02-12',
                    navLinks: true, // can click day/week names to navigate views
                    editable: true,
                    eventLimit: true, // allow "more" link when too many events
                    events: [
                        {
                            title: 'All Day Event',
                            start: '2020-02-01',
                        },
                        {
                            title: 'Long Event',
                            start: '2020-02-07',
                            end: '2020-02-10'
                        },
                        {
                            groupId: 999,
                            title: 'Repeating Event',
                            start: '2020-02-09'
                        },
                        {
                            groupId: 999,
                            title: 'Repeating Event',
                            start: '2020-02-16'
                        },
                        {
                            title: 'Conference',
                            start: '2020-02-11',
                            end: '2020-02-13'
                        },
                        {
                            title: 'Meeting',
                            start: '2020-02-12',
                            end: '2020-02-12'
                        },
                        {
                            title: 'Lunch',
                            start: '2020-02-12'
                        },
                        {
                            title: 'Meeting',
                            start: '2020-02-12'
                        },
                        {
                            title: 'Happy Hour',
                            start: '2020-02-12'
                        },
                        {
                            title: 'Dinner',
                            start: '2020-02-12'
                        },
                        {
                            title: 'Birthday Party',
                            start: '2020-02-13'
                        },
                        {
                            title: 'Click for Google',
                            url: 'http://google.com/',
                            start: '2020-02-28'
                        }
                    ]
                });

                calendar.render();
            });

        </script>
        <style>

            html, body {
                overflow: hidden; /* don't do scrollbars */
                font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
                font-size: 14px;
            }

            #calendar-container {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
            }

            .fc-header-toolbar {
                /*
                the calendar will be butting up against the edges,
                but let's scoot in the header's buttons
                */
                padding-top: 1em;
                padding-left: 1em;
                padding-right: 1em;
            }

        </style>
    </head>

    <body>
        <div class="container">
            <div id='calendar-container'>
                <div id='calendar'></div>
            </div>
        </div>

        <!-- scripts -->
        <script src="public/vendors/jquery/jquery-3.4.1.min.js"></script>
        <script src="public/vendors/bootstrap/bootstrap.min.js"></script>
        <script src="public/js/main.js"></script>
    </body>
</html>