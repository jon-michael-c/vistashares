import Highcharts from 'highcharts';

export default class HighChartsController {
  constructor() {
    let dataSeries = document
      .querySelector('#exposure-chart')
      .getAttribute('data-series');
    dataSeries = JSON.parse(dataSeries);
    console.log(dataSeries);
    let exposureChart = Highcharts.chart('exposure-chart', {
      exporting: {
        enabled: false,
      },
      chart: {
        type: 'pie',
      },
      title: {
        text: '',
        align: 'center',
        verticalAlign: 'middle',
        y: 10,
      },
      plotOptions: {
        pie: {
          shadow: false,
          center: ['50%', '50%'],
          allowPointSelect: true,
          cursor: 'default',
          borderRadius: '0px',
          slicedOffset: 20,
          borderWidth: 5,
          dataLabels: {
            enabled: false,
          },
          showInLegend: false,
          allowPointSelect: false,
          point: {
            events: {
              legendItemClick: function (e) {
                e.preventDefault();
              },
            },
          },
        },
      },
      tooltip: {
        valueSuffix: '%',
        pointFormat: '', // disables unneeded tooltip line
      },
      series: [
        {
          type: 'pie',
          name: 'budget',
          innerSize: '50%',
          data: dataSeries,
        },
      ],
      responsive: {
        rules: [
          {
            condition: {
              maxWidth: 400,
            },
            chartOptions: {
              series: [
                {},
                {
                  id: 'versions',
                  dataLabels: {
                    enabled: false,
                  },
                },
              ],
            },
          },
        ],
      },
    });

    document.querySelectorAll('.highcharts-credits').forEach((el) => {
      el.remove();
    });

    document.querySelectorAll('.exposure-list li').forEach((listItem) => {
      listItem.addEventListener('mouseover', function () {
        var index = this.getAttribute('data-index'); // Get the index of the hovered item
        var point = exposureChart.series[0].data[index]; // Get the corresponding point in the chart

        // Check if the point exists before proceeding
        if (point) {
          // Set the point to hover state
          point.setState('hover');
        } else {
          console.error('Point not found for index:', index);
        }
      });

      listItem.addEventListener('mouseout', function () {
        var index = this.getAttribute('data-index'); // Get the index of the unhovered item
        var point = exposureChart.series[0].data[index]; // Get the corresponding point in the chart

        // Check if the point exists before proceeding
        if (point) {
          // Reset the point state to default
          point.setState('');
        } else {
          console.error('Point not found for index:', index);
        }
      });
    });
  }
}

document.addEventListener('DOMContentLoaded', () => {
  new HighChartsController();
});
