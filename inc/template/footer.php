<?php
/**
 * footer
 * @author 鼠子(ShuShuicu)
 * @link https://blog.miomoe.cn/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<?php

?>
</div>
    </div>
    <footer id="bottom" style="margin-top: auto;">
        <div class="mdui-valign">
            <img class="mdui-center" src="<?php echo get_assetUrl('images/end.png'); ?>"></img>
        </div>
        <div class="mdui-card">
            <div class="mdui-container">
                <div class="mdui-row mdui-p-y-4">
                    <div class="mdui-typo mdui-col-xs-4 mdui-col-md-3 mdui-col-offset-md-1">
                        <div class="mdui-float-left">
                            <div>Powered by <a href="http://typecho.org" target="_blank">Typecho</a></div>
                            <div>页面加载时间<?php echo timer_stop();?></div>
                        </div>
                    </div>
                    <div class="mdui-typo mdui-col-xs-4 mdui-col-md-4">
                        <div class="mdui-text-center">
                            <div>© <?php echo date("Y"); ?> Copyright <a href="<?php $this->options->siteUrl(); ?>"><b><?php $this->options->title(); ?></b></a> 版权所有</div>
                            <div><?php if ($this->options->icpCode) { echo '<a href="https://beian.miit.gov.cn/" target="_blank" rel="external nofollow noopener">' . $this->options->icpCode . '</a>'; } else { echo '正在努力备案中...'; } ?></div>
                        </div>
                    </div>
                    <div class="mdui-col-xs-4 mdui-col-md-3">
                        <div class="mdui-float-right">
                            <div>
                                <?php $this->options->footerInfo(); ?>
                            </div>
                            <div class="mdui-typo">
                                <?php echo get_theme(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="<?php echo get_assetUrl('js/style.js'); ?>?v=<?php echo get_ver(); ?>"></script>
<script src="<?php echo get_assetUrl('js/mdui.min.js'); ?>?v=<?php echo get_ver(); ?>"></script>
<script src="<?php echo get_assetUrl('js/jquery-3.7.1.min.js'); ?>?v=<?php echo get_ver(); ?>"></script>
<script src="<?php echo get_assetUrl('js/jquery.pjax.min.js'); ?>?v=<?php echo get_ver(); ?>"></script>
<script src="<?php echo get_assetUrl('code/prism.js'); ?>?v=<?php echo get_ver(); ?>"></script>
<script src="<?php echo get_assetUrl('code/clipboard.min.js'); ?>?v=<?php echo get_ver(); ?>"></script>
<script src="<?php echo get_assetUrl('js/nprogress.min.js'); ?>?v=<?php echo get_ver(); ?>"></script>
<script src="<?php echo get_assetUrl('js/view-image.min.js'); ?>?v=<?php echo get_ver(); ?>"></script>
<script src="<?php echo get_assetUrl('js/pjax.js'); ?>?v=<?php echo get_ver(); ?>"></script>
<?php $this->footer(); ?>
<?php $this->options->jsStyleCode(); ?>
</body>
</html>