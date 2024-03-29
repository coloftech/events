function show_chart(clabels,first,second,total,chart_title) {
	// body...
            const chartdata = {
                labels: clabels,
                datasets: [{
                        label: 'First semester collections',
                        backgroundColor: 'rgba(0, 159, 255, 0.7)',
                        borderColor: 'rgba(200, 200, 200, 0.75)',
                        data: first
                    },
                    {
                        label: 'Second semester collections',
                        backgroundColor: 'rgba(255, 113, 71, 0.7)',
                        borderColor: 'rgba(200, 200, 200, 0.75)',
                        data: second
                    },
                    {
                        label: 'Total collections',
                        backgroundColor: 'rgba(120, 120, 120,0.7)',
                        borderColor: 'rgba(200, 200, 200, 0.75)',
                        data: total
                    }
                ]
            };

             var ctx = $("#charts-collections");

           /* const plugin = {
			  id: 'customCanvasBackgroundColor',
			  beforeDraw: (chart, args, options) => {
			    const {ctx} = chart;
			    ctx.save();
			    ctx.globalCompositeOperation = 'destination-over';
			    ctx.fillStyle = options.color || '#99ffff';
			    ctx.fillRect(0, 0, chart.width, chart.height);
			    ctx.restore();
			  }
			};
			*/

            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata,
                options: {
                    barValueSpacing: 20,
                    title: {
                        display: true,
                        text: [chart_title + ' Collections'],
                        fontSize: 20
                    },
                    scales: {
                        xAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: 'Course'
                            }
                        }],
                        yAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: 'Collections amount'
                            },
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }

            });
         //   console.log(barGraph.toBase64Image())
		//var a = document.createElement('a');
		//a.href = barGraph.toBase64Image();
		//a.download = 'my_file_name.png';
		//a.innerHTML = 'Download chart';
        


}


function getData(get_url) {
	// body...
		const canvas = document.getElementById("charts-collections");
		if(canvas == null){
			return false;
		}

		if (get_url === undefined) {
			get_url = '<?=site_url('charts/getCollectionData')?>'; 
		}
		console.log(get_url)

	$.ajax({
		url:get_url,
		dataType:'json',
		success:function(response){
			let sy = $('select[name="year_id"] option:selected').text()
			
			show_chart(response.labels,response.first,response.second,response.total,sy);
		}
	})
}
$(function() {
	// body...
	getData();

	$('.btn-download').on('click',function(){
		//alert('Download');
		const canvas = document.getElementById("charts-collections");
		$(this).attr('href',canvas.toDataURL());
		$(this).attr('download','hello.png');
	})

	$('#chart-year-id').on('change',function(){
		url = '<?=site_url('charts/getCollectionData/')?>'+ $(this).val();
		getData(url);
	})
})