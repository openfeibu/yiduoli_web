<div class="main">
    <?php echo Theme::widget('breadcrumb')->render(); ?>

    <div class="main_full">
        <?php echo Theme::partial('message'); ?>

        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="<?php echo e(guard_url('news/'.$page->id)); ?>" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">* <?php echo e(trans('page.label.title')); ?></label>
                        <div class="layui-input-inline">
                            <input type="text" name="title" lay-verify="required" autocomplete="off" placeholder="请输入<?php echo e(trans('page.label.title')); ?>" class="layui-input" value="<?php echo e($page->title); ?>">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('page.label.image')); ?></label>
                        <?php echo $page->files('image')
                        ->url($page->getUploadUrl('image'))
                        ->uploader(); ?>

                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label"><?php echo e(trans('app.description')); ?></label>
                        <div class="layui-input-block">
                            <textarea name="description" placeholder="请输入<?php echo e(trans('app.description')); ?>" class="layui-textarea"><?php echo e($page->description); ?></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label"><?php echo e(trans('app.content')); ?></label>
                        <div class="layui-input-block">
                            <script type="text/plain" id="content" name="content" style="height:240px;">
                                <?php echo $page->content; ?>

                            </script>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('app.home_recommend')); ?></label>
                        <div class="layui-input-block">
                            <input type="checkbox" name="home_recommend"  lay-filter="home_recommend" lay-skin="switch" lay-text="是|否" value="1" <?php if($page->home_recommend): ?>  checked <?php endif; ?>>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('app.hot_recommend')); ?></label>
                        <div class="layui-input-block">
                            <input type="checkbox" name="hot_recommend" lay-filter="hot_recommend" lay-skin="switch" lay-text="是|否" value="1" <?php if($page->hot_recommend): ?> checked  <?php endif; ?> >
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="demo1"><?php echo e(trans('app.submit_now')); ?></button>
                        </div>
                    </div>
                    <?php echo Form::token(); ?>

                    <input type="hidden" name="_method" value="PUT">
                </form>
            </div>

        </div>
    </div>
</div>

<?php echo Theme::asset()->container('ueditor')->scripts(); ?>


<script>
    var ue = getUe();
    layui.use(['form','jquery'], function(){
        var form = layui.form;
        var $ = layui.$;

    });
</script>