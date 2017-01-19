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

<div class="panel panel-primary panel-ustawienia">
	<div class="panel-heading">
		<h3 class="panel-title text-center">Ustawienia</h3>
	</div>
	<div class="panel-body">
		<?php echo form_open(site_url('admin/save_ust')); ?>
		<div class="column pull-left">
			<span class="label label-default">Nazwa strony</span>
			<?php echo form_input('name', $ustawienia->name, 'class="input_wp"'); ?>
			<div class="space50"></div>
			<span class="label label-default">Login gmail (potrzebny do kontaktu)</span>
			<?php echo form_input('gmail_log', $ustawienia->gmail_log, 'class="input_wp"'); ?>
			<div class="space50"></div>
			<span class="label label-default">Hasło gmail (potrzebny do kontaktu)</span>
			<?php echo form_password('gmail_pass', '', 'class="input_wp"'); ?>
		</div>
		<div class="column pull-right">
			<span class="label label-default">Opis portalu</span>
				           <?php
				              $data_textarea = array(
				                'name' => 'description',
				                'value' => $ustawienia->description,
				                'class' => 'input_wp',
				                'rows' => 5,
				                'cols' => 113
				              );
				           echo form_textarea($data_textarea); ?>
			<div class="space50"></div>
			<span class="label label-default">Słowa kluczowe oddzielone przecinkiem</span>
			<?php echo form_input('keywords', $ustawienia->keywords, 'class="input_wp"'); ?>
		</div>
		<?php echo form_submit('submit', 'Zapisz ustawienia', 'class="btn btn-primary btn-lg btn-block no_border_radius"'); ?>		
		<?php echo form_close(); ?>
	</div>
</div>

<div id="map"></div>