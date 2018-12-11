$(document).ready(function(){
  $.ajax({
    url : "http://193.167.101.114/proj/data.php",
    type : "GET",
    success : function(data){
      console.log(data);

      var temperature = [];
      var lumi = [];
	  var tempdate = [];
    var humi = [];

      for(var i in data) {
			if (i %2 == 0){
        temperature.push(data[i].temp);
		tempdate.push(data[i].date);
		lumi.push(data[i].luminosity);
		humi.push(data[i].humidity);
			}
      }

      var chartdata = {
        labels: tempdate,
        datasets: [
          {
            label: "Temperature (celsius)",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(239, 15, 15, 0.75)",
            borderColor: "rgba(153, 0, 0, 1)",
            pointHoverBackgroundColor: "rgba(239, 15, 15, 1)",
            pointHoverBorderColor: "rgba(153, 0, 0, 1)",
            data: temperature
          },
		  {
			label: "Luminosity (lux)",
      fill: false,
      lineTension: 0.1,
      backgroundColor: "rgba(59, 89, 152, 0.75)",
      borderColor: "rgba(59, 89, 152, 1)",
      pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
      pointHoverBorderColor: "rgba(59, 89, 152, 1)",
            data: lumi
		  },
      {
      label: "Humidity (%)",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(48, 101, 15, 0.75)",
            borderColor:  "rgba(48, 101, 15, 1)",
            pointHoverBackgroundColor: "rgba(48, 101, 15, 1)",
            pointHoverBorderColor: "rgba(48, 101, 15, 1)",
            data: humi
      }

        ]

      };

      var ctx = $("#mycanvas");

      var LineGraph = new Chart(ctx, {
        type: 'line',
        data: chartdata
      });
    },
    error : function(data) {

    }
  });
});
