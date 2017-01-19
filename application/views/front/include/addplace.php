<div class="menu_bar">
	<?php $this->load->view('front/include/navbar'); ?>
</div>
<div class="panel panel-primary add_place_info">
  <div class="panel-heading">
    <h3 class="panel-title">Współrzędne</h3>
  </div>
  <div class="panel-body">
  	<div class="alert alert-info no_border_radius" role="alert">
  		Aby dodać swoje miejsce kliknij prawym przyciskiem myszy w odpowiednim miejscu na mapie. A następnie wypełnij formularz po prawej stronie.
  	</div>
		<span class="label label-default">Szerokość</span>
		<?php echo form_input('lat', '', 'class="input_wp" id="szerin"'); ?>
		<div class="clearfix"></div>
		<span class="label label-default">Długość</span>
		<?php echo form_input('lng', '', 'class="input_wp" id="dlugin"'); ?>
  </div>
</div>
<?php if(isset($_SESSION['message_kat'])): ?>
	<div class="alert alert-warning no_border_radius alert_sr" role="alert">
		<?php echo $_SESSION['message_kat'];
			unset($_SESSION['message_kat']);
		?>
	</div>
<?php endif; ?>
<div class="panel panel-primary add_place_form">
  <div class="panel-heading">
    <h3 class="panel-title">Dodaj swoje miejsce</h3>
  </div>
  <div class="panel-body">
		<?php echo form_open_multipart(site_url('Addplace/save_place')); ?>
		<span class="label label-default">Tytuł</span><br>
		<?php echo form_input('title', '', 'class="input_wp"'); ?>
		<span class="label label-default">Zdjęcie</span><br>
		<?php echo form_upload('placeph','','class="input_file"'); ?>
		<span class="label label-default">Ikona</span><br>
		<button type="button" class="btn btn-primary btn-xs btn-block no_border_radius" data-toggle="modal" data-target=".bs-example-modal-lg">
		  Wybierz ikone
		</button> <br>
		<div id="icon_form"></div> <br>
		<?php echo form_hidden('iconin'); ?>
		<span class="label label-default">Strona www</span><br>
		<?php echo form_input('strona', '', 'class="input_wp"'); ?>
		<span class="label label-default">Opis</span><br>
		<?php echo form_textarea('opis', '', 'class="input_wp" id="area_form"'); ?>
		<div class="clearfix"></div>
		<!-- <span class="label label-default">Szerokość</span> -->
		<?php echo form_hidden('lat'); ?>
		<!-- <span class="label label-default">Długość</span> -->
		<?php echo form_hidden('lng'); ?>
		<div class="clearfix"></div>
		<?php echo form_submit('submit', 'Dodaj swoje miejsce', 'class="btn btn-primary btn-lg btn-block no_border_radius"'); ?>
		<?php echo form_close(); ?>
  </div>
</div>
<div id="map"></div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modalIcon">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
      	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Wybierz ikone</h4>
      </div>
      <div class="modal-body">
      	<div class="icons_bar">
      		<?php if(isset($icons)): ?>
      			<ul>
      				<?php foreach ($icons as $icon): ?>
						<li>
							<img src="<?php echo site_url() . 'assets/icons/' . $icon; ?>" alt="<?php echo $icon; ?>" class="img_iconf">
						</li>
      				<?php endforeach; ?>
      			</ul>
      		<?php else: ?>
				<div class="alert alert-warning" role="alert">
					W folderze assets/icons/ nie znaleziono plików ikon
				</div>
      		<?php endif; ?>
      		<ul>
      			
      		</ul>
      	</div>
      </div>
    </div>
  </div>
</div>