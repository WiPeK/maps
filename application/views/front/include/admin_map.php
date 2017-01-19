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
<div class="panel panel-default show_manage">
  <div class="panel-heading">
    <h3 class="panel-title text-center">Zarządzaj</h3>
  </div>
  <div class="panel-body">
	<a href="<?php echo site_url() . 'admin/manage_place'; ?> ">
		<button type="button" id="wrocmanage" class="btn_man">
			<i class="glyphicon glyphicon-repeat"></i>
			Wróć do zarządzania miejscami
		</button>
	</a>
<div class="clearix"></div>
	<?php if ($place->status == 0): ?>
		<a href="<?php echo site_url() . 'admin/accept_place/' . $place->id; ?> ">
			<button type="button" id="accmanage" class="btn_man">
				<i class="glyphicon glyphicon-ok"></i>
				Zaakceptuj miejsce
			</button>
		</a>
	<?php elseif($place->status == 1): ?>	
		<a href="<?php echo site_url() . 'admin/dec_place/' . $place->id; ?> ">
			<button type="button" id="decmanage" class="btn_man">
				<i class="glyphicon glyphicon-repeat"></i>
				Przenieś do oczekujących
			</button>
		</a>
	<?php endif; ?>
<div class="clearfix"></div>
	<a href="<?php echo site_url() . 'admin/delete_place/' . $place->id; ?> ">
		<button type="button" id="remmanage" class="btn_man">
			<i class="glyphicon glyphicon-remove"></i>
			Usuń miejsce
		</button>
	</a>
  </div>
</div>
<div id="map"></div>