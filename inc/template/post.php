<?php
/**
 * post
 * @author 鼠子(ShuShuicu)
 * @link https://blog.miomoe.cn/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
    <div class="mdui-m-y-2 mdui-col-xl-9 mdui-col-lg-8 mdui-col-md-8 mdui-col-sm-12 mdui-col-xs-12">
        <div class="mdui-center">
            <div class="mdui-card mdui-hoverable">
                <div class="mdui-card-media mdui-card-content">
                    <div class="mdui-card-primary-title"><?php $this->title() ?></div>
                </div>
                <div class="mdui-divider"></div>
                <div class="mdui-card-actions">
                    <div class="mdui-chip">
                    <span class="mdui-chip-icon mdui-color-theme">
                        <img src="<?php echo $this->options->avatarUrl ? $this->options->avatarUrl : $this->options->themeUrl . '/assets/images/avatar.jpg'; ?>" class="mdui-img-fluid" /></span>
                        <span class="mdui-chip-title"><?php $this->author(); ?></span>
                    </div>
                    <div class="mdui-float-right" data-pjax="false">
                        <div class="mdui-chip">
                            <span class="mdui-chip-icon mdui-color-theme"><i class="mdui-icon material-icons">bookmark</i></span>
                            <span class="mdui-chip-title">共<?php art_count($this->cid); ?>字</span>
                        </div>
                        <div class="mdui-chip"><a href="#comments">
                                <span class="mdui-chip-icon mdui-color-theme"><i class="mdui-icon material-icons">comment</i></span>
                                <span class="mdui-chip-title"><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t(' %d 条评论')); ?></span></a>
                        </div>
                    </div>
                </div>
                <div class="mdui-divider"></div>
                <div class="mdui-typo mdui-card-content post-container" id="content" style="padding-left:4%;padding-right:4%;font-size: 17px;">
                    <?php $this->content(); ?>
                </div>
                <div class="mdui-typo mdui-card">
                    <div class="mdui-card-content">
                        <div>
                            <strong>
                                本文链接：
                            </strong>
                            <a href="<?php $this->permalink() ?>"><?php $this->permalink() ?></a>
                        </div>
                        <div>
                            <?php echo $this->options->postCopyright; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require 'comments.php';?>
    </div>
<?php
require 'sidebar.php';
?>