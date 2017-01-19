<?php $this->load->view('front/include/header'); ?>

<?php $this->load->view($subview); ?>
<span class="label label-default label-created">
	Strona wykonana przez: <br>
	<a href="http://www.wipek.pl">WiPeK</a>
</span>
<!-- cookie info -->
<div class="panel panel-default" id="cookieinfo">
  <div class="panel-body">
    Ta strona używa ciasteczek (cookies), dzięki którym nasz serwis może działać lepiej. <a href="http://wszystkoociasteczkach.pl/" target="_blank">Dowiedz się więcej</a>
    <button id="cookieinfobtn" type="button" class="btn btn-primary">OK, rozumiem</button> 
  </div>
</div>
<?php if (isset($admin) &&  ($admin== true)): ?>
	<?php $this->load->view('front/include/footer_admin'); ?>
<?php else: ?>
	<?php $this->load->view('front/include/footer'); ?>
<?php endif; ?>