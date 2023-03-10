<div class="footer clearfix">
    <div class="footer-vision">
        <div class="container w1400">
            <div class="vision-left col-lg-8 col-md-8 col-sm-12 col-xs-12  wow fadeInUp animated" data-wow-duration="1s" data-wow-delay=".3s">
                <div class="vision-tip"><span>TO BE THE WORLD'S LEADING BIOTECH COMPANY</span></div>
                <div class="vision-span">成为世界领先的生物技术企业</div>
            </div>
            <div class="vision-right col-lg-2 col-md-2 col-sm-6 col-xs-6">
                <div class="code wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
                    <img src="/image/original/{{ setting('wechat_qr_code') }}" alt="">
                </div>
            </div>
            <div class="vision-right col-lg-2 col-md-2 col-sm-6 col-xs-6">
                <div class="code wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
                    <img src="/image/original/{{ setting('wechat_qr_code_2') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="footer-con clearfix">
        <div class="container w1400">
            <div class="footer-con-left col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
                <div class="footer-logo"><img  src="{{ '/image/original'.setting('logo') }}" alt=""></div>
                <div class="footer-info">
                    地址：{{ setting('address') }}   <br>
                    电子邮箱： {{ setting('email') }}<br>
                    电话总机：{{ setting('tel') }}  <br>
                    传真：{{ setting('fax') }}  <br>
                    营销服务中心：传真 {{ setting('marketing_center_fax') }}
                </div>
            </div>
            <div class="footer-con-right col-lg-8 col-md-8 col-sm-12 col-xs-12  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".4s">
                @inject('navListPresenter','App\Repositories\Presenter\NavListPresenter')
                {!! $navListPresenter->footer_navs('web_top') !!}
            </div>

        </div>
        <div class="container w1400">
            <div class="footer-copy clearfix  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
                <div class="pull-left">{!! setting('right') !!} </div>
                <div class="pull-right">技术支持：<a target="_blank" href="http://www.feibu.info">飞步科技</a></div>
            </div>
        </div>
    </div>
	
</div>
<div class="fb-loading">
	<div class="loader-inner ball-clip-rotate-pulse">
			<div></div>
			<div></div>
	</div>
</div>
<script src="https://player.polyv.net/script/player.js"></script>
<script src="http://player.polyv.net/script/polyvplayer.min.js"></script>
<script src="https://player.polyv.net/script/polyvplayer.min.js"></script>
<script id="qd3009059092bbc44ee4bb98564e54b6f98853fa2140" src="https://wp.qiye.qq.com/qidian/3009059092/bbc44ee4bb98564e54b6f98853fa2140" charset="utf-8" async defer></script>
