<div id="photos">
    <?= $this->load->view('comum/page_title', array('title' => 'Stills', 'subtitle' => 'um pouco do meu olhar.')); ?>

    <section class="wow fadeIn padding-50px-top">
        <div class="container">
            <div class="row">
                <div class="col-12 p-0 lightbox-portfolio">
                    <div id="justified" class="justified-gallery">

                        <?php foreach ($stills as $key => $item) { ?>
                            <?php foreach ($item->images as $image) { ?>
                                <div class="wow fadeInUp">
                                    <a href="<?= site_url('userfiles/stills/' . $image->file_name); ?>" class="gallery-link">
                                        <img src="<?= site_url('userfiles/stills/' . $image->file_name); ?>" alt="<?= $item->name; ?>">
                                    </a>
                                </div>
                            <?php } ?>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
