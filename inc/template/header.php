<?php
/**
 * header
 * @author 鼠子(ShuShuicu)
 * @link https://blog.miomoe.cn/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"/>
    <meta name="renderer" content="webkit"/>
    <link href="<?php echo $this->options->faviconUrl ? $this->options->faviconUrl : $this->options->themeUrl . '/assets/images/favicon.ico'; ?>" rel="icon" />
    <link rel="stylesheet" href="<?php echo get_assetUrl('css/style.css'); ?>?v=<?php echo get_ver(); ?>">
    <link rel="stylesheet" href="<?php echo get_assetUrl('css/mdui.min.css'); ?>?v=<?php echo get_ver(); ?>">
    <link rel="stylesheet" href="<?php echo get_assetUrl('code/styles/' . $this->options->CodePrettifyCSS . '.css'); ?>?v=<?php echo get_ver(); ?>" />
    <link rel="stylesheet" href="<?php echo get_assetUrl('css/nprogress.min.css'); ?>?v=<?php echo get_ver(); ?>">
    <title><?php $this->archiveTitle(array(
            'category' => _t('「%s」分类'),
            'search'   => _t('搜索结果'),
            'tag'      => _t('「%s」标签'),
            'author'   => _t('「%s」发布的文章')
        ), '', ' - '); ?><?php if ($this->_currentPage > 1) echo '「第' . $this->_currentPage . '页」 - '; ?><?php $this->options->title(); ?><?php if ($this->is('index') && !empty($this->options->subTitle)): ?> - <?php $this->options->subTitle(); ?><?php endif; ?></title>
    <?php $this->header(); ?>
    <?php $this->options->cssStyleCode(); ?>
</head>
<body class="mdui-appbar-with-toolbar mdui-theme-auto mdui-theme-layout-auto mdui-theme-primary-<?php echo $this->options->themePrimary ? $this->options->themePrimary : $this->options->themePrimary . 'blue-grey'; ?> mdui-theme-accent-<?php echo $this->options->accentPrimary ? $this->options->accentPrimary : $this->options->accentPrimary . 'indigo'; ?> mdui-loaded" id="top">
<div id="app">
    <div class="mdui-appbar mdui-appbar-fixed">
        <div class="mdui-toolbar mdui-color-theme">
            <a href="javascript:;" class="mdui-btn mdui-btn-icon" mdui-dialog="{target: '#menu'}">
                <i class="mdui-icon material-icons">menu</i>
            </a>
            <a href="<?php $this->options->siteUrl()?>" class="mdui-typo-headline mdui-hidden-xs"><?php $this->options->title(); ?></a>
            <a href="javascript:;" class="mdui-typo-title">
                <?php
                if (empty($this->getArchiveTitle())) {
                    echo _t('「首页」');
                } else {
                    $this->archiveTitle(array(
                        'post' => _t('%s'),
                        'page' => _t('%s'),
                        'category' => _t('%s'),
                        'search'   => _t('搜索结果'),
                        'tag'      => _t('%s'),
                        'author'   => _t('%s的主页')
                    ), '「', '」');
                }
                ?>
            </a>
            <div class="mdui-toolbar-spacer"></div>
            <a href="javascript:;" class="mdui-btn mdui-btn-icon" mdui-dialog="{target: '#搜索'}">
                <i class="mdui-icon material-icons">search</i>
            </a>
            <a href="<?php $this->options->siteUrl()?>?random=true" class="mdui-btn mdui-btn-icon">
                <i class="mdui-icon material-icons">book</i>
            </a>
        </div>
    </div>

    <div class="mdui-dialog" id="搜索">
        <div class="mdui-dialog-title mdui-text-truncate">搜索内容<small> · 精彩近在咫尺！</small></div>
        <div class="mdui-divider"></div>
        <div class="mdui-dialog-content mdui-text-center">
            <form method="post" action="">
                <div class="mdui-textfield">
                    <input class="mdui-textfield-input"  type="text" name="s" class="text" size="32"  placeholder="输入关键词后按回车(Enter)..." />
                </div>
            </form>
            <div class="mdui-dialog-actions">
                <div class="mdui-divider"></div>
                <div class="mdui-chip" mdui-dialog-cancel>
            <span class="mdui-chip-title">
                <i class="mdui-icon material-icons">highlight_off</i><b> 关闭 </b>
            </span>
                </div>
            </div>
        </div>
    </div>

    <div class="mdui-dialog" id="menu">
        <div class="mdui-dialog-title mdui-text-truncate">菜单<small> · 本站的所有分类</small></div>
        <div class="mdui-divider"></div>
        <div class="mdui-dialog-content mdui-text-center">
            <div class="mdui-chip"><a target="_blank" href="<?php $this->options->siteUrl()?>">
                    <span class="mdui-chip-icon mdui-color-theme"><i class="mdui-icon material-icons">home</i></span>
                    <span class="mdui-chip-title">网站首页</span>
                </a></div>
            <?php $this->widget('Widget_Metas_Category_List')->parse('
            <div class="mdui-chip"><a target="_blank" href="{permalink}">
                <span class="mdui-chip-icon mdui-color-theme"><i class="mdui-icon material-icons">folder</i></span>
                <span class="mdui-chip-title">{name}</span>
            </a></div>');  ?>
            <div class="mdui-dialog-actions">
                <div class="mdui-divider"></div>
                <div class="mdui-chip" mdui-dialog-cancel>
            <span class="mdui-chip-title">
                <i class="mdui-icon material-icons">highlight_off</i><b> 关闭 </b>
            </span>
                </div>
            </div>
        </div>
    </div>
    <div class="mdui-container mdui-m-y-3" id="content">
