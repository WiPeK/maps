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

<div class="panel panel-primary panel-kontakt">
	<div class="panel-heading">
		<h3 class="panel-title text-center">Kontakt</h3>
	</div>
	<div class="panel-body">
		<?php echo form_open(site_url('home/kontakt')); ?>
			<span class="label label-default">Email</span>
			<?php echo form_input('email', '', 'class="input_wp"'); ?>
			<div class="space50"></div>
			<span class="label label-default">Treść wiadomości</span>
				           <?php
				              $data_textarea = array(
				                'name' => 'body',
				                'class' => 'input_wp',
				                'rows' => 5,
				                'cols' => 113
				              );
				           echo form_textarea($data_textarea); ?>
			<div class="space50"></div>

		<?php echo form_submit('submit', 'Wyślij', 'class="btn btn-primary btn-lg btn-block no_border_radius"'); ?>		
		<?php echo form_close(); ?>
	</div>
</div>

<div id="map"></div>