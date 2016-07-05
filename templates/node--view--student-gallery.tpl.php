<div class="node--view--student-gallery thumbnail">
    <header>
        <?php echo $title?>
    </header>
    <section>
        <?php $img=$content['field_imgstud'][0];?>
        <a class="gallery-colorbox" rel="group-<?php echo $nid?>" href="<?php echo image_style_url('konkurs', $img['#item']['uri'])?>" style="background-image: url(<?php echo image_style_url('konkurs_min', $img['#item']['uri'])?>)">

        </a>
        <div >
            <?php
            $key=1;
            while(isset($content['field_imgstud'][$key])){
                $img=$content['field_imgstud'][$key];?>
                <a class="gallery-colorbox" rel="group-<?php echo $nid?>" href="<?php echo image_style_url('konkurs', $img['#item']['uri'])?>"></a>
                <?php   $key++;
            }?>
        </div>
    </section>
</div>
