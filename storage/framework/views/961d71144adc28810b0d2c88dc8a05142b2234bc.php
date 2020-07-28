<header class="navbar-fixed-top  fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
    <div class="headerBg transition500">
        <div class="container w1400">
            <div class="logo pull-left rubberBand animated">
                <a href="<?php echo e(route('pc.home')); ?>">
                    <h1 hidden=""><?php echo e(setting('station_name')); ?></h1>
                    <img class="logo1" src="<?php echo theme_asset('images/foter-logo.png'); ?>" alt="<?php echo e(setting('station_name')); ?>" class="block">
                    <img class="logo2" src="<?php echo theme_asset('images/logo.png'); ?>" alt="<?php echo e(setting('station_name')); ?>" class="block">
                </a>
            </div>
            <div class="headerRight pull-right">
                <div class="lang pull-right">
                    <div class="lang-con">
                        Language<span class="caret"></span>
                    </div>
                    <dl>
                        <dd class="active"><a href="/">中文</a></dd>
                        <dd><a href="http://intl.yiduoli.com/">English</a></dd>
                    </dl>

                </div>
                <div class="nav pull-right">
                    <ul>
                        <?php $navListPresenter = app('App\Repositories\Presenter\NavListPresenter'); ?>

                        <?php echo $navListPresenter->navs('web_top'); ?>

                    </ul>
                </div>

            </div>
            <div class="menu"></div>

        </div>
    </div>
</header>