<div id="contact">
  <?= $this->load->view('comum/page_title', array('title' => 'Contato', 'subtitle' => 'tem um desafio para mim?')); ?>

  <section class="contact wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
    <div class="container">
      <div class="row">
        <div class="col-md-4 item">
          <div class="data-wrapper padding-eighteen-lr lg-padding-twelve-lr text-center md-padding-ten-lr sm-padding-seven-all">
            <a class="margin-15px-right text-large" href="mailto:<?= $configs->email; ?>"><?= $configs->email; ?></a>
            <i class="fa fa-envelope-open fa-2x"></i>
          </div>
        </div>
        <div class="col-md-4">
          <div class="padding-eighteen-lr lg-padding-twelve-lr text-center md-padding-ten-lr sm-padding-seven-all">
            <div class="alt-font text-large text-white">Vamos <br> conversar</div>
          </div>
        </div>
        <div class="col-md-4 item">
          <div class="data-wrapper padding-eighteen-lr lg-padding-twelve-lr text-center md-padding-ten-lr sm-padding-seven-all">
            <i class="fab fa-whatsapp fa-2x"></i>
            <a class="margin-15px-left text-large" href="tel:<?= $configs->phone; ?>"><?= $configs->phone; ?></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-xl-5 col-md-6 margin-four-bottom md-margin-30px-bottom sm-margin-30px-bottom text-center">
          <div class="alt-font text-medium-gray margin-5px-bottom text-uppercase text-extra-large">Me mande uma mensagem</div>
          <div class="alt-font font-weight-400 line-height-30 text-medium">Assim que possível, entrarei em contato com você.</div>
        </div>
      </div>
      <form id="contact-form">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-8 wow fadeIn text-center" style="visibility: visible; animation-name: fadeIn;">

            <div class="success-container">
              <div class="content">
                <i class="fas fa-check"></i>
                <div class="alt-font text-small text-white text-uppercase">Mesagem enviada com sucesso!</div>
              </div>
            </div>

            <div class="loading">
              <div class="content">
                <i class="fas fa-slash fa-spin"></i>
                <div class="alt-font text-small text-uppercase">Enviando...</div>
              </div>
            </div>

            <input type="text" name="name" id="name" placeholder="Nome *" class="input-border-bottom">
            <input type="text" name="email" id="email" placeholder="E-mail *" class="input-border-bottom">
            <input type="text" id="subject" name="subject" placeholder="Assunto" class="input-border-bottom">
            <textarea name="message" id="message" placeholder="Mensagem" class="input-border-bottom"></textarea>
            <button type="submit" class="btn btn-small btn-transparent-white margin-30px-top sm-margin-three-top">Enviar</button>
          </div>
        </div>
      </form>
    </div>
  </section>
  <section class="social-media wow fadeIn">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-10 col-lg-12 text-center elements-social social-icon-style-2">
          <ul class="large-icon no-margin-bottom">
            <?php if ($configs->instagram) { ?>
              <li><a class="text-white-2" href="<?php echo $configs->instagram; ?>" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a></li>
            <?php }
            if ($configs->behance) { ?>
              <li><a class="text-white-2" href="<?php echo $configs->behance; ?>" title="Behance" target="_blank"><i class="fab fa-behance"></i></a></li>
            <?php }
            if ($configs->linkedin) { ?>
              <li><a class="text-white-2" href="<?php echo $configs->linkedin; ?>" title="Linkedin" target="_blank"><i class="fab fa-linkedin"></i></a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </section>
</div>
