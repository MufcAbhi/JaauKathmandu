$(document).ready(function(){
	$.ajax({
		url : "http://localhost/tesTING/Website/admin/dataHotel.php",
		method: "GET",
		success: function(data){
			console.log(data);
			var hotel = [];
			var views = [];
			var rating = [];

			for(var i in data){
				hotel.push(data[i].hotel_name);
				views.push(data[i].HitCounter);
				rating.push(data[i].avgRating);
			}
			var len = data.length;
			for(var i = 0; i<len; i++){
				for(var j = i; j<len; j++){
					if (views[j]>views[i]) {
						var temp=views[j];
						views[j]=views[i];
						views[i]=temp;

						var tempName=hotel[j];
						hotel[j]=hotel[i];
						hotel[i]=tempName;
					}
				}
			}

			var chartdata = {
				labels: [hotel[0],hotel[1],hotel[2],hotel[3],hotel[4]],
				datasets : [
					{
						label : 'Views',
						backgroundColor: 'rgba(200,200,200,0.75)',
						borderColor: 'rgba(200,200,200,0.75)',
						hoverBackgroundColor: 'rgba(200,200,200,1)',
						hoverBorderColor: 'rgba(200,200,200,0.75)',
						data: views
					}
				]
			};

			var ctx = $("#mycanvas1");

			var options={
				title:{
					display: true,
					position: "top",
					text: "Top 5, Most Viewed Hotels",
					fontSize: 20,
					fontColor: "green"
				},
				scales: {
			        yAxes: [{
			            ticks: {
			                stepSize: 1
			            }
			        }]
			    },
			};

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata,
				options: options
			})
		},
		error: function(data){
			console.log(data);
		}
	})
});