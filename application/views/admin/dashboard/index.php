<div class="content-wrapper">
	<section class="content" style="min-height: 100vh;">
		<!-- <div class="row" style="margin-bottom: 10px">
			<div class="col-md-1"><label>Thống kê</label></div>
			<form class="form-inline" action="/action_page.php">
			  <div class="form-group">
			    <label for="email">Từ:</label>
			    <input type="email" class="form-control" id="email">
			  </div>
			  <div class="form-group">
			    <label for="pwd">Đến:</label>
			    <input type="password" class="form-control" id="pwd">
			  </div>
			  <button type="submit" class="btn btn-default">Lọc</button>
			</form>
		</div> -->
		<div class="row content_dashboard">
			<div class="col_with_5">
				<div class="tilte_box_count"><i class="fa fa-user fa_count"></i><span class="body-bl-b"> Hồ sơ ứng viên</span></div>
				<div class="count_content"><?php echo $report['candidate'] ?></div>
			</div>
			<div class="col_with_5">
				<div class="tilte_box_count"><i class="fa fa-clipboard fa_count"></i><span class="body-bl-b"> Chiến dịch</span></div>
				<div class="count_content"><?php echo $report['campaign'] ?></div>
			</div>
			<div class="col_with_5">
				<div class="tilte_box_count"><i class="fa fa-comment-o fa_count"></i><span class="body-bl-b"> Nhận xét</span></div>
				<div class="count_content"><?php echo $report['comment'] ?></div>
			</div>
			<div class="col_with_5">
				<div class="tilte_box_count"><i class="fa fa-phone fa_count"></i><span class="body-bl-b"> Gọi điện</span></div>
				<div class="count_content"><?php echo $report['call'] ?></div>
			</div>
			<div class="col_with_5">
				<div class="tilte_box_count"><i class="fa fa-tasks fa_count"></i><span class="body-bl-b"> Chấm điểm</span></div>
				<div class="count_content"><?php echo $report['rate'] ?></div>
			</div>
		</div>
		<div class="row content_dashboard">
			<div class="col_with_5">
				<div class="tilte_box_count"><i class="fa fa-filter fa_count"></i><span class="body-bl-b"> Đưa vào chiến dịch</span></div>
				<div class="count_content"><?php echo $report['filter'] ?></div>
			</div>
			<div class="col_with_5">
				<div class="tilte_box_count"><i class="fa fa-list-ol fa_count"></i><span class="body-bl-b"> Trắc nghiệm</span></div>
				<div class="count_content"><?php echo $report['assessment'] ?></div>
			</div>
			<div class="col_with_5">
				<div class="tilte_box_count"><i class="fa fa-comments-o fa_count"></i><span class="body-bl-b"> Phỏng vấn</span></div>
				<div class="count_content"><?php echo $report['interview'] ?></div>
			</div>
			<div class="col_with_5">
				<div class="tilte_box_count"><i class="fa fa-handshake-o fa_count"></i><span class="body-bl-b"> Đề nghị</span></div>
				<div class="count_content"><?php echo $report['offer'] ?></div>
			</div>
			<div class="col_with_5">
				<div class="tilte_box_count"><i class="fa fa-flag fa_count"></i><span class="body-bl-b"> Tuyển dụng</span></div>
				<div class="count_content"><?php echo $report['recruite'] ?></div>
			</div>
		</div>
		<div class="row content_dashboard">
			<div class="col_with_40">
				<div class="tilte_box_count"><i class="fa fa-bar-chart fa_count"></i><span class="body-bl-b"> Phân tích nguồn hồ sơ</span></div>
				<canvas id="myChart" width="300" height="300"></canvas>
			</div>
			<div class="col_with_60">
				<div class="tilte_box_count"><i class="fa fa-bar-chart fa_count"></i><span class="body-bl-b"> Phân tích chiến dịch</span></div>
				<canvas id="myChart1" width="400" height="300"></canvas>
			</div>
		</div>
		<div class="row content_dashboard">
			<div class="col_with_100">
				<div class="tilte_box_count"><i class="fa fa-table fa_count"></i><span class="body-bl-b"> Thống kê hoạt động tuyển dụng viên</span></div>
				<table class="table table-striped  table-hover">
					<thead>
						<th>Tuyển dụng viên</th>
						<th>Chiến dịch</th>
						<th>Nhận xét/ cho điểm</th>
						<th>Điện thoại</th>
						<th>Email</th>
						<th>Chuyển vòng</th>
						<th>Loại vòng</th>
						<th>Phỏng vấn</th>
						<th>Đề nghị</th>
						<th>Tuyển dụng</th>
					</thead>
					<tbody>
						<?php foreach ($operator as $key): ?>
							<tr>
								<td><?php echo $key['operatorname'] ?></td>
								<td><?php echo $key['count_campaign'] ?></td>
								<td><?php echo $key['count_comment'] ?></td>
								<td><?php echo $key['count_call'] ?></td>
								<td><?php echo $key['count_email'] ?></td>
								<td><?php echo $key['count_transfer'] ?></td>
								<td><?php echo $key['count_discard'] ?></td>
								<td><?php echo $key['count_interview'] ?></td>
								<td><?php echo $key['count_offer'] ?></td>
								<td><?php echo $key['count_recruite'] ?></td>
							</tr>
						<?php endforeach ?>
						
					</tbody>
				</table>
			</div>
		</div>
	</section>
</div>
<style type="text/css">
	.content_dashboard{
		background-color: white;
		margin: 0 10px 0 10px;
		display: -webkit-box;
	}
	.col_with_5{
		width: 20%;
		height: 100px;
		border: 1px solid #ddd;
	}
	.count_content{
		color: #5FA2DD;
		  font-size: 35px;
		  font-weight: 700;
		  line-height: 36px;
		  text-align: center;
		  margin-top: 13px;
	}
	.body-bl-b {
	  color: #000000;
	  font-size: 15px;
	  font-weight: 700;
	  line-height: 17px;
	  width: 175px;
	  text-align: left;
	}
	.fa_count {
	  color: #ADB3B8;
	  font-family: FontAwesome;
	  font-size: 15px;
	  font-weight: 400;
	  line-height: 18px;
	  width: 18px;
	  text-align: center;
	}
	.tilte_box_count{
		margin: 7px 0 0 10px;
	}
	.col_with_40{
		width: 40%;
		min-height: 400px;
		border: 1px solid #ddd;
	}
	.col_with_60{
		width: 60%;
		min-height: 400px;
		border: 1px solid #ddd;
	}
	.col_with_100{
		width: 100%;
		min-height: 500px;
		/*border: 1px solid #ddd;*/
	}
</style>
<script src="https://www.chartjs.org/dist/2.7.3/Chart.bundle.js"></script>
<script src="https://www.chartjs.org/samples/latest/utils.js"></script>
<script type="text/javascript">

	var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};

		var config = {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
					],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.orange,
						window.chartColors.yellow,
						window.chartColors.green,
						window.chartColors.blue,
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Red',
					'Orange',
					'Yellow',
					'Green',
					'Blue'
				]
			},
			options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				title: {
					display: false,
					text: 'Chart.js Doughnut Chart'
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
		};

		var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
		var color = Chart.helpers.color;
		var horizontalBarChartData = {
			labels: ['Sơ loại/ Tiếp cận', 'Trắc nghiệm', 'Phỏng vấn', 'Đề nghị', 'Tuyển dụng'],
			datasets: [{
				// label: 'Dataset 1',
				backgroundColor: [
						color(window.chartColors.blue).alpha(0.5).rgbString(),
						color(window.chartColors.blue).alpha(0.6).rgbString(),
						color(window.chartColors.blue).alpha(0.7).rgbString(),
						color(window.chartColors.blue).alpha(0.8).rgbString(),
						color(window.chartColors.blue).alpha(0.9).rgbString(),
				],
				
				borderColor: window.chartColors.red,
				borderWidth: 1,
				data: [
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor()
				]
			}]

		};

		window.onload = function() {
			var ctx = document.getElementById('myChart1').getContext('2d');
			window.myHorizontalBar = new Chart(ctx, {
				type: 'horizontalBar',
				data: horizontalBarChartData,
				options: {
					// Elements options apply to all of the options unless overridden in a dataset
					// In this case, we are setting the border of each horizontal bar to be 2px wide
					elements: {
						rectangle: {
							borderWidth: 2,
						}
					},
					responsive: true,
					legend: {
						position: 'right',
						display:false
					},
					title: {
						display: false,
						text: 'Chart.js Horizontal Bar Chart'
					}
				}
			});
			var ctx = document.getElementById('myChart').getContext('2d');
			window.myDoughnut = new Chart(ctx, config);
		};
		$(document).ready(function(){



		$.ajax({
			url: '<?php echo(base_url('admin/dashboard/getData'))?>',
			type: 'post',
			dataType: 'json',
			data: {param1: 'value1'}
		})
		.done(function(r) {
			console.log(r);
			var dou = r.dou;
			var bar = r.bar;
			horizontalBarChartData.datasets[0].data = bar;
			window.myHorizontalBar.update();
			config.data.labels = dou.label;
			config.data.datasets[0].data = dou.data;
			window.myDoughnut.update();

		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		});
</script>