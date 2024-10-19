<?php
/**
 * page
 * @author 鼠子(ShuShuicu)
 * @link https://blog.miomoe.cn/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<div class="mdui-card mdui-hoverable mdui-m-y-2">
    <div class="mdui-card-media">
        <div class="mdui-card-content mdui-valign">
            <div class="mdui-card-primary-title mdui-center"><i class="mdui-icon material-icons" style="font-size: 30px;">library_books</i><?php $this->title() ?></div>
        </div>
        <div class="mdui-divider"></div>
    </div>
    <div class="mdui-card-content">
        <?php $this->content(); ?>
    </div>
</div>