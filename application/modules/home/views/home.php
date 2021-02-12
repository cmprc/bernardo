<div class="bg-black position-absolute left-0 top-0 width-100 height-100">
  <section class="p-0">
    <div class="swiper-bottom-scrollbar-full swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide width-550px sm-width-100 sm-height-auto introduction-wrapper">
          <div class="position-relative width-90 height-100 d-flex align-items-center padding-ten-all sm-padding-fifteen-all sm-width-100">
            <div class="width-90">
              <h5 class="text-light-gray font-weight-300 margin-5px-bottom alt-font"><?= $block->title; ?></h5>
              <h6 class="text-light-gray font-weight-300 alt-font"><?= $block->subtitle; ?></h6>
              <div class="text-medium-gray text-medium sm-line-height-25 sm-text-small d-block float-left font-weight-300 line-height-30 introduction-text"><?= $block->text; ?></div>
              <img width="180" src="<?php echo base_img('signature.png'); ?>" alt="" class="signature">
            </div>
          </div>
        </div>
        <div class="swiper-slide width-auto sm-height-auto last-paragraph-no-margin first-slide">
          <div class="height-100 d-flex align-items-center">
            <div class="d-block position-relative img-container">
              <img src="<?php echo base_img('home/about.jpg'); ?>" alt="Sobre" />
              <!-- <p class="bottom-text width-100 text-extra-small text-white-2 text-uppercase text-center">Branding and Identity</p> -->
              <div class="scroll-container">
                <div class="scroll">
                  <img src="<?php echo base_img('arrow-next-light-dark.png'); ?>" alt="scroll-down">
                  <span class="text-uppercase text-extra-small text-medium-gray">scroll down</span>
                </div>
              </div>
            </div>
            <div class="hover-title-box padding-55px-lr width-300px md-width-100 md-padding-20px-lr">
              <div class="separator width-50px bg-black d-none d-xl-inline-block sm-margin-lr-auto"></div>
              <h3><a class="text-white-2 font-weight-600 alt-font text-white-2-hover" href="<?php echo site_url('sobre'); ?>">Sobre</a></h3>
            </div>

          </div>
        </div>
        <div class="swiper-slide width-auto sm-height-auto last-paragraph-no-margin">
          <div class="height-100 d-flex align-items-center">
            <div class="d-block position-relative img-container">
              <img src="<?php echo base_img('home/project.jpg'); ?>" alt="Projetos" />
            </div>
            <div class="hover-title-box padding-55px-lr width-300px md-width-100 md-padding-20px-lr">
              <div class="separator width-50px bg-black d-none d-xl-inline-block sm-margin-lr-auto"></div>
              <h3><a class="text-white-2 font-weight-600 alt-font text-white-2-hover" href="<?php echo site_url('projetos'); ?>">Projetos</a></h3>
            </div>
          </div>
        </div>
        <div class="swiper-slide width-auto sm-height-auto last-paragraph-no-margin">
          <div class="height-100 d-flex align-items-center">
            <div class="d-block position-relative img-container">
              <img src="<?php echo base_img('home/vfx.jpg'); ?>" alt="VFX" />
            </div>
            <div class="hover-title-box padding-55px-lr width-300px md-width-100 md-padding-20px-lr">
              <div class="separator width-50px bg-black d-none d-xl-inline-block sm-margin-lr-auto"></div>
              <h3><a class="text-white-2 font-weight-600 alt-font text-white-2-hover" href="<?php echo site_url('vfx'); ?>">VFX</a></h3>
            </div>
          </div>
        </div>
        <div class="swiper-slide width-auto sm-height-auto last-paragraph-no-margin">
          <div class="height-100 d-flex align-items-center">
            <div class="d-block position-relative img-container">
              <img src="<?php echo base_img('home/stills.jpg'); ?>" alt="Stills" class="no-light" />
            </div>
            <div class="hover-title-box padding-55px-lr width-300px md-width-100 md-padding-20px-lr">
              <div class="separator width-50px bg-black d-none d-xl-inline-block sm-margin-lr-auto"></div>
              <h3><a class="text-white-2 font-weight-600 alt-font text-white-2-hover" href="<?php echo site_url('stills'); ?>">Stills</a></h3>
            </div>
          </div>
        </div>
        <div class="swiper-slide width-auto sm-height-auto last-paragraph-no-margin">
          <div class="height-100 d-flex align-items-center">
            <div class="d-block position-relative img-container">
              <img src="<?php echo base_img('home/contact.jpg'); ?>" alt="Contato" class="no-light" />
            </div>
            <div class="hover-title-box padding-55px-lr width-300px md-width-100 md-padding-20px-lr">
              <div class="separator width-50px bg-black d-none d-xl-inline-block sm-margin-lr-auto"></div>
              <h3><a class="text-white-2 font-weight-600 alt-font text-white-2-hover" href="<?php echo site_url('contato'); ?>">Contato</a></h3>
            </div>
          </div>
        </div>
        <div class="swiper-slide width-150px sm-width-100 sm-height-auto">
        </div>
      </div>
      <div class="swiper-scrollbar d-none d-md-inline-block"></div>
      <div class="swiper-pagination-vertical position-fixed z-index-5"></div>
    </div>
  </section>
</div>
