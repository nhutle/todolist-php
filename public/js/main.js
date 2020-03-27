'use strict';

$(function() {
    // Button events:
    $('.btn-work-edit').on('click', function() {
        let $tableRow = $(this).parents('.table-row');

        $tableRow.find('.cell-value, .cell-edit-delete').hide();
        $tableRow.find('.cell-input').show();
        $tableRow.find('.cell-save-discard').css('display', 'inline-flex');
    });

    $('.btn-work-discard').on('click', function() {
        let $tableRow = $(this).parents('.table-row');

        $tableRow.find('.cell-input, .cell-save-discard').hide();
        $tableRow.find('.cell-value').show();
        $tableRow.find('.cell-edit-delete').css('display', 'inline-flex');
    });

    /*$('.btn-work-delete').on('click', function() {
        if (confirm('Are you sure you want to DELETE this work?')) {
            //
        }
    });*/

    // Render calendar:
    let calendarEl = document.getElementById('calendar');

    let calendar = new FullCalendar.Calendar(calendarEl, {
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
        events: [
            {
                title: 'All Day Event',
                start: '2020-03-01',
            },
            {
                title: 'Long Event',
                start: '2020-03-27',
                end: '2020-03-30'
            },
            {
                title: 'Repeating Event',
                start: '2020-03-09'
            },
            {
                title: 'Conference',
                start: '2020-03-11',
                end: '2020-03-13'
            }
        ]
    });

    calendar.render();
});