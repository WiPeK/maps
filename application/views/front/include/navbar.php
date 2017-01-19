<nav class="navbar navbar-default nav_map">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo site_url(); ?>"><?php echo $ustawienia->name; ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo site_url('Addplace'); ?>">Dodaj swoje miejsce</a></li>
        <li><a href="<?php echo site_url('home/kontakt'); ?>">Kontakt</a></li>
        <?php if($this->user_m->loggedin() == TRUE): ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administracja<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('admin/manage_place'); ?>">Zarządzaj miejscami</a></li>
            <li><a href="<?php echo site_url('admin/ustawienia'); ?>">Ustawienia strony</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo site_url('home/logout'); ?>">Wyloguj</a></li>
          </ul>
        </li>
        <?php endif; ?>
        <?php if($this->user_m->loggedin() == FALSE): ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Logowanie<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php echo form_open(site_url('home/logowanie')); ?>
              <li><span class="label label-default lab_log">Login</span><br><?php echo form_input('login', '', 'class="input_log"'); ?></li>
              <li><span class="label label-default lab_log">Hasło</span><br><?php echo form_password('password', '', 'class="input_log"'); ?></li>
            <li role="separator" class="divider"></li>
            <li><?php echo form_submit('submit', 'Zaloguj', 'class="btn btn-primary btn-md btn_log"'); ?></li>
            <?php echo form_close(); ?>
          </ul>
        </li>
      <?php endif; ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>