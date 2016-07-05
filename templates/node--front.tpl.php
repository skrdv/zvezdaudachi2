<!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter37992485 = new Ya.Metrika({ id:37992485, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/37992485" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
<header id="zvezda-header-wrapper" class="row">
    <?php include('header-front.tpl.php');?>
</header>
<section id="zvezda-content-wrapper" class="row">
    <div class="col-lg-16 col-md-16 col-sm-15 col-xs-16" id="zvezda-content">
        <div id="zvezda-page--front" class="front-page">
            <?php if (!empty($page['sidebar_first'])): ?>
                <aside>
                    <?php print render($page['sidebar_first']); ?>
                </aside>
            <?php endif; ?>
            <?php if (!empty($page['help'])): ?>
                <?php print render($page['help']); ?>
            <?php endif; ?>
            <?php echo render($page['content'])?>
            <?php if (!empty($page['sidebar_second'])): ?>
                <aside>
                    <?php print render($page['sidebar_second']); ?>
                </aside>
            <?php endif; ?>
        </div>
    </div>
</section>
