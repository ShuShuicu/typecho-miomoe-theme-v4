<?php 
/**
 * 主题核心文件
 * @author 鼠子(ShuShuicu)
 * @link https://blog.miomoe.cn/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function themeFields($layout) 
{

    // 缩略图字段
    $thumbnailStyle = new Typecho_Widget_Helper_Form_Element_Text(
        'thumbnail_Style', 
        NULL, 
        NULL,  
        _t
        ('缩略图'), 
        _t('请填入图片链接用于自定义文章缩略图 / 顶图')
    );
    $thumbnailStyle->input->setAttribute(
        'style', 'width: 100%; max-width: 600px;'
    );
    $layout->addItem($thumbnailStyle);

}
Typecho_Plugin::factory('admin/write-post.php')->bottom = 'themeFields';
Typecho_Plugin::factory('admin/write-page.php')->bottom = 'themeFields';