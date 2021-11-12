$(document).ready(function(){
    $.ajax({url: "../DB/chartsData.php", success: function(result){
        drawHours(result);
        drawLastDays(result);
        drawLastMonth(result);
    }});
  });                          