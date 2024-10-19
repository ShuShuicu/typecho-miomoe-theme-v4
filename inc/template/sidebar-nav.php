<?php
/**
 * SidebarNav
 * @author 鼠子(ShuShuicu)
 * @link https://blog.miomoe.cn/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<div class="mdui-card mdui-drawer mdui-drawer-close mdui-appbar-inset" id="drawer">
    <ul class="mdui-list">
        <a href="<?php $this->options->siteUrl(); ?>">
            <li class="mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons">home</i>
                <div class="mdui-list-item-content">首页</div>
            </li>
        </a>
        <a href="<?php $this->options->siteUrl(); ?>feed/">
            <li class="mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons">rss_feed</i>
                <div class="mdui-list-item-content">Reed</div>
            </li>
        </a>
        <li class="mdui-subheader">站点分类</li>
        <div class="mdui-list" mdui-collapse="{accordion: true}">
            <div class="mdui-collapse-item mdui-collapse-item-true">
                <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                    <i class="mdui-list-item-icon mdui-icon material-icons">library_books</i>
                    <div class="mdui-list-item-content">独立页面</div>
                    <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_up</i>
                </div>
                <div class="mdui-collapse-item-body mdui-list">
                    <?php \Widget\Contents\Page\Rows::alloc()->to($pages); ?>
                    <?php while ($pages->next()): ?>
                        <a href="<?php $pages->permalink(); ?>">
                            <li class="mdui-list-item mdui-ripple">
                                <div class="mdui-list-item-content"><?php $pages->title(); ?></div>
                            </li>
                        </a>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <div class="mdui-list" mdui-collapse="{accordion: true}">
            <div class="mdui-collapse-item mdui-collapse-item-open">
                <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                    <i class="mdui-list-item-icon mdui-icon material-icons">apps</i>
                    <div class="mdui-list-item-content">文章分类</div>
                    <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_up</i>
                </div>
                <div class="mdui-collapse-item-body mdui-list">
                    <?php \Widget\Metas\Category\Rows::alloc()->to($cates); ?>
                    <?php while ($cates->next()): ?>
                        <a href="<?php echo $cates->permalink(); ?>" class="mdui-list-item mdui-ripple"><?php echo $cates->name(); ?> (<?php echo $cates->count(); ?>)</a>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <li class="mdui-subheader">站点统计</li>
        <div class="mdui-list-item mdui-ripple">
            <i class="mdui-list-item-icon mdui-icon material-icons">library_books</i>
            <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
            <div class="mdui-list-item-content">文章总数</div>
            <div><?php $stat->publishedPostsNum(); ?></div>
        </div>
        <li class="mdui-list-item" mdui-drawer-close="{target:'#main-drawer'}">
            <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-blue-grey">chevron_left</i>
            <div class="mdui-list-item-content">收起菜单</div>
        </li>
    </ul>
</div>
