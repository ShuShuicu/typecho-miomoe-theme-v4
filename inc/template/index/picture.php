<?php
/**
 * index pictuer
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
                    <?php  
                        // 假设get_ArticleThumbnail函数返回第一张图片的URL，如果没有则返回null  
                        $thumbnailStyle = $this->fields->thumbnail_Style; // 假设这里直接访问字段值，具体取决于你的Typecho字段处理方式  
                        $thumbnailUrl = $thumbnailStyle ? $thumbnailStyle : get_ArticleThumbnail($this);  
                        if ($thumbnailUrl):  
                        // 如果缩略图URL存在，则输出缩略图  
                    ?>
                        <div class="thumbnail-post" style="background:url(<?php echo htmlspecialchars($thumbnailUrl); ?>);"></div>
                    <?php endif; ?>
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
<?php $this->need('sidebar.php');  ?>