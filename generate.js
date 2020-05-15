	$(document).ready(function () {
		var time;
		function generate () {
			var max = 100;
            var min = 50;
			var lval = 1;
			var val1 = (Math.floor(Math.random() *min) / max + lval) + Math.floor(Math.random()*300)+1;
			var val2 = (Math.floor(Math.random() *min) / max + lval) + Math.floor(Math.random()*300)+1;
			var val3 = (Math.floor(Math.random() *min) / max + lval) + Math.floor(Math.random()*300)+1;
			var val4 = (Math.floor(Math.random() *min) / max + lval) + Math.floor(Math.random()*300)+1;
			$.ajax({
				url: 'insert.php',
				type: 'post',
				data: {'rand_val1':val1,
					   'rand_val2':val2,
					   'rand_val3':val3,
					   'rand_val4':val4,
					   },
				dataType: 'json',
				beforeSend: function () {
					//$('#loading').html('Loading...');
				},
				success: function (data) {
					$('#riwayat').html(data);

					//generate();
				}
			});
			
		}

		$('#status_sensor').click(function () {
			if($(this).html() == 'ON') {
				$(this).html('OFF');

				var delay = 5000;

				//time = setTimeout(generate, delay);
				time = setInterval(generate, delay);
			}
			else {
				$(this).html('ON');

				clearTimeout(time);
			}
		});
});