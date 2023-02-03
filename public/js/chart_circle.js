var ChartClass1;
(function ($) {
  $(document).ready(function () {
    const labels = Object.keys(expenses);
    const data = Object.values(expenses);
    const pieChart = document.getElementById('myChart-circle').getContext('2d');
    ChartClass1.ChartData(pieChart, 'pie', labels, data)
  });
  ChartClass1 = {
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
          fontFamily: 'serif',
          fontWeight: 'bold',
          fontStyle: 'bold',
          plugins: {
            tooltip: {
              callbacks: {
                label: ((tooltipItem, data) => {
                  return tooltipItem.formattedValue+'円';
                }),
              }
            }
          }
        }
      });
    }
  }
})(jQuery);
