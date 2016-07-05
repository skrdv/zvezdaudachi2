<header id="zvezda-header-wrapper" class="row">
    <?php include('header.tpl.php');?>
</header>
<section id="zvezda-content-wrapper" class="row">
    <div class="col-lg-16 col-md-16 col-sm-15 col-xs-16" id="zvezda-content">
        <div id="zvezda-page--front" class="front-page">
                <?php require('parts/page-top.php');?>
                <?php echo render($page['content'])?>
            <?php if (!empty($page['sidebar_second'])): ?>
                <aside>
                    <?php print render($page['sidebar_second']); ?>
                </aside>
            <?php endif; ?>
        </div>
    </div>
</section>


