<!doctype html>

<html lang="en" class="calendar-html">
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
    </head>

    <body class="calendar-body">
        <div class="container">
            <div class="notification">
                <?php if (isset($_SESSION['error'])) { ?>
                    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                        <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                        ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>

                <?php if (isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>
            </div>

            <div id='calendar-container'>
                <div id='calendar'></div>
            </div>
        </div>

        <!-- scripts -->
        <script src="public/vendors/jquery/jquery-3.4.1.min.js"></script>
        <script src="public/vendors/bootstrap/bootstrap.min.js"></script>
        <script src='public/vendors/fullcalendar/packages/core/main.js'></script>
        <script src='public/vendors/fullcalendar/packages/interaction/main.js'></script>
        <script src='public/vendors/fullcalendar/packages/daygrid/main.js'></script>
        <script src='public/vendors/fullcalendar/packages/timegrid/main.js'></script>
        <script src='public/vendors/fullcalendar/packages/list/main.js'></script>
        <script src="public/js/main.js"></script>

        <!-- Render calendar -->
        <script>
            let calendarEl = document.getElementById('calendar');
            let calendar   = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
                height: 'parent',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                defaultView: 'dayGridMonth',
                defaultDate: new Date(),
                displayEventTime: false,
                navLinks: true,
                editable: true,
                eventLimit: true,
            });

            calendar.addEventSource(<?php echo json_encode($events); ?>);
            calendar.render();
        </script>
    </body>
</html>