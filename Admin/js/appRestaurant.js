$(document).ready(function(){
	$.ajax({
		url : "http://localhost/tesTING/Website/admin/dataRestaurant.php",
		method: "GET",
		success: function(data){
			console.log(data);
			var restaurant = [];
			var views = [];
			var rating = [];

			for(var i in data){
				restaurant.push(data[i].restaurant_name);
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

						var tempName=restaurant[j];
						restaurant[j]=restaurant[i];
						restaurant[i]=tempName;
					}
				}
			}

			var chartdata = {
				labels: [restaurant[0],restaurant[1],restaurant[2],restaurant[3],restaurant[4]],
				datasets : [
					{
						label : 'Views',
						backgroundColor: 'rgba(200,100,100,0.75)',
						borderColor: 'rgba(200,100,100,0.75)',
						hoverBackgroundColor: 'rgba(200,100,100,1)',
						hoverBorderColor: 'rgba(200,100,100,0.75)',
						data: views
					}
				]
			};

			var ctx = $("#mycanvas2");

			var options={
				title:{
					display: true,
					position: "top",
					text: "Top 5, Most Viewed Restaurants and Cafe",
					fontSize: 20,
					fontColor: "green"
				},
				scales: {
			        yAxes: [{
			            ticks: {
			                stepSize: 1
			            }
			        }]
			    }
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