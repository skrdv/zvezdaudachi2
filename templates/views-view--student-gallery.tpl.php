<div id="views-view--student-gallery" class="<?php print $classes; ?>">
    <div class="row views-rows-wrapper">
        <?php if ($rows){?>
            <?php print $rows; ?>
        <?php }?>
        <div class="clearfix"></div>
    </div>
    <?php if ($pager): ?>
        <?php print $pager; ?>
    <?php endif; ?>
</div>

<script>
    jQuery('.gallery-colorbox').myColorbox({
        innerHeight:'90%',
        innerWidth:'90%'
    })
</script>