
<?php foreach ($posts as $post) {  if($post->status =='1') {?>

<div class="col-lg-12 col-md-12">
	<div class="panel panel-success rounded shadow">
		<div class="panel-heading no-border">
			<div class="pull-left half">
				<div class="media">
					<div class="media-object pull-left">
						<img src="<?php echo base_url() ?>assets/photo/photo.jpg" alt="..." class="img-circle img-post">
					</div>
					<div class="media-body">
						<a href="#" class="media-heading block mb-0 h4 text-white"><?= $post->nama ?></a>
						<small class="block text-muted"><?php echo date('d F Y', strtotime($post->created_date));?> pada <?php echo date('H:i', strtotime($post->created_date));?></small>
					</div>
				</div>
			</div>

			<div class="clearfix"></div>
		</div>
		<div class="panel-body no-padding">
			<div class="inner-all block">
				<p>
					<?= $post->message ?>
				</p>
				<blockquote class="mb-10">Laporan telah berhasil diproses</blockquote>

				<img  src="<?php echo base_url()?>/assets/document/complaint/<?= $post->photo ?>" alt="..." class="img-responsive full-width">
				<div class="line no-margin"></div>
				<div class="no-padding mt-3">

					<ul class="nav nav-pills">
						<li><a href="https://www.google.com/maps/place/<?= $post->latitude ?>,<?= $post->longitude ?>" target="_blank"><i class="fa fa-map-marker"></i> <?= $post->latitude ?>,<?= $post->longitude ?></a>
						</li>
					</ul>
				</div>

			</div>

		</div>

	</div>
</div>

<?php }else{ ?>

<div class="col-lg-12 col-md-12">
	<div class="panel rounded shadow">
		<div class="panel-heading no-border">
			<div class="pull-left half">
				<div class="media">
					<div class="media-object pull-left">
						<img src="<?php echo base_url() ?>assets/photo/photo.jpg" alt="..." class="img-circle img-post">
						<a href="#" class="media-heading block h4"><?= $post->nama ?></a>
						<small class="block text-muted"><?php echo date('d F Y', strtotime($post->created_date));?> pada <?php echo date('H:i', strtotime($post->created_date));?></small>
					</div>
					<div class="media-body">
					</div>
				</div>
			</div><!-- /.pull-left -->
			<div class="clearfix"></div>
		</div><!-- /.panel-heading -->
		<div class="panel-body no-padding">
			<p>
				<?= $post->message ?>
			</p>
			<blockquote class="mb-10">Laporan telah diterima dan sedang diproses</blockquote>
			<img  src="<?php echo base_url()?>/assets/document/complaint/<?= $post->photo ?>" alt="..." class="img-responsive full-width">
			<div class="line no-margin"></div><!-- /.line -->
			<div class="no-padding mt-3">
				<ul class="nav nav-pills">
					<li><a href="https://www.google.com/maps/place/<?= $post->latitude ?>,<?= $post->longitude ?>" target="_blank"><i class="fa fa-map-marker"></i> <?= $post->latitude ?>,<?= $post->longitude ?></a>
					</li>
				</ul><!-- /.nav nav-pills -->
			</div><!-- /.panel-footer -->
		</div><!-- /.panel-body -->
	</div><!-- /.panel -->
</div>
<?php }} ?>