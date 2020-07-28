<div class="footer clearfix">
    <div class="footer-vision">
        <div class="container w1400">
            <div class="vision-left col-lg-10 col-md-10 col-sm-12 col-xs-12  wow flipInY animated" data-wow-duration="1s" data-wow-delay=".3s">
                <div class="vision-tip"><span>To Be One of Word-leading Biotech Enterprises</span></div>
                <div class="vision-span">成为世界领先的生物技术企业</div>
            </div>
            <div class="vision-right col-lg-2 col-md-2 col-sm-12 col-xs-12">
                <div class="code wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
                    <img src="{!! theme_asset('images/code.jpg') !!}" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="footer-con clearfix">
        <div class="container w1400">
            <div class="footer-con-left col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
                <div class="footer-logo"><img src="{!! theme_asset('images/foter-logo.png') !!}" alt=""></div>
                <div class="footer-info">
                    地址：{{ setting('address') }}   <br>
                    电子邮箱： {{ setting('email') }}<br>
                    电话总机：（{{ setting('tel') }}  <br>
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
                <div class="pull-left">© 广东溢多利生物科技股份有限公司 粤ICP备09215897号 <span>股票代码：300381</span> </div>
                <div class="pull-right">技术支持：<a href="http:www.feibu.info">飞步科技</a></div>
            </div>
        </div>
    </div>

</div>
