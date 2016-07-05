<div id="views-view--konkurs" class="<?php print $classes; ?>">
    <div class="row views-filters-wrapper">
        <div class="col-md-16">
            <?php if ($exposed): ?>
                <div class="view-filters">
                    <?php print $exposed; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row views-rows-wrapper">
        <div class="col-md-10 col-md-offset-6">
            <?php if ($rows): ?>
            <div class="view-content">
                <?php print $rows; ?>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="row">
        <div class="col-md-16">
            <?php elseif ($empty): ?>
                <div class="view-empty">
                    <?php print $empty; ?>
                </div>
            <?php endif; ?>

            <?php if ($pager): ?>
                <?php print $pager; ?>
            <?php endif; ?>

            <?php if ($attachment_after): ?>
                <div class="attachment attachment-after">
                    <?php print $attachment_after; ?>
                </div>
            <?php endif; ?>

            <?php if ($more): ?>
                <?php print $more; ?>
            <?php endif; ?>

            <?php if ($footer): ?>
                <div class="view-footer">
                    <?php print $footer; ?>
                </div>
            <?php endif; ?>

            <?php if ($feed_icon): ?>
                <div class="feed-icon">
                    <?php print $feed_icon; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function(){
        jQuery(".carousel-colorbox-iframe").colorbox({iframe:true, innerWidth:'80%', innerHeight:'80%',current:"работа {current} из {total}"});
        jQuery(".carousel-colorbox-inline").myColorbox({inline:true});
    });
</script>