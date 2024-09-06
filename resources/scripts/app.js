import domReady from '@roots/sage/client/dom-ready';
import Highcharts from 'highcharts';

/**
 * Application entrypoint
 */
domReady(async () => {
  const faqItems = document.querySelectorAll('.faq-item');

  faqItems.forEach((item) => {
    const question = item.querySelector('.faq-q');
    const answer = item.querySelector('.faq-a');

    // Initially, set maxHeight to 0 for all answers and handle padding with CSS
    answer.style.maxHeight = '0px';
    answer.style.overflow = 'hidden';

    question.addEventListener('click', function () {
      if (item.classList.contains('active')) {
        // Collapse the answer if it's already open
        answer.style.maxHeight = '0px';
        item.classList.remove('active');
      } else {
        // Close all other open items
        faqItems.forEach((otherItem) => {
          if (otherItem !== item && otherItem.classList.contains('active')) {
            const otherAnswer = otherItem.querySelector('.faq-a');
            otherAnswer.style.maxHeight = '0px';
            otherItem.classList.remove('active');
          }
        });

        // Expand the clicked item
        item.classList.add('active');

        // Calculate the height of the content inside the answer, including padding
        const fullHeight = answer.scrollHeight + 'px';

        // Apply the calculated height to maxHeight
        answer.style.maxHeight = fullHeight;
      }
    });
  });

  Highcharts.chart('top-chart', {
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
        data: [
          {
            name: 'Lorem Ispum',
            y: 17.0,
            color: '#0E062D',
          },
          {
            name: 'Loreum Ispum',
            y: 15.2,
            color: '#3E2BA5',
          },
          {
            name: 'Lorem Ispum',
            y: 15.1,
            color: '#B269FF',
          },
          {
            name: 'Lorem Ispum',
            y: 14.9,
            color: '#9990ca',
          },
          {
            name: 'Lreo Ispum',
            y: 12.0,
            color: '#7DA2FF',
          },
          {
            name: 'Lorem Ispsum',
            y: 5.5,
            color: '#9550FC',
          },
        ],
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
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
