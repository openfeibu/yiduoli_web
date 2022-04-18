<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?1d67db68199c24d5e5d89f60f126addc";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

<div id="wap-nav">
    <div class="nav-box transition500">
        <div class="wap-header">
            <span class="wapNav-close icon_close"></span>
            <img src="{{ '/image/original'.setting('logo') }}" alt="Logo" class=" fadeInUp animated"  />
        </div>

        <ul>
            @inject('navListPresenter','App\Repositories\Presenter\NavListPresenter')

            {!! $navListPresenter->mobile_navs('web_top') !!}
        </ul>
    </div>
</div>