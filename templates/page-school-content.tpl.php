
<div  id="zvezda-content" class="col-md-16 zvezda-content-color-<?php echo $pageIndexMainMenuFirstLevel?>">
        <div id="page" class="work-page">
            <?php if (!empty($page['sidebar_first'])): ?>
                <aside>
                    <?php print render($page['sidebar_first']); ?>
                </aside>
            <?php endif; ?>
            <?php if (!empty($page['help'])): ?>
                <?php print render($page['help']); ?>
            <?php endif; ?>

            <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
            <?php if ($messages): ?>
                <div id="messages"><?php print $messages; ?></div>
            <?php endif; ?>
            <div id="main-wrapper" class="clearfix">
                <section id="content">
                   <!-- <a class="star-kasting" href="/school/onlayn-zapis-na-kasting"></a>
                    <a class="send_work" href="/node/add/konkurs-school"></a> -->
                    <?php $add_node_konkurs_link=theme_get_setting('add_node_konkurs_link');?>
                    <?php if(!empty($add_node_konkurs_link)){?><a class="send_work"  href="<?php echo $add_node_konkurs_link?>"> </a><?php }?>
                    <?php if ($title): ?>
                        <h1 class="title" id="page-title"><?php print $title; ?></h1>
                    <?php endif; ?>
                    <?php print render($page['content']); ?>
                </section>
            </div>

            <?php if (!empty($page['sidebar_second'])): ?>
                <aside>
                    <?php print render($page['sidebar_second']); ?>
                </aside>
            <?php endif; ?>
        </div>
        <script type="text/javascript">
          jQuery(document).ready(function(){
            var btn = jQuery('#konkurs-school-node-form').find('#edit-submit');
            btn.on('click', function() {
              //alert('Один раз нажал и хватит!');
              console.log('click');
              jQuery(this).hide();
              setTimeout(function(){
                console.log('5sec');
                jQuery(this).show();
              }, 5000);
            });
          });
        </script>
    </div>
