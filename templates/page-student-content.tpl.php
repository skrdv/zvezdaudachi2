
<div  id="zvezda-content-student" class="col-md-16 zvezda-content-color-<?php echo $pageIndexMainMenuFirstLevel?>">
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
                   <!-- <a class="star-kasting-student" href="/student/onlayn-zapis-na-kasting"></a>
                    <a class="send_work-student" href="/node/add"></a> -->
                    <?php $add_node_konkurs_link=theme_get_setting('add_node_konkurs_link');?>

                    <?php if ($title): ?>
                        <h1 class="title" id="page-title-student"><?php print $title; ?></h1>
                    <?php endif; ?>
                    <?php print render($page['content']); ?>
                </section>
            </div>


                <aside>
                    <?php print render($page['sidebar_second']); ?>
                </aside>

        </div>
        <script type="text/javascript">
          jQuery(document).ready(function(){
            var btn = jQuery('#konkurs-student-node-form').find('#edit-submit');
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
