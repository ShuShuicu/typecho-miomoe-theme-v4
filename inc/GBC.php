<?php
/**
 * 主题核心文件
 * @author 鼠子(ShuShuicu)
 * @link https://blog.miomoe.cn/
 */
function themeConfig($form)
{
?>
    <style>
        body {
            font-weight:500;
            background: url(<?php echo THEME_URL ?>/assets/images/background.webp)
            no-repeat 0 0;
            background-size: cover;
            background-attachment: fixed;
        }
        .typecho-foot {
            padding: 1em 0 3em;
            background-color: #ffffffde;
        }
    </style>
    <link href="<?php echo THEME_URL ?>/assets/css/mdui.min.css?v=<?php echo get_ver(); ?>" rel="stylesheet" type="text/css" />
    <script src="<?php echo THEME_URL ?>/assets/js/mdui.min.js?v=<?php echo get_ver(); ?>"></script>
    <script>
        setTimeout(function() {
            mdui.snackbar({
                message: '欢迎使用MioV4！',
                position: 'top',
            });
        }, 1145);
    </script>
    <div class="mdui-m-y-2 mdui-card mdui-hoverable mdui-card-content" id="backups" style="border-radius: 8px;background-color: #ffffffde;">
        <div class="mdui-card-primary-title">
            <?php
            // 获取当前主题名称
            $themeName = Helper::options()->theme;

            // 数据库连接
            $db = Typecho_Db::get();

            // 获取当前主题的设置
            $currentThemeOptions = $db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:' . $themeName));

            // 定义备份设置的名称
            $backupName = 'theme:' . $themeName . 'bf';

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['type'])) {
                $action = $_POST['type'];

                if ($action === "备份模板设置数据") {
                    if ($currentThemeOptions) {
                        // 检查是否已经存在备份
                        $existingBackup = $db->fetchRow($db->select()->from('table.options')->where('name = ?', $backupName));
                        if ($existingBackup) {
                            // 更新现有备份
                            $update = $db->update('table.options')
                                ->rows(['value' => $currentThemeOptions['value']])
                                ->where('name = ?', $backupName);
                            $db->query($update);
                            $message = '备份已更新，请等待自动刷新！如果等不到请点击 <a href="' . Helper::options()->adminUrl('options-theme.php') . '">这里</a>。';
                        } else {
                            // 创建新的备份
                            $insert = $db->insert('table.options')
                                ->rows(['name' => $backupName, 'user' => '0', 'value' => $currentThemeOptions['value']]);
                            $db->query($insert);
                            $message = '备份完成，请等待自动刷新！如果等不到请点击 <a href="' . Helper::options()->adminUrl('options-theme.php') . '">这里</a>。';
                        }
                        // 显示消息并设置自动刷新
                        echo '<div class="tongzhi col-mb-12 home">' . $message . '</div>';
                        echo '<script>setTimeout(function(){ window.location.href = "' . Helper::options()->adminUrl('options-theme.php') . '"; }, 2500);</script>';
                    } else {
                        echo '<div class="tongzhi col-mb-12 home">当前主题没有设置数据可备份。</div>';
                    }
                } elseif ($action === "还原模板设置数据") {
                    // 还原备份
                    $backupOptions = $db->fetchRow($db->select()->from('table.options')->where('name = ?', $backupName));
                    if ($backupOptions) {
                        // 更新当前主题设置为备份内容
                        $update = $db->update('table.options')
                            ->rows(['value' => $backupOptions['value']])
                            ->where('name = ?', 'theme:' . $themeName);
                        $db->query($update);
                        $message = '检测到备份数据，恢复完成，请等待自动刷新！如果等不到请点击 <a href="' . Helper::options()->adminUrl('options-theme.php') . '">这里</a>。';
                        echo '<div class="tongzhi col-mb-12 home">' . $message . '</div>';
                        echo '<script>setTimeout(function(){ window.location.href = "' . Helper::options()->adminUrl('options-theme.php') . '"; }, 5000);</script>';
                    } else {
                        echo '<div class="tongzhi col-mb-12 home">没有备份数据，无法恢复！</div>';
                    }
                } elseif ($action === "删除备份数据") {
                    // 删除备份
                    $backupOptions = $db->fetchRow($db->select()->from('table.options')->where('name = ?', $backupName));
                    if ($backupOptions) {
                        $delete = $db->delete('table.options')->where('name = ?', $backupName);
                        $db->query($delete);
                        $message = '删除成功，请等待自动刷新，如果等不到请点击 <a href="' . Helper::options()->adminUrl('options-theme.php') . '">这里</a>。';
                        echo '<div class="tongzhi col-mb-12 home">' . $message . '</div>';
                        echo '<script>setTimeout(function(){ window.location.href = "' . Helper::options()->adminUrl('options-theme.php') . '"; }, 5000);</script>';
                    } else {
                        echo '<div class="tongzhi col-mb-12 home">备份不存在，无需删除！</div>';
                    }
                }
            }

            // 输出操作表单
            echo '<form class="protected home col-mb-12" action="" method="post">
    <input type="submit" name="type" class="btn btn-s" value="备份模板设置数据" />  
    <input type="submit" name="type" class="btn btn-s" value="还原模板设置数据" />  
    <input type="submit" name="type" class="btn btn-s" value="删除备份数据" />
</form>';
            ?>
        </div>
<br><br><hr>
<p>
    <b>开源地址：</b><a href="https://gitee.com/ShuShuicu/typecho-miomoe-theme-v4">Gitee</a> · <a href="https://github.com/ShuShuicu/typecho-miomoe-theme-v4">GitHub</a>
    <br><b>联系作者：</b><a href="https://space.bilibili.com/435502585">哔哩哔哩</a> · <a href="https://blog.miomoe.cn/">鼠子Blog</a>
</p>
<hr>
<?php
    // 色调
    $themePrimary = new Typecho_Widget_Helper_Form_Element_Select(
        'themePrimary',
        array(
            'blue-grey' => _t('蓝绿色'),
            'indigo'=> _t('靛蓝色'),
            'light-blue'=> _t('浅蓝色'),
            'orange'=> _t('橙色'),
            'purple'=> _t('紫色'),
            'red'=> _t('红色'),
        ),
        'blue-grey',
        _t('主色调'),
        _t('请选择主题的主色调。')
    );
    $form->addInput($themePrimary);
    $accentPrimary = new Typecho_Widget_Helper_Form_Element_Select(
        'accentPrimary',
        array(
            'indigo' => _t('靛蓝色'),
            'pink'=> _t('粉红色'),
            'deep-orange'=> _t('深橙色'),
            'deep-purple'=> _t('深紫色'),
            'red'=> _t('红色'),
        ),
        'red',
        _t('副(强)色调'),
        _t('请选择主题的副(强)色调。')
    );
    $form->addInput($accentPrimary);
    // 高亮代码
    $CodePrettifyCSS = new Typecho_Widget_Helper_Form_Element_Select(
        'CodePrettifyCSS',
        array(
            'coy'=> _t('Coy'),
            'dark'=> _t('Dark'),
            'GrayMac' => _t('⭐️Mac(灰)⭐️'),
            'BlackMac'=> _t('⭐️Mac(黑)⭐️'),
            'WhiteMac'=> _t('⭐️Mac(白)⭐️'),
            'twilight'=> _t('Twilight'),
            'tomorrow-night'=> _t('TomorrowNight'),
        ),
        'GrayMac',
        _t('高亮代码'),
        _t('请选择文章高亮主题风格。')
    );
    $form->addInput($CodePrettifyCSS);
    // CDN
    $assetsCdn = new Typecho_Widget_Helper_Form_Element_Select(
        'assetsCdn',
        array(
            'default' => _t('本地'),
            'https://ss.bscstorage.com/wpteam-shushuicu/assets/themes/MioV4/'=> _t('⭐️白山云⭐️'),
            'https://cdn.jsdmirror.com/gh/ShuShuicu/typecho-miomoe-theme-v4@master/assets/'=> _t('⭐️JsdMirror⭐️'),
            'https://cdn.jsdelivr.net/gh/ShuShuicu/typecho-miomoe-theme-v4@master/assets/'=> _t('JsDelivr(官方源'),
            // 'https://jsdelivr.shushu.icu/gh/ShuShuicu/typecho-miomoe-theme-v4@master/assets/'=> _t('JsDelivr(鼠子源',
        ),
        'default',
        _t('CDN'),
        _t('请选择静态资源CDN加速节点<br><font color="red">推荐白山云&JsdMirror</font>，如果切换CDN后有问题请切换为本地。')
    );
    $form->addInput($assetsCdn);
    // Avatar
    $avatarCdn = new Typecho_Widget_Helper_Form_Element_Select(
        'avatarCdn',
        array(
            'https://weavatar.com/avatar/'=> _t('WeAvatar'),
            'https://cravatar.cn/avatar/' => _t('CrAvatar'),
            'http://www.gravatar.com/avatar/'=> _t('GrAvatar'),
            'https://gravatar.shushu.icu/avatar/'=> _t('GrAvatar(鼠子源'),
        ),
        'https://weavatar.com/avatar/',
        _t('Avatar'),
        _t('请选择Avatar源，用于评论头像展示。<hr>')
    );
    $form->addInput($avatarCdn);
    // 副标题
    $subTitle = new Typecho_Widget_Helper_Form_Element_Text(
        'subTitle',
        NULL,
        '由 MioV4 主题强力驱动',
        _t('副标题'),
        _t('输入一段描述，将会显示在网站首页 title 后方，留空不显示。')
    );
    $form->addInput($subTitle);
    // favicon
    $faviconUrl = new Typecho_Widget_Helper_Form_Element_Text(
        'faviconUrl',
        NULL,
        '' . THEME_URL . '/assets/images/favicon.webp',
        _t('网站图标'),
        _t('请填入网站图标，没有则显示主题默认图标。')
    );
    $form->addInput($faviconUrl);
    // 备案号
    $icpCode = new Typecho_Widget_Helper_Form_Element_Text(
        'icpCode',
        NULL,
        NULL,
        _t('ICP备案号'),
        _t('请输入网站ICP备案号，如果没有请留空。')
    );
    $form->addInput($icpCode);
    // 文章底部作者说明
    $postEndAuthorInfo = new Typecho_Widget_Helper_Form_Element_Text(
        'postEndAuthorInfo',
        NULL,
        '做个小网站，搞点小意思。',
        _t('作者介绍'),
        _t('输入文章底部作者介绍说明。')
    );
    $form->addInput($postEndAuthorInfo);
    // 作者头像
    $avatarUrl = new Typecho_Widget_Helper_Form_Element_Text(
        'avatarUrl',
        NULL,
        '' . THEME_URL . '/assets/images/avatar.jpg',
        _t('作者头像'),
        _t('请填入作者头像链接，没有则显示神鹰黑手哥。<hr>')
    );
    $form->addInput($avatarUrl);
    // Drive目录
    $driveDir = new Typecho_Widget_Helper_Form_Element_Text(
        'driveDir',
        NULL,
        'files',
        _t('MioDrive'),
        _t('Drive功能文件目录，默认为 主题目录/inc/drive/ 下的 files 文件夹。<hr>')
    );
    $form->addInput($driveDir);
    // 版权声明
    $postCopyright = new Typecho_Widget_Helper_Form_Element_Textarea(
        'postCopyright',
        NULL,
        '<div>
            <strong>版权声明：</strong>
            <mark>本站文章大部分始于原创，用于个人学习记录，可能对您有所帮助，仅供参考！</mark>
        </div>',
        _t('版权声明'),
        _t('文章底部版权声明，支持HTML代码。')
    );
    $form->addInput($postCopyright);
    // 底部介绍
    $footerInfo = new Typecho_Widget_Helper_Form_Element_Textarea(
        'footerInfo',
        NULL,
        '联系QQ：114514<br>联系邮箱：1919810@qq.com',
        _t('底部介绍'),
        _t('请输入侧边顶部介绍说明，一般为网站说明或联系方式，留空则不显示。<font color="red">支持HTML代码。</font>')
    );
    $form->addInput($footerInfo);
    // 侧边介绍
    $sidebarInfo = new Typecho_Widget_Helper_Form_Element_Textarea(
        'sidebarInfo',
        NULL,
        '' . Helper::options()->description . '',
        _t('侧边介绍'),
        _t('请输入侧边顶部介绍说明，一般为网站说明或作者介绍，留空则显示站点的Description。<font color="red">支持HTML代码。</font>')
    );
    $form->addInput($sidebarInfo);
    // 友情链接
    $linksInfo = new Typecho_Widget_Helper_Form_Element_Textarea(
        'linksInfo',
        NULL,
        '<ol>
        <li>排名不分先后。</li>
        <li>网站修改友链信息请重新提交留言即可。</li>
        <li>若发现站点无法访问，将会在一个月后删除。</li>
        <li>网站正常访问但是无故下掉链接的，会删除友链。</li>
        <li>如果不符合要求会无视掉申请，<font color="red">一天内都会通过。</font></li>
    </ol>',
        _t('申请友链说明'),
        _t('友情链接申请说明，支持HTML代码。')
    );
    $form->addInput($linksInfo);
    // 友情链接内容
    $linksContent = new Typecho_Widget_Helper_Form_Element_Textarea(
        'linksContent',
        NULL,
        '<ul class="mdui-list">
                <a target="_blank" href="https://blog.miomoe.cn/">
        <li class="mdui-list-item mdui-ripple">
            <div class="mdui-list-item-avatar">
                <img src="https://q1.qlogo.cn/g?b=qq&nk=1778273540&s=640" />
            </div>
            <div class="mdui-list-item-content">
                <div class="mdui-list-item-title">鼠子Blog</div>
                <div class="mdui-list-item-text mdui-list-item-one-line">
                    <span class="mdui-text-color-theme-text">鼠子(ShuShuicu)的互联网笔记，记录一些有用的。</span>
                </div>
            </div>
        </li>
    </a>
        </ul>',
        _t('友情链接内容'),
        _t('友情链接的链接内容，推荐使用MDUI的链接组件<a href="https://www.mdui.org/docs/list">https://www.mdui.org/docs/list</a>')
    );
    $form->addInput($linksContent);

    // 自定义代码
    // 自定义css代码
    $cssStyleCode = new Typecho_Widget_Helper_Form_Element_Textarea(
        'cssStyleCode',
        NULL,
        '<style>
        body {
        font-weight:500;
        background: url(' . THEME_URL . '/assets/images/background.webp) 
        no-repeat 0 0;
        background-size: cover;
        background-attachment: fixed;
        }
    </style>',
        _t('自定义CSS代码'),
        _t('位于 head 标签之前(顶部)，<font color="red">需要在 style 标签内填写css代码。</font>')
    );
    $form->addInput($cssStyleCode);
    // 自定义js代码
    $jsStyleCode = new Typecho_Widget_Helper_Form_Element_Textarea(
        'jsStyleCode',
        NULL,
        NULL,
        _t('自定义JS代码'),
        _t('位于 body 标签之前(底部)，<font color="red">需要在 script 标签内填写JavaScript代码。</font>')
    );
    $form->addInput($jsStyleCode);
}
