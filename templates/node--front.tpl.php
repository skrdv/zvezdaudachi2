
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
