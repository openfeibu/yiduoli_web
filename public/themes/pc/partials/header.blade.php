<header class="navbar-fixed-top  fadeInUp animated transition500" data-wow-duration=".6s" data-wow-delay=".3s">
    <div class="headerBg transition500">
        <div class="container w1400">
            <div class="logo pull-left fadeInUp animated transition500">
                <a href="{{ route('pc.home') }}">
                    <h1 hidden="">{{ setting('station_name') }}</h1>
                    <img class="logo1" src="{!! theme_asset('images/foter-logo.png') !!}" alt="{{ setting('station_name') }}" class="block">
                    <img class="logo2" src="{!! theme_asset('images/logo.png') !!}" alt="{{ setting('station_name') }}" class="block">
                </a>
            </div>
            <div class="headerRight pull-right transition500">
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
                        @inject('navListPresenter','App\Repositories\Presenter\NavListPresenter')

                        {!! $navListPresenter->navs('web_top') !!}
                    </ul>
                </div>

            </div>
            <div class="menu"></div>

        </div>
    </div>
</header>