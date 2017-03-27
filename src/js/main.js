

	$('button').click(function(){
		var data = { hull_length: $('#hull_length').val(), buttock_angle: $('#buttock_angle').val(), displacement: $('#displacement').val()};
		$.ajax({
		  type: "POST",
		  url: 'http://localhost:8080/powerRequirements',
		  data: data,
		  success: function(data){
			  displayData(data);
		  },
		  dataType: "json" 
		});
	});
	
	function displayData(data){
		$('.listing').empty();
		for (var key in data){
			$('.listing').append('<div>' + key + ' knots <span class="badge">' + data[key] + ' HP</span></div> ');
		}
	}
