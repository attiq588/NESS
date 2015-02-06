function drawChart() {
    var data = new google.visualization.DataTable();
    data.addColumn('date', 'Date');
    data.addColumn('number', 'Low');
    data.addColumn('number', 'Open');
    data.addColumn('number', 'Close');
    data.addColumn('number', 'High');

    var low, open, close = 45, high;
    for (var i = 0; i < 30; i++) {
        open = close;
        close += ~~(Math.random() * 10) * Math.pow(-1, ~~(Math.random() * 2));
        high = Math.max(open, close) + ~~(Math.random() * 10);
        low = Math.min(open, close) - ~~(Math.random() * 10);
        data.addRow([new Date(2014, 0, i + 1), low, open, close, high]);
    }

    // use a DataView to calculate an x-day moving average
    var days = 5;
    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1, 2, 3, 4, {
        type: 'number',
        label: days + '-day Moving Average',
        calc: function (dt, row) {
            // calculate average of closing value for last x days,
            // if we are x or more days into the data set
            if (row >= days - 1) {
                var total = 0;
                for (var i = 0; i < days; i++) {
                    total += dt.getValue(row - i, 3);
                }
                var avg = total / days;
                return {v: avg, f: avg.toFixed(2)};
            }
            else {
                // return null for < x days
                return null;
            }
        }
    }]);

    var chart = new google.visualization.ComboChart(document.querySelector('#chart_div'));
    chart.draw(view, {
        height: 400,
        width: 600,
        chartArea: {
            left: '7%',
            width: '70%'
        },
        series: {
            0: {
                type: 'candlesticks'
            },
            1: {
                type: 'line'
            }
        }
    });
}
google.load("visualization", "1", {packages:["corechart"], callback: drawChart});