<div class="menu_bar">
	<?php $this->load->view('front/include/navbar'); ?>
</div>
<?php if(isset($_SESSION['message_kat'])): ?>
	<div class="alert alert-warning no_border_radius alert_sr" role="alert">
		<?php echo $_SESSION['message_kat'];
			unset($_SESSION['message_kat']);
		?>
	</div>
<?php endif; ?>
<div class="panel panel-primary panel_manage_places">
  <div class="panel-heading">
    <h3 class="panel-title">Oczekujące miejsca</h3>
  </div>
  <div class="panel-body">
  	<div class="alert alert-info no_border_radius" role="alert">
  		Zarządzaj oczekującymi miejscami
  	</div>
	<?php if (isset($places_wait) && !empty($places_wait)): ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th class="text-center">Tytuł</th>
					<th class="text-center">Zobacz</th>
					<th class="text-center">Zaakceptuj</th>
					<th class="text-center">Usuń miejsce</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($places_wait as $plwt): ?>
					<tr>
						<td>
							<?php echo $plwt->title; ?>
						</td>
						<td>
							<?php echo anchor(site_url() . 'admin/show_place/' . $plwt->id, '<i class="glyphicon glyphicon-eye-open"></i>', 'class="text-center center-block"'); ?>
						</td>
						<td>
							<?php echo anchor(site_url() . 'admin/accept_place/' . $plwt->id, '<i class="glyphicon glyphicon-ok"></i>', 'class="text-center center-block"'); ?>
						</td>
						<td>
							<?php echo anchor(site_url() . 'admin/delete_place/' . $plwt->id, '<i class="glyphicon glyphicon-remove"></i>', 'class="text-center center-block"'); ?>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	<?php endif ?>
  </div>
</div>
<div class="panel panel-primary panel_acc_places">
  <div class="panel-heading">
    <h3 class="panel-title">Zaakceptowane miejsca</h3>
  </div>
  <div class="panel-body">
  	<div class="alert alert-info no_border_radius" role="alert">
  		Zarządzaj miejscami
  	</div>
	<?php if (isset($places_acc) && !empty($places_acc)): ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th class="text-center">Tytuł</th>
					<th class="text-center">Zobacz</th>
					<th class="text-center">Przenieś do oczekujących</th>
					<th class="text-center">Usuń miejsce</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($places_acc as $plac): ?>
					<tr>
						<td>
							<?php echo $plac->title; ?>
						</td>
						<td>
							<?php echo anchor(site_url() . 'admin/show_place/' . $plac->id, '<i class="glyphicon glyphicon-eye-open"></i>', 'class="text-center center-block"'); ?>
						</td>
						<td>
							<?php echo anchor(site_url() . 'admin/dec_place/' . $plac->id, '<i class="glyphicon glyphicon-minus"></i>', 'class="text-center center-block"'); ?>
						</td>
						<td>
							<?php echo anchor(site_url() . 'admin/delete_place/' . $plac->id, '<i class="glyphicon glyphicon-remove"></i>', 'class="text-center center-block"'); ?>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	<?php endif ?>
  </div>
</div>
<div id="map"></div>