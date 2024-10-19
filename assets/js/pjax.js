// pjax 刷新
$(document).pjax('a[href^="' + window.location.origin + '"]:not(a[target="_blank"], a[no-pjax])', {
    container: '#app',
    fragment: '#app',
    timeout: 8000
}).on('pjax:send', function() {
    NProgress.start(); // 加载动画效果开始
    $(document).on('pjax:complete', function() {
        NProgress.done(); // 加载动画效果结束
        $(document).on('click', '#toggleTheme', toggleThemeFunction);
        // 重载
        ViewImage();

        if (typeof Prism !== 'undefined') {
            var pres = document.getElementsByTagName('pre');
            for (var i = 0; i < pres.length; i++) {
                if (pres[i].getElementsByTagName('code').length > 0) {
                    pres[i].className = 'line-numbers'; // 加入 line-numbers 样式
                }
            }
            Prism.highlightAll(true, null); // 触发代码高亮
        }

        // 重新解析 Markdown 内容
        var content = document.getElementById('app').innerHTML;
        var parsedContent = marked(content);
        document.getElementById('app').innerHTML = parsedContent;
    });

});
