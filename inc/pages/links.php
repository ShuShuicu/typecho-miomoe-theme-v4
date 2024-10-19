<?php
/**
 * 友情链接
 * @author 鼠子(ShuShuicu)
 * @link https://blog.miomoe.cn/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<div class="mdui-card mdui-hoverable mdui-m-y-2">
    <div class="mdui-card-media">
        <div class="mdui-card-content mdui-valign">
            <div class="mdui-card-primary-title mdui-center"><i class="mdui-icon material-icons" style="font-size: 30px;">link</i><?php $this->title() ?></div>
        </div>
        <div class="mdui-divider"></div>
    </div>

        <?php echo $this->options->linksContent; ?>
    </div>
    <div class="mdui-card mdui-card-media mdui-card-content">
        <?php $this->comments()->to($comments); ?>

        <?php if ($this->allow('comment')): ?>
            <div id="<?php $this->respondId(); ?>" class="respond">
                <div class="cancel-comment-reply">
                    <?php $comments->cancelReply(); ?>
                </div>

                <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
                    <?php if ($this->user->hasLogin()): ?><?php _e('登录身份: '); ?><a><?php $this->user->screenName(); ?></a>

                    <?php else: ?>

                        <div class="mdui-divider"></div>
                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <i class="mdui-icon material-icons">web</i>
                            <label class="mdui-textfield-label">站点名称·SiteName</label>
                            <input class="mdui-textfield-input" type="text" name="author" class="text" size="35" value="<?php $this->remember('author'); ?>" />
                        </div>
                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <i class="mdui-icon material-icons">email</i>
                            <label class="mdui-textfield-label">联系邮箱·E-Mail</label>
                            <input class="mdui-textfield-input" type="text" name="mail" class="text" size="35" value="<?php $this->remember('mail'); ?>" />
                        </div>
                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <i class="mdui-icon material-icons">link</i>
                            <label class="mdui-textfield-label">站点链接·SiteLink</label>
                            <input class="mdui-textfield-input" type="text" name="url" class="text" size="35" value="<?php $this->remember('url'); ?>" />
                        </div>

                    <?php endif; ?>

                    <div class="mdui-textfield">
                        <textarea class="mdui-textfield-input" rows="4" cols="50" name="text" placeholder="请输入您的站点描述。"><?php $this->remember('text'); ?></textarea>
                    </div>

                    <div class="">


                        <dic class="mdui-m-y-2 mdui-float-right">
                            <button type="submit" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent submit"><?php _e('提交链接'); ?></button>
                    </div>

                    <?php $security = $this->widget('Widget_Security'); ?>
                    <input type="hidden" name="_" value="<?php echo $security->getToken($this->request->getReferer())?>">
                    </p>
                </form>
            </div>
        <?php else: ?>
            <h3><?php _e('已关闭提交链接。'); ?></h3>
        <?php endif; ?>

        <div class="mdui-table-fluid">
            <table class="mdui-table mdui-table-hoverable mdui-typo">
                <thead>
                <tr>
                    <th>#</th>
                    <th>本站基本信息 · <small>申请前请确保已将本站链接添加至贵站。</small></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>名称</td>
                    <td><?php $this->options->title(); ?></td>
                </tr>
                <tr>
                    <td>地址</td>
                    <td><a href="<?php $this->options->siteUrl(); ?>" target="_blank"><?php $this->options->siteUrl(); ?></a></td>
                </tr>
                <tr>
                    <td>图标</td>
                    <td><a href="<?php echo $this->options->faviconUrl ? $this->options->faviconUrl : $this->options->themeUrl . '/assets/images/favicon.ico'; ?>" target="_blank"><?php echo $this->options->faviconUrl ? $this->options->faviconUrl : $this->options->themeUrl . '/assets/images/favicon.ico'; ?></a></td>
                </tr>
                <tr>
                    <td>描述</td>
                    <td><?php echo $this->options->description; ?></td>
                </tr>
                <tr>
                    <td>申请说明</td>
                    <td><?php echo $this->options->linksInfo ? $this->options->linksInfo : $this->options->linksInfo . '暂无'; ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
