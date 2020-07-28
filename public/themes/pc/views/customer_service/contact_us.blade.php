<!-- 内容 -->
<div class="main">
    <div class="container w1400">
        {!! Theme::widget('WebBreadcrumb')->render() !!}
        {!! Theme::widget('NavTab')->render() !!}
        <div class="text-detail clearfix  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
            <div class="contact">
                <div class="contact-t clearfix">
                    <div class="contact-t-left col-lg-4 col-md-4 col-sm-12 col-xs-12 nopadding">
                        <div class="contact-t-title">
                            {{ setting('company_name') }}
                            <span>{{ setting('company_abb_name') }}</span>
                        </div>
                        <div class="contact-t-map col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                            <p>公司地址</p>
                            <span>{{ setting('address') }}</span>
                        </div>
                        <div class="contact-t-info col-lg-6 col-md-6 col-sm-6 col-xs-6 nopadding">
                            <p>电话总机</p>
                            <span>{{ setting('tel') }}</span>
                        </div>
                        <div class="contact-t-info col-lg-6 col-md-6 col-sm-6 col-xs-6 nopadding">
                            <p>电子邮箱</p>
                            <span>{{ setting('email') }}</span>
                        </div>
                        <div class="contact-t-info col-lg-6 col-md-6 col-sm-6 col-xs-6 nopadding">
                            <p>邮政编码</p>
                            <span>{{ setting('zip_code') }}</span>
                        </div>
                        <div class="contact-t-info col-lg-6 col-md-6 col-sm-6 col-xs-6 nopadding">
                            <p>传真</p>
                            <span>{{ setting('fax') }}</span>
                        </div>

                    </div>
                    <div class="contact-t-right col-lg-8 col-md-8 col-sm-12 col-xs-12 nopadding">
                        <img src="{!! theme_asset('images/map.png') !!}" alt="">
                    </div>
                </div>
                <div class="contact-b clearfix">
                    <div class="contact-b-item pull-left">
                        <div class="contact-b-item-test contact-icon1 clearfix">
                            <div class="t">证券部</div>
                            <div class="contact-b-item-des">
                                <div class="contact-t-info col-lg-6 col-md-6 col-sm-6 col-xs-6 nopadding">
                                    <p>联系方式</p>
                                    <span>{{ setting('bond_tel') }}</span>
                                </div>
                                <div class="contact-t-info col-lg-6 col-md-6 col-sm-6 col-xs-6 nopadding">
                                    <p>电子邮箱</p>
                                    <span>{{ setting('bond_email') }}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="contact-b-item pull-right">
                        <div class="contact-b-item-test contact-icon2 clearfix">
                            <div class="t">人力资源部</div>
                            <div class="contact-b-item-des">
                                <div class="contact-t-info col-lg-6 col-md-6 col-sm-6 col-xs-6 nopadding">
                                    <p>联系方式</p>
                                    <span>{{ setting('hr_tel') }}</span>
                                </div>
                                <div class="contact-t-info col-lg-6 col-md-6 col-sm-6 col-xs-6 nopadding">
                                    <p>电子邮箱</p>
                                    <span>{{ setting('hr_email') }}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>