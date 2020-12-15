<div class="header-area">
    <div class="row align-items-center">
        <div class="col-md-6 col-sm-8 clearfix">
            <div class="nav-btn pull-left">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="search-box pull-left">
                <?php if (!in_array($module, array('home', 'configuracoes', 'paginas'))) { ?>
                    <form id="search" method="POST" action="<?php echo site_url($module . '/search'); ?>">
                        <input type="text" name="search" placeholder="Buscar" value="<?php echo isset($search) ? $search : ''; ?>" required="">
                        <?php if (isset($search)) { ?>
                            <a href="<?php echo site_url($module); ?>"><i class="ti-close close"></i></a>
                        <?php } ?>
                        <button type="submit"><i class="ti-search"></i></button>
                    </form>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-6 col-sm-4 clearfix">
            <ul class="notification-area pull-right">
                <li class="website">
                    <a href="<?php echo site_url('../'); ?>" target="_blank" title="Visualizar Site">
                        <i class="ti-eye"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url(); ?>" title="Página Inicial">
                        <i class="ti-home"></i>
                    </a>
                </li>
                <li id="full-view" title="Full Screen"><i class="ti-fullscreen"></i></li>
                <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                <li class="settings-btn">
                    <a href="<?php echo site_url('configuracoes'); ?>" title="Configurações">
                        <i class="ti-settings"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
