<div id="projects">
    <?= $this->load->view('comum/page_title', array('title' => 'Projetos', 'subtitle' => 'produções recentes.')); ?>

    <?php if (empty($videos)) { ?>
        <div class="no-videos alt-font font-weight-400 line-height-30 text-small text-white text-uppercase">Não há projetos cadastrados ainda.</div>
    <?php } else { ?>
        <section class="wow fadeIn padding-50px-top" style="visibility: visible; animation-name: fadeIn;">
            <div class="tabs-links container">
                <div class="row">
                    <div class="col-12">
                        <ul class="portfolio-filter nav nav-tabs justify-content-center border-0 portfolio-filter-tab-1 font-weight-600 alt-font text-uppercase text-center margin-80px-bottom text-small md-margin-40px-bottom sm-margin-20px-bottom">
                            <li class="nav">
                                <a href="javascript:void(0);" data-filter=".fotografia" class="light-gray-text-link text-very-small">Fotografia em vídeos</a></li>
                            <li class="nav active">
                                <a href="javascript:void(0);" data-filter=".video" class="light-gray-text-link text-very-small">Vídeos</a></li>
                            <li class="nav">
                                <a href="javascript:void(0);" data-filter=".projeto" class="light-gray-text-link text-very-small">Projetos independentes</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12 px-3 p-md-0">
                        <ul class="projects-grid portfolio-grid work-1col hover-option4 gutter-medium">
                            <li class="grid-sizer"></li>
                            <?php foreach ($videos as $key => $item) { ?>
                                <li class="grid-item <?= $item->category; ?> fadeInUp">
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
