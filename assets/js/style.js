//** 2024 MioMoe! Copyright By ShuShuicu */
console.log("\n%c %s %c %s %c %s\n", "color: #fff; background: #34495e; padding:5px 0;", "Theme: MioV4", "background: #fadfa3; padding:5px 0;", "https://blog.miomoe.cn", "color: #fff;background: #d6293e; padding:5px 0;", "B站@ShuShuicu");
document.addEventListener('DOMContentLoaded', function() {
    // 初始化ViewImage
    if (window.ViewImage) {
        ViewImage.init('.post-container img');
    }
});

// 复制提示
document.body.oncopy = function () {
    mdui.snackbar({
        message: '复制成功，如需转载请保留链接。',
        position: 'top',
    });
};

// 高亮代码
(function(){
    var pres = document.querySelectorAll('pre');
    var lineNumberClassName = 'line-numbers';
    pres.forEach(function (item, index) {
        item.className = item.className == '' ? lineNumberClassName : item.className + ' ' + lineNumberClassName;
    });
})();

// piciv
function checkInput() {
    text = document.getElementById("inputer").value;
    type_pic = document.getElementsByName("tp");
    for(var i=0; i<3; i++) {
        if(type_pic[i].checked) {
            type = type_pic[i].value;
        }
    }
    image_e = document.getElementById('image');
    image_e.src = "https://i0.wp.com/pixiv.re/" + text + "." + type;
}

// 主题样式
// 切换主题并保存
// 主题切换函数
function toggleThemeFunction() {
    var body = document.body;
    var currentTheme = body.classList.contains('mdui-theme-layout-light') ? 'mdui-theme-layout-light' :
        body.classList.contains('mdui-theme-layout-dark') ? 'mdui-theme-layout-dark' :
            'mdui-theme-layout-auto';

    // 切换到下一个主题
    switch (currentTheme) {
        case 'mdui-theme-layout-auto':
            body.classList.replace('mdui-theme-layout-auto', 'mdui-theme-layout-light');
            localStorage.setItem('theme', 'mdui-theme-layout-light');
            mdui.snackbar({
                message: '当前为：浅色模式',
                position: 'right-bottom',
            });
            break;
        case 'mdui-theme-layout-light':
            body.classList.replace('mdui-theme-layout-light', 'mdui-theme-layout-dark');
            localStorage.setItem('theme', 'mdui-theme-layout-dark');
            mdui.snackbar({
                message: '当前为：深色模式',
                position: 'right-bottom',
            });
            break;
        case 'mdui-theme-layout-dark':
            body.classList.replace('mdui-theme-layout-dark', 'mdui-theme-layout-auto');
            localStorage.setItem('theme', 'mdui-theme-layout-auto');
            mdui.snackbar({
                message: '当前为：自动模式',
                position: 'right-bottom',
            });
            break;
    }
}

// 为toggleTheme和toggleThemeFooter元素添加事件监听器
document.getElementById('toggleTheme').addEventListener('click', toggleThemeFunction);

// 加载主题设置
document.addEventListener('DOMContentLoaded', function () {
    var body = document.body;
    var savedTheme = localStorage.getItem('theme');

    if (savedTheme) {
        // 用保存的主题类替换可能存在的主题类
        body.classList.replace('mdui-theme-layout-light', savedTheme);
        body.classList.replace('mdui-theme-layout-dark', savedTheme);
        body.classList.replace('mdui-theme-layout-auto', savedTheme);
    }
});
