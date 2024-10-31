<?php
/**
 * MioDrive
 * @author 鼠子(ShuShuicu)
 * @link https://blog.miomoe.cn/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
require 'config.php';
?>
<div class="mdui-m-y-5 mdui-card mdui-hoverable mdui-card-content" id="pjax-container">
    <ul class="mdui-list">
        <?php
        if ($relativeDir !== '') {
            // 提供返回上一级的链接
            $parentDir = dirname($relativeDir);
            echo '<a href="?dir=' . urlencode($parentDir === '.' ? '' : $parentDir) . '">
            <li class="mdui-list-item mdui-ripple">
                <div class="mdui-list-item-content">返回上一级</div>
            </li></a>';
        }

        // 显示文件夹
        foreach ($directories as $directory) {
            $itemPath = $relativeDir . '/' . $directory;
            echo '<a href="?dir=' . urlencode($itemPath) . '">
            <li class="mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons">folder</i>
                <div class="mdui-list-item-content">' . htmlspecialchars($directory) . '</div>
            </li></a>';
        }

        echo '<div class="mdui-divider"></div>';

        // 显示文件
        foreach ($files as $file) {
            $itemPath = $relativeDir . '/' . $file;
            echo '<a href="?file=' . urlencode($itemPath) . '&token=' . urlencode($token) . '" data-pjax="false">
            <li class="mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons">file_download</i>
                <div class="mdui-list-item-content">' . htmlspecialchars($file) . '</div>
            </li></a>';
        }
        ?>
    </ul>
</div>
