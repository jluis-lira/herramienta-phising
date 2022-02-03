//This function receives and converts data to display graphs
function drawLastDays(data) {
  var dato=JSON.parse(data);//Data conversion
  var maxVisits = 2*Math.max(dato[0][0].visits,dato[0][1].visits,dato[0][2].visits,dato[0][3].visits,dato[0][4].visits,
    dato[0][5].visits,dato[0][6].visits,dato[0][7].visits,dato[0][8].visits,dato[0][9].visits,
    dato[0][10].visits,dato[0][11].visits,dato[0][12].visits,dato[0][13].visits,dato[0][14].visits); 
  //Data query date
  var now = new Date();
  var dateDays= now.toString();
  var updateDays =document.querySelector("#updateDaysVisitasChart");
  updateDays.innerHTML+=dateDays;
  // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';
  // Area Chart
  var ctx = document.getElementById("myVisitasChart");
  var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [dato[0][0].day,dato[0][1].day,dato[0][2].day,dato[0][3].day,dato[0][4].day,dato[0][5].day,
        dato[0][6].day,dato[0][7].day,dato[0][8].day,dato[0][9].day,dato[0][10].day,
        dato[0][11].day,dato[0][12].day,dato[0][13].day,dato[0][14].day],
      datasets: [{
        label: "Visitas",
        lineTension: 0.3,
        backgroundColor: "rgba(2,117,216,0.2)",
        borderColor: "rgba(2,117,216,1)",
        pointRadius: 5,
        pointBackgroundColor: "rgba(2,117,216,1)",
        pointBorderColor: "rgba(255,255,255,0.8)",
        pointHoverRadius: 5,
        pointHoverBackgroundColor: "rgba(2,117,216,1)",
        pointHitRadius: 50,
        pointBorderWidth: 2,
        data: [dato[0][0].visits,dato[0][1].visits,dato[0][2].visits,dato[0][3].visits,dato[0][4].visits,
        dato[0][5].visits,dato[0][6].visits,dato[0][7].visits,dato[0][8].visits,dato[0][9].visits,
        dato[0][10].visits,dato[0][11].visits,dato[0][12].visits,dato[0][13].visits,dato[0][14].visits],
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
            maxTicksLimit: 8
          }
        }],
        yAxes: [{
          ticks: {
            min: 0,
            max: maxVisits,
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
