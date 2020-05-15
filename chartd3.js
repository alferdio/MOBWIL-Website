$(document).ready(function(){
  var labelX;
  var dataX;
  setInterval(function () {
          $.ajax({
            url: 'ambilDatachart3.php',
            success: function (response) {
            dataX = $.parseJSON(response);
              $.ajax({
                url: 'ambilDatawaktu3.php',
                success: function (response) {
                labelX = $.parseJSON(response);  
                cetakgrapik();
              }  
            });
          }
      });
    }, 1000);
    function cetakgrapik(){
         var config = {
          type: 'line',
          data: {
          labels: labelX,
          datasets: [{
            label: 'Nilai jarak',
            fill: false,
            backgroundColor: window.chartColors.blue,
            borderColor: window.chartColors.red,
            data: dataX}
    
          ]
        },
        options: {
          animation: false,  
          responsive: true,
          title: {
            display: true,
            text: 'Data jarak sensor 3'
          },
          tooltips: {
            mode: 'index',
            intersect: false,
          },
          hover: {
            mode: 'nearest',
            intersect: true
          },
          scales: {
            xAxes: [{
              display: true,
              scaleLabel: {
                display: true,
                labelString: 'Waktu'
              }
            }],
            yAxes: [{
              display: true,
              scaleLabel: {
                display: true,
                labelString: 'Value'
              }
            }]
          }
        }
       };
  
      var chartData = {
        labels: labelX,
        datasets: [{
          type: 'line',
          label: 'Dataset 1',
          borderColor: window.chartColors.blue,
          borderWidth: 2,
          fill: false,
          data: dataX},
        {
        type: 'bar',
        label: 'Dataset 2',
        backgroundColor: window.chartColors.red,
        data: dataX,
        borderColor: 'white',
        borderWidth: 2 },
        { 
        type: 'bar',
        label: 'Dataset 3',
        backgroundColor: window.chartColors.green,
        data: dataX }
      ]};

        var ctx1 = document.getElementById('canvas3').getContext('2d');
        var chartline = new Chart(ctx1, config); 
        var chartline2 = new Chart(ctx2, {
          type: 'bar',
          data: chartData,
          options: {
            animation: false,
            responsive: true,
            title: {
              display: true,
              text: 'Data jarak'
            },
            tooltips: {
              mode: 'index',
              intersect: true
            }
          }
        });

      }

    });