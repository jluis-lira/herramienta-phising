function drawHours(data) {
  var dato=JSON.parse(data);
  //Fecha de actualización
  var now = new Date();
  // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';
  // Area Chart Example
  var ctx = document.getElementById("trendsVisitsChart");
  var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [dato[2][0].hour,dato[2][1].hour,dato[2][2].hour,dato[2][3].hour,dato[2][4].hour,
      dato[2][5].hour,dato[2][6].hour,dato[2][7].hour,dato[2][8].hour,dato[2][9].hour,
      dato[2][10].hour,dato[2][11].hour,dato[2][12].hour,dato[2][13].hour,dato[2][14].hour,
      dato[2][15].hour,dato[2][16].hour,dato[2][17].hour,dato[2][18].hour,dato[2][19].hour,
      dato[2][20].hour,dato[2][21].hour,dato[2][22].hour,dato[2][23].hour],
      datasets: [{
        label: "Visitas",
        borderColor: "green",
        fill:false,
        pointBackgroundColor: "#7adc6f",
        pointBorderColor: "black",
        pointRadius: 5,
        pointHitRadius: 5,
        pointBorderWidth: 2,
        pointHoverRadius: 5,
        pointHoverBackgroundColor: "green",
        tension: 0.1,
        data: [dato[2][0].visits,dato[2][1].visits,dato[2][2].visits,dato[2][3].visits,dato[2][4].visits,
        dato[2][5].visits,dato[2][6].visits,dato[2][7].visits,dato[2][8].visits,dato[2][9].visits,
        dato[2][10].visits,dato[2][11].visits,dato[2][12].visits,dato[2][13].visits,dato[2][14].visits,
        dato[2][15].visits,dato[2][16].visits,dato[2][17].visits,dato[2][18].visits,dato[2][19].visits,
        dato[2][20].visits,dato[2][21].visits,dato[2][22].visits,dato[2][23].visits],
      }],
    },
    options: {
      scales: {
        xAxes: [{
          time: {
            unit: 'date'
          },
          gridLines: {
            display: false
          },
          ticks: {
            maxTicksLimit: 12
          }
        }],
        yAxes: [{
          ticks: {
            min: 0,
            max: 50,
            maxTicksLimit: 10
          },
          gridLines: {
            color: "rgba(0, 0, 0, .125)",
          }
        }],
      },
      legend: {
        display: false
      }
    }
  });
};