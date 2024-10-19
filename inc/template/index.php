<?php
/**
 * index
 * @author 鼠子(ShuShuicu)
 * @link https://blog.miomoe.cn/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
    <div class="mdui-col-xl-9 mdui-col-lg-8 mdui-col-md-8 mdui-col-sm-12 mdui-col-xs-12">
        <div class="mdui-typo mdui-center">
            <?php while($this->next()): ?>
                <div class="mdui-m-y-2">
                    <div class="mdui-card mdui-hoverable">
                        <div class="mdui-card-content">
                            <div class="mdui-card-primary-title mdui-text-truncate">
                                <a href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
                            </div>
                            <div class="mdui-card-primary-subtitle mdui-text-truncate">
                                时间：<?php $this->date(); ?>
                                · 分类：<?php $this->category(',', true, '暂无分类'); ?>
                                · 标签： <?php $this->tags(',', true, '暂无标签'); ?>
                            </div>
                        </div>
                        <div class="mdui-divider"></div>
                        <div class="mdui-card-primary-subtitle mdui-card-content">
                            <?php $this->excerpt(); ?><a href="<?php $this->permalink() ?>"><b> · 阅读更多 · </b></a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <?php
        $loadPagination = !($this->is('post') || $this->is('page') || $this->is('single'));
        ?>
        <?php if ($loadPagination): ?>
            <div class="mdui-m-y-1 mdui-valign mdui-card mdui-hoverable mdui-card-content">
                <?php $this->pageLink('<div class="mdui-ripple mdui-btn mdui-btn-icon mdui-color-theme"><i class="material-icons mdui-icon">chevron_left</i></div>'); ?>
                <span class="mdui-typo-body-1-opacity mdui-text-center" style="flex-grow:1">第 <?php echo $this->_currentPage > 1 ? $this->_currentPage : 1; ?> 页 / 共 <?php echo ceil($this->getTotal() / $this->parameter->pageSize); ?> 页</span>
                <?php $this->pageLink('<div class="mdui-ripple mdui-btn mdui-btn-icon mdui-color-theme"><i class="material-icons mdui-icon">chevron_right</i></div>','next'); ?>
            </div>
        <?php endif; ?>

    </div>
<?php
require 'sidebar.php';
?>