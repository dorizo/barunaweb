<?php $this->load->view("" . $header) ?>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

			</div>
			<div class="modal-body">
				<form action="<?php echo base_url() ?>welcome/store" enctype="multipart/form-data" method="POST">

					<div class="form-group">
						<label for="message-text" class="control-label">Pesan:</label>
						<textarea class="form-control" name="pesan" id="message-text" rows="8" required="required"></textarea>
					</div>
					<div class="leave">
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Foto:</label>
						<input type="file" class="form-control" name="foto" id="recipient-name" accept="image/jpeg,image/png,image/jpg" required="required">
					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-block btn-lg">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<body>
	<div class="container">

		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-4">
				<div class="panel rounded shadow">
					<div class="panel-body">
						<div class="inner-all">
							<ul class="list-unstyled">
								<li class="text-center">
									<img data-no-retina="" class="img-circle img-responsive img-bordered-primary" src="<?php echo base_url() ?>assets/photo/photo.jpg" alt="John Doe">
								</li>
								<li class="text-center">
									<h4 class="text text-capitalize"><?=  strtolower(session('nama')); ?></h4>
									<p class="text-muted "><?=  strtolower(session('email')); ?></p>
								</li>

								<li><br></li>
								<li>
									<div class="btn-group-vertical btn-block">
										<a href="" class="btn btn-default"><i class="fa fa-cog pull-right"></i>Edit Account</a>
										<a href="<?php echo base_url() ?>login/logout" class="btn btn-default"><i class="fa fa-sign-out pull-right"></i>Logout</a>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div><!-- /.panel -->
			</div>
			<div class="col-lg-6 col-md-6 col-sm-8">
				<?php if ($this->session->flashdata('error')) { ?>
					<div class="alert alert-danger alert-dismissible" role="alert">
						<a href="<?php echo base_url() ?>"><button type="button" class="close"><span aria-hidden="true">&times;</span></button></a>
						<strong>Warning!</strong> Aktifkan GPS lokasi Anda !
					</div>
				<?php } ?>
				<div class="profile-cover">
					<div class="panel rounded shadow">
						<form action="...">

							<div class="panel-body no-padding">
								<div class="pull-left half">
									<div class="media">
										<div class="media-object pull-left">
											<img src="<?php echo base_url() ?>assets/photo/photo.jpg" alt="..." class="img-circle img-post">
										</div>
										<div class="media-body">
											<button type="button" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#exampleModal">Apa yang ingin Anda laporkan, User?</button>
										</div>
									</div>
								</div><!-- /.pull-left -->

							</div>

						</form>

					</div><!-- /.panel -->
				</div><!-- /.profile-cover -->
				<div class="row" id="post-data">

					<?php
					$this->load->view('template/data', $posts);
					?>
				</div>
			</div>
		</div>
	</div>








	<script type="text/javascript">
		var page = 0;
		$(window).scroll(function() {
			if($(window).scrollTop() + $(window).height() >= $(document).height()) {
				page++;
				loadMoreData(page);
			}
		});


		function loadMoreData(page){
			$.ajax(
			{
				url: '?page=' + page,
				type: "get",
				beforeSend: function()
				{
					$('.ajax-load').show();
				}
			})
			.done(function(data)
			{
				if(data == " "){
					$('.ajax-load').html("No more records found");
					return;
				}
				$('.ajax-load').hide();
				$("#post-data").append(data);
			})
			.fail(function(jqXHR, ajaxOptions, thrownError)
			{
				alert('server not responding...');
			});
		}
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#message-text').change(function() {

				if (navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(showPosition, showError);
				} else { 
					$('.leave').html(`Geolocation is not supported by this browser.`);
				}
			});

		});
		function showPosition(position) {
			$('.leave').html(`<input type="hidden" value="` + position.coords.latitude + `" name="latitude" class="form-control" required="required" id="leave" ><br><input type="hidden" value="` + position.coords.longitude + `" name="longitude" class="form-control" required="required" id="leave">`);
    // x.innerHTML = "Latitude: " + position.coords.latitude + 
    // "<br>Longitude: " + position.coords.longitude;
}
function showError(error) {
	switch(error.code) {
		case error.PERMISSION_DENIED:
		x.innerHTML = "User denied the request for Geolocation."
		break;
		case error.POSITION_UNAVAILABLE:
		x.innerHTML = "Location information is unavailable."
		break;
		case error.TIMEOUT:
		x.innerHTML = "The request to get user location timed out."
		break;
		case error.UNKNOWN_ERROR:
		x.innerHTML = "An unknown error occurred."
		break;
	}
}

</script>


</body>
</html>