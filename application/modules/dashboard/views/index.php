<section class="content-counter">
	
	<div class="row">
		<!-- enrollment -->

		<div class="col-md-3">
			<div class="card">
				<div class="card-body h-200">
					<label><i class="fa fa-users"></i> Enrollment count</label>
					<hr>
					<center>
						<h1>0</h1>
					<span>Students</span></center>
				</div>
			</div>
		</div>

		<!-- collections -->

		<div class="col-md-3">
			<div class="card">
				<div class="card-body h-200">
					<label><i class="fa fa-users"></i> Total collections</label>
					<hr>
					<center>
						<h1>0</h1>
					<span>Students</span></center>
				</div>
			</div>
		</div>
		<!-- attendance rate -->

		<div class="col-md-3">
			<div class="card">
				<div class="card-body h-200">

					<label><i class="fa fa-users"></i> Attendace Rate</label>
					<hr>
					<center>
						<h1>0%</h1>
					<span>Percent</span></center>

				</div>
			</div>
		</div>

		<?php if (!$this->aauth->is_admin()): ?>
			
		<!-- scanner -->
		<div class="col-md-3">
			<div class="card">
				<div class="card-body h-200">

					<label><i class="fa fa-qrcode"></i></label>
					<hr>
					<center><a class="btn btn-block btn-outline-primary" href="<?=site_url('collections/scanner')?>">SCAN NOW</a></center>
					<span>&nbsp;</span>
				</div>
			</div>
		</div>
	<?php else: ?>

		<div class="col-md-3">
			<div class="card">
				<div class="card-body h-200">

					<label><i class="fa fa-users"></i> Recents Accounts</label>
					<hr>
					<center>
						<h1>0</h1>
					<span>User</span></center>

				</div>
			</div>
		</div>

		<?php endif ?>
	</div>
</section>