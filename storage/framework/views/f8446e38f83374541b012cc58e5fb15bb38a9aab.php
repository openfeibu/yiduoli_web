<!DOCTYPE HTML>
<html class=" fb-web oxh">

<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=0">
    <meta name="format-detection" content="telephone=no">
    <title><?php echo e(setting('station_name')); ?> <?php echo Theme::getTitle(); ?></title>
    <meta name="description" content="广东溢多利生物科技股份有限公司">
    <meta name="keywords" content="广东溢多利生物科技股份有限公司,溢多利">
    <?php echo Theme::asset()->styles(); ?>

    <?php echo Theme::asset()->scripts(); ?>

    <!--[if lte IE 9]>
    <?php echo Theme::asset()->container('ie9')->scripts(); ?>

    <![endif]-->
    <script>
        csrf_token = "<?php echo csrf_token(); ?>";
    </script>
</head>
<!--[if lte IE 9]>
<div class="text-xs-center marginBottom0 bg-blue-grey-100 alert">
    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
        <span>×</span>
    </button>
    你正在使用一个 <strong>过时</strong> 的浏览器。请 <a href=https://browsehappy.com/ target=_blank>升级您的浏览器</a>，以提高您的体验。</div>
<![endif]-->
<body>
<?php echo Theme::partial('header'); ?>


<?php echo Theme::content(); ?>


<!-- 尾部 -->
<?php echo Theme::partial('footer'); ?>

<!-- 移动端导航 -->
<?php echo Theme::partial('mobile_header'); ?>


<div class="fixed-nav">
    <div class="fixed-nav-item">
        <div class="fixed-nav-item-search">

        </div>
    </div>
    <div class="fixed-nav-item">
        <div class="fixed-nav-item-code">
            <div class="code-img"><img src="<?php echo theme_asset('images/code.jpg'); ?>" alt=""></div>
        </div>
    </div>
    <div class="fixed-nav-item">
        <div class="fixed-nav-item-contact">
            <a href="客户服务-联系我们.html"></a>
        </div>
    </div>
    <div class="fixed-nav-item scrollT">
        <div class="fixed-nav-item-top">

        </div>
    </div>
</div>
<div class="fixed-search">
    <div class="fixed-search-close"></div>
    <div class="fixed-search-form">
        <form action="#">
            <div class="fixed-search-form-input"><input type="text" placeholder="请输入搜索的内容" name="name"></div>
            <div class="fixed-search-form-submit"><button type="submit">搜索</button></div>
        </form>
    </div>
</div>
</body>


</html>