$('#calendar').evoCalendar({
    'language': 'en',
    'todayHighlight': true,
});

$('#calendar').evoCalendar('addCalendarEvent', [
    {
        id: 'a2',
        name: '5 video call',
        date: '04/22/2022',
        description: 'Lorem ipsum dolor sit',
        type: 'video-call',
    },
    {
        id: 'a1',
        name: '8 visit clinic',
        date: '04/22/2022',
        description: 'Lorem ipsum dolor sit',
        type: 'visit-clinic',
    },


]);

var active_date = $('#calendar').evoCalendar('getActiveDate');
document.getElementById("date-title").textContent = active_date
var active_events = $('#calendar').evoCalendar('getActiveEvents');
console.log(active_events);
$('#calendar').on('selectEvent', function (event, activeEvent) {
    console.log(activeEvent);
});


$('#calendar').on('selectDate', function (event, newDate, oldDate) {
    document.getElementById("date-title").textContent = newDate
});

const labels = ["sunday", "monday", "tueday", "wedday", "thuday", "friday", "satday"];
var myChart = new Chart("myChart", {
    type: "bar",
    data: {
        labels: labels,
        datasets: [
            {
                label: 'video call',
                data: [30, 16, 8, 14, 19, 44, 60],
                borderColor: "#198754",
                backgroundColor: "#198754",
            },
            {
                label: 'visit clinic',
                data: [24, 19, 7, 41, 14, 32, 45],
                borderColor: "#009dff",
                backgroundColor: "#009dff",
            }

        ]
    },
    options: {
        responsive: false,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Chart.js Bar Chart'
            }
        }
    },
});

