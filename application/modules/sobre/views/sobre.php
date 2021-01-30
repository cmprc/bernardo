<div id="about">
  <?= $this->load->view('comum/page_title', array('title' => 'Hey', 'subtitle' => 'não se preocupe. <br> você está em boas mãos.')); ?>

  <div class="my-data">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-4 text-right">
          <h6 class="alt-font"><?= $blocks['sobre-um-pouco-sobre-mim']->title; ?></h6>
          <div class="alt-font text-small">
            <?= $blocks['sobre-um-pouco-sobre-mim']->text; ?>
          </div>
        </div>
        <div class="col-md-4 text-center">
            <?php if(isset($blocks['sobre-um-pouco-sobre-mim']->image)){ ?>
                <img src="<?= site_url('userfiles/blocos/' . $blocks['sobre-um-pouco-sobre-mim']->image); ?>" alt="Bernardo">
             <?php } ?>
        </div>
        <div class="col-md-4 text-center">
          <div class="skillbar-bar-main skillbar-bar-style3">
            <div class="skillbar margin-45px-bottom appear" data-percent="<?= $blocks['sobre-minhas-habilidades-primeiro']->subtitle; ?>%">
              <span class="skill-bar-text text-extra-small text-uppercase text-dark-gray"><?= $blocks['sobre-minhas-habilidades-primeiro']->title; ?></span>
              <p class="skillbar-bar" style="width: <?= $blocks['sobre-minhas-habilidades-primeiro']->subtitle; ?>%;"></p>
              <span class="skill-bar-percent text-small"><?= $blocks['sobre-minhas-habilidades-primeiro']->subtitle; ?>%</span>
            </div>
            <div class="skillbar margin-45px-bottom appear" data-percent="<?= $blocks['sobre-minhas-habilidades-segundo']->subtitle; ?>%">
              <span class="skill-bar-text text-extra-small text-uppercase text-dark-gray"><?= $blocks['sobre-minhas-habilidades-segundo']->title; ?></span>
              <p class="skillbar-bar" style="width: <?= $blocks['sobre-minhas-habilidades-segundo']->subtitle; ?>%;"></p>
              <span class="skill-bar-percent text-small"><?= $blocks['sobre-minhas-habilidades-segundo']->subtitle; ?>%</span>
            </div>
            <div class="skillbar margin-45px-bottom appear" data-percent="<?= $blocks['sobre-minhas-habilidades-terceiro']->subtitle; ?>%">
              <span class="skill-bar-text text-extra-small text-uppercase text-dark-gray"><?= $blocks['sobre-minhas-habilidades-terceiro']->title; ?></span>
              <p class="skillbar-bar" style="width: <?= $blocks['sobre-minhas-habilidades-terceiro']->subtitle; ?>%;"></p>
              <span class="skill-bar-percent text-small"><?= $blocks['sobre-minhas-habilidades-terceiro']->subtitle; ?>%</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="projects">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-4 col-md-6 md-margin-five-bottom md-padding-15px-left sm-margin-30px-bottom text-center wow fadeInDown" style="visibility: visible; animation-name: fadeInDown;">
          <h6 class="text-white-2 font-weight-300 margin-10px-bottom timer appear" data-speed="2000" data-to="<?= $blocks['sobre-dados-primeiro']->subtitle; ?>"><?= $blocks['sobre-dados-primeiro']->subtitle; ?></h6>
          <span class="d-block margin-three-bottom text-small font-weight-400 text-uppercase"><?= $blocks['sobre-dados-primeiro']->title; ?></span>
          <div class="separator-line-verticle-large bg-deep-pink d-inline-block"></div>
        </div>
        <div class="col-12 col-lg-4 col-md-6 md-margin-five-bottom md-padding-15px-left sm-margin-30px-bottom text-center wow fadeInDown" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInDown;">
          <h6 class="text-white-2 font-weight-300 margin-10px-bottom timer appear" data-speed="2000" data-to="<?= $blocks['sobre-dados-segundo']->subtitle; ?>"><?= $blocks['sobre-dados-segundo']->subtitle; ?></h6>
          <span class="d-block margin-three-bottom text-small font-weight-400 text-uppercase"><?= $blocks['sobre-dados-segundo']->title; ?></span>
          <div class="separator-line-verticle-large bg-deep-pink d-inline-block"></div>
        </div>
        <div class="col-12 col-lg-4 col-md-6 md-padding-15px-left sm-margin-30px-bottom text-center  wow fadeInDown" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInDown;">
          <h6 class="text-white-2 font-weight-300 margin-10px-bottom timer appear" data-speed="150000" data-to="<?= $blocks['sobre-dados-terceiro']->subtitle; ?>"><?= $blocks['sobre-dados-terceiro']->subtitle; ?></h6>
          <span class="d-block margin-three-bottom text-small font-weight-400 text-uppercase"><?= $blocks['sobre-dados-terceiro']->title; ?></span>
          <div class="separator-line-verticle-large bg-deep-pink d-inline-block"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="why">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-4 md-margin-40px-bottom text-right sm-margin-30px-bottom">
          <h6 class="text-white font-weight-300 alt-font m-0 width-80 line-height-40">Por que meus <strong>serviços</strong> valem a pena?</h6>
        </div>
        <div class="col-12 col-lg-4 col-md-6 text-center text-lg-left sm-margin-30px-bottom wow fadeIn last-paragraph-no-margin" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
          <div class="row m-0">
            <div class="col-12 col-lg-3 text-center sm-no-padding-lr">
              <h2 class="text-light-gray alt-font letter-spacing-minus-3 mb-0 md-margin-10px-bottom">01</h2>
            </div>
            <div class="col-12 col-lg-9 margin-5px-top sm-text-center sm-no-padding-lr">
              <span class="alt-font text-large text-white margin-5px-bottom d-block"><?= $blocks['sobre-servicos-01']->title; ?></span>
              <div class="width-80 lg-width-100"><?= $blocks['sobre-servicos-01']->text; ?></div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-4 col-md-6 text-center text-lg-left wow fadeIn last-paragraph-no-margin" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeIn;">
          <div class="row m-0">
            <div class="col-12 col-lg-3 text-center sm-no-padding-lr">
              <h2 class="text-light-gray alt-font letter-spacing-minus-3 mb-0 md-margin-10px-bottom">02</h2>
            </div>
            <div class="col-12 col-lg-9 margin-5px-top sm-text-center sm-no-padding-lr">
              <span class="alt-font text-large text-white margin-5px-bottom d-block"><?= $blocks['sobre-servicos-02']->title; ?></span>
              <div class="width-80 lg-width-100"><?= $blocks['sobre-servicos-02']->text; ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="clients">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-xl-5 col-md-6 margin-four-bottom md-margin-30px-bottom sm-margin-30px-bottom text-center">
          <div class="alt-font text-medium-gray margin-5px-bottom text-uppercase text-large">Clientes satisfeitos</div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-md-4"><a href="#"><img src="<?= site_url('userfiles/clientes/3g.png'); ?>" alt="3G"></a></div>
        <div class="col-12 col-md-4"><a href="#"><img src="<?= site_url('userfiles/clientes/bellopano.jpg'); ?>" alt="BelloPano"></a></div>
        <div class="col-12 col-md-4"><a href="#"><img src="<?= site_url('userfiles/clientes/linklei.jpg'); ?>" alt="LinkLei"></a></div>
        <div class="col-12 col-md-4"><a href="#"><img src="<?= site_url('userfiles/clientes/marcopolo.jpg'); ?>" alt="Fundação Marcopolo"></a></div>
        <div class="col-12 col-md-4"><a href="#"><img src="<?= site_url('userfiles/clientes/mf.png'); ?>" alt="MF"></a></div>
        <div class="col-12 col-md-4"><a href="#"><img src="<?= site_url('userfiles/clientes/san-martin.jpg'); ?>" alt="San Martin"></a></div>
        <div class="col-12 col-md-4"><a href="#"><img src="<?= site_url('userfiles/clientes/sonhar.png'); ?>" alt="Sonhar"></a></div>
        <div class="col-12 col-md-4"><a href="#"><img src="<?= site_url('userfiles/clientes/soulshi.jpg'); ?>" alt="Soulshi"></a></div>
        <div class="col-12 col-md-4"><a href="#"><img src="<?= site_url('userfiles/clientes/xtrategy.jpg'); ?>" alt="Xtrategy"></a></div>
      </div>
    </div>
  </div>
</div>
