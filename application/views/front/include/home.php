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

<div class="panel panel-primary panel-home" id="panel-about">
  <div class="panel-heading">
  <button type="button" class="close" aria-label="Close" id="panel-about-btn"><span aria-hidden="true">&times;</span></button>
    <h3 class="panel-title">O stronie</h3>
  </div>
  <div class="panel-body">
    Witamy na stronie <b><?php echo $ustawienia->name; ?></b>.
    Zapraszamy do dodawania swoich miejsc na naszej mapie.
    Dziel się z innymi ciekawymi miejscami oraz poznawaj miejsca innych użytkowników.
  </div>
</div>

<div class="panel panel-primary panel-home" id="panel-demo">
  <div class="panel-heading">
  <button type="button" class="close" aria-label="Close" id="panel-demo-btn"><span aria-hidden="true">&times;</span></button>
    <h3 class="panel-title">O stronie</h3>
  </div>
  <div class="panel-body">
    W wersji demo możesz logować się na: <br>
    <div class="well well-sm">Login: wipek</div>
    <div class="well well-sm">Hasło: 12345</div>
  </div>
</div>

<div id="map"></div>