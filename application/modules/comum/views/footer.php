<footer class="footer-strip-dark padding-60px-tb lg-padding-50px-tb md-padding-50px-tb sm-padding-40px-tb">
    <div class="container">

        <?php if ($module != 'contato') { ?>
            <div class="row align-items-center sm-text-center">
                <div class="col-md-8 col-12 sm-margin-30px-bottom">
                    <h6 class="text-white margin-5px-bottom">podemos começar algo juntos.</h6>
                    <span class="text-medium">entre em contato para conversarmos.</span>
                </div>
                <div class="col-md-4 col-12 text-md-right text-sm-center">
                    <span class="text-medium text-extra-dark-gray text-light-gray d-inline-block sm-d-block">
                        <a href="<?php echo site_url('contato'); ?>" class="btn btn-small btn-transparent-white d-table d-lg-inline-block md-margin-lr-auto">
                            Contato
                        </a>
                    </span>
                </div>
            </div>
        <?php } ?>

        <div class="border-top border-color-medium-dark-gray padding-50px-top margin-50px-top lg-padding-60px-top lg-margin-60px-top md-padding-50px-top md-margin-50px-top sm-padding-40px-top sm-margin-40px-top">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-5 col-12 sm-margin-30px-bottom text-small sm-text-center">
                    &copy; <?php echo date('Y') . ' ' .   $configs->name; ?>.
                </div>
                <div class="col-lg-4 col-md-4 col-12 sm-margin-30px-bottom text-small text-center">
                    <?php echo $configs->phone; ?><br>
                    <a href="mailto:<?php echo $configs->email; ?>"><?php echo $configs->email; ?></a>
                </div>
                <div class="col-lg-4 col-md-3 text-md-right sm-text-center">
                    <div class="social-icon-style-8 d-inline-block vertical-align-middle">
                        <ul class="small-icon mb-0">
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
        </div>
    </div>
</footer>
