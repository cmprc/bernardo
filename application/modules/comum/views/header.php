<header>
  <nav class="navbar bg-transparent navbar-top navbar-transparent-no-sticky full-width-pull-menu white-link">

    <div class="container-fluid nav-header-container height-100px padding-three-half-lr sm-height-70px sm-padding-15px-lr">
      <div class="col d-none d-md-block pl-0">
        <div class="header-social-icon border-none no-padding-left no-margin-left">
          <?php if ($configs->instagram) { ?>
            <a href="<?php echo $configs->instagram; ?>" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a>
          <?php }
          if ($configs->behance) { ?>
            <a href="<?php echo $configs->behance; ?>" title="Behance" target="_blank"><i class="fab fa-behance"></i></a>
          <?php }
          if ($configs->linkedin) { ?>
            <a href="<?php echo $configs->linkedin; ?>" title="Linkedin" target="_blank"><i class="fab fa-linkedin"></i></a>
          <?php } ?>
        </div>
      </div>

      <div class="col text-right pr-0">
        <button class="navbar-toggler mobile-toggle d-inline-block" type="button" id="open-button">
          <div class="line"></div>
          <div class="line"></div>
          <div class="line"></div>
        </button>
        <div class="menu-wrap full-screen">
          <div class="link-wrapper">
            <ul class="font-weight-400 text-center alt-font text-uppercase text-extra-large line-height-20 letter-spacing-2" id="menu-options">
              <li><a href="<?= site_url(); ?>" class="link">Home</a></li>
              <li><a href="<?= site_url('sobre'); ?>" class="link">Sobre</a></li>
              <li><a href="<?= site_url('projetos'); ?>" class="link">Projetos</a></li>
              <li><a href="<?= site_url('projetos'); ?>" class="link">VFX</a></li>
              <li><a href="<?= site_url('stills'); ?>" class="link">Stills</a></li>
              <li><a href="<?= site_url('contato'); ?>" class="link">Contato</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

  </nav>
</header>
