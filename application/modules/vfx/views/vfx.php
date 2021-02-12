<div id="vfx">
    <?= $this->load->view('comum/page_title', array('title' => 'VFX', 'subtitle' => 'efeitos visuais feitos em 2020.')); ?>

    <?php if (empty($videos)) { ?>
        <div class="no-videos alt-font font-weight-400 line-height-30 text-small text-white text-uppercase">Não há vídeos cadastrados ainda.</div>
    <?php } else { ?>
        <section class="wow fadeIn padding-50px-top" style="visibility: visible; animation-name: fadeIn;">
            <div class="container">
                <div class="row">
                    <div class="col-12 px-3 p-md-0">
                        <ul class="vfx-grid portfolio-grid work-1col hover-option4 gutter-medium">
                            <li class="grid-sizer"></li>
                            <?php foreach ($videos as $key => $item) { ?>
                                <li class="grid-item fadeInUp">
                                    <iframe src="https://www.youtube.com/embed/<?= $item->youtube_link; ?>" frameborder="0" allowfullscreen></iframe>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

</div>
