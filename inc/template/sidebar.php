<?php
/**
 * sidebar
 * @author 鼠子(ShuShuicu)
 * @link https://blog.miomoe.cn/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<div class="mdui-col-xl-3 mdui-col-lg-4 mdui-col-md-4 mdui-col-sm-12 mdui-col-xs-12" id="sidebar">

<div class="mdui-m-y-2 mdui-card mdui-hoverable mdui-card-content">
    <form method="post" action="">
        <div class="mdui-textfield">
            <i class="mdui-icon material-icons">search</i>
            <input class="mdui-textfield-input"  type="text" name="s" class="text" size="32"  placeholder="输入关键词..." />
        </div>
    </form>
</div>
    <div class="mdui-m-y-2 mdui-card mdui-hoverable">
        <div class="mdui-card-header">
            <img class="mdui-card-header-avatar" src="<?php echo $this->options->faviconUrl ? $this->options->faviconUrl : $this->options->themeUrl . '/assets/images/favicon.ico'; ?>" />
            <div class="mdui-card-header-title">
                <?php $this->options->title(); ?>
            </div>
            <div class="mdui-card-header-subtitle">
                <?php $this->options->subTitle(); ?>
            </div>
        </div>
        <div class="mdui-divider"></div>
        <div class="mdui-card-content">
            <?php echo $this->options->sidebarInfo ? $this->options->sidebarInfo : $this->options->description(); ?>
        </div>
    </div>

    <div class="mdui-m-y-2 mdui-card mdui-hoverable">
        <div class="mdui-card-media mdui-card-content">
            <?php
                $mid='';//此参数为空时为随机文章，为分类mid时则为当前分类下的随机文章
                $cid=0;//此参数填写当前文章的cid即可在随机文章时不输出当前文章
                $size=5;//随机输出文章的数量
                $this->widget('Widget_Post_tongleisuiji@suiji', 'mid='.$mid.'&pageSize='.$size.'&cid='.$cid)->to($to);
                // $to->excerpt(150, '...');
            ?>
            <div class="mdui-list">
                <?php if($to->have()): ?>
                    <?php while($to->next()): ?>
                        <a href="<?php $to->permalink() ?>" class="mdui-list-item mdui-ripple mdui-text-truncate"><?php $to->title(); ?></a>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>