var ChartClass;
(function ($) {
  $(document).ready(function () {
    const labels = Object.keys(expenses);
    const data = Object.values(expenses);
    const ctx = document.getElementById('myChart-sidebar').getContext('2d');
    ChartClass.ChartData(ctx, 'bar', labels, data)
  });
  ChartClass = {
    ChartData:function(ctx, type, labels, data) {
      new Chart(ctx, {
        type: type,
        data: {
          labels: labels,
          datasets: [{
            label: '出費合計',
            data: data,
            backgroundColor: [
              'rgba(255, 99, 132, 0.5)',
              'rgba(54, 162, 235, 0.5)',
              'rgba(255, 206, 86, 0.5)',
              'rgba(75, 192, 192, 0.5)',
              'rgba(153, 102, 255, 0.5)',
              'rgba(255, 159, 64, 0.5)'
            ],
            borderColor: [
              'rgba(58, 58, 75, 1)'
            ],
            borderWidth: 2
          }]
        },
        options: {
          indexAxis: 'y',
          scales: {
            x: {
              ticks: {
                font: {
                  family: 'serif',
                  weight: 'bold',
                  size: '16'
                }
              }
            },
            y: {
              ticks: {
                font: {
                  family: 'serif',
                  weight: 'bold',
                  size: '16'
                } 
              }
            }
          },
          layout: {
            padding: {
              top: 20,
              left: 20,
              right: 20,
              bottom: 20,
            }
          },
          maintainAspectRatio: false,
          plugins: {
            tooltip: {
              callbacks: {
                label: ((tooltipItem, data) => {
                  return tooltipItem.formattedValue+'円';
                }),
              }
            }
          },
        }
      });
    }
  }
})(jQuery);
