<div id="photos">
  <?= $this->load->view('comum/page_title', array('title' => 'Stills', 'subtitle' => 'um pouco do meu olhar.')); ?>

  <section class="wow fadeIn padding-50px-top" style="visibility: visible; animation-name: fadeIn;">

    <div class="container">
      <div class="row">
        <div class="col-12 px-3 p-md-0">
          <div class="filter-content overflow-hidden">
            <ul class="portfolio-grid work-3col gutter-medium hover-option7" style="position: relative; height: 1262.65px;">
              <li class="grid-sizer" style="position: absolute; left: 0%; top: 0px;"></li>

              <?php foreach ($stills as $key => $item) { ?>
                <?php foreach ($item->images as $image) { ?>

                <li class="grid-item web branding design fadeInUp" style="position: absolute; left: 0%; top: 0px; visibility: visible; animation-name: fadeInUp;">
                    <figure>
                      <div class="portfolio-img">
                        <img src="<?= site_url('userfiles/stills/' . $image->file_name); ?>" alt="<?= $item->name; ?>">
                      </div>
                      <figcaption>
                        <div class="portfolio-hover-main text-center last-paragraph-no-margin">
                          <div class="portfolio-hover-box align-middle">
                            <div class="portfolio-hover-content position-relative">
                              <span class="font-weight-600 alt-font text-uppercase margin-one-bottom d-block text-white"><?= $item->name; ?></span>
                              <p class="text-medium-gray text-uppercase text-extra-small"><?= $item->description; ?></p>
                            </div>
                          </div>
                        </div>
                      </figcaption>
                    </figure>
                </li>
              <?php } ?>
              <?php } ?>

            </ul>
          </div>
        </div>
      </div>
    </div>

  </section>
</div>
