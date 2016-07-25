<?php
$html = strip_tags(render ($content['field_newsim']), '<img>');
preg_match('~<img[^>]*?src="([^"]*)"[^>]*>~i', $html, $src);
$im_src = (!empty($src))?str_replace(array("\r\n", "\r", "\n"), '', strip_tags($src[1])):'';
$discr = strip_tags(render ($content['field_anons']));
$dis = str_replace(array("\r\n", "\r", "\n"), '', strip_tags($discr));
?>
<div class="node--view--news <?php print $classes; ?>"  id="node-<?php print $node->nid; ?>"  <?php print $attributes; ?>>
    <div class="row">
        <div class="col-lg-13 col-md-13 col-sm-16 col-xs-16 col-lg-offset-3 col-md-offset-3 col-sm-offset-0 col-xs-offset-0">
            <div class="h3"><?php echo  $title ?></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-10 col-xs-16 col-lg-offset-0 col-md-offset-0 col-sm-offset-3 col-xs-offset-0">
            <div class="field-name-field-newsim">
                <?php
                if(isset($node->field_newsim['und'][0]['uri'])){
                    $image_uri = $node->field_newsim['und'][0]['uri'];
                    $image_url_with_style = image_style_url('news_thumb',$image_uri);
                    echo '<img src="'.$image_url_with_style.'">';
                }
                ?>
            </div>
        </div>
        <div class="col-lg-13 col-md-13 col-sm-16 col-xs-16">
            <div class="field_date_wrapper"><em><strong><?php echo $date?></strong></em></div>
            <div class="field_anons_wrapper">
                <?php echo render($content['field_anons']); ?>
            </div>
            <?php $body=render($content['body']);?>
            <?php if(!empty($body)){?>
                <div class="field_body_wrapper">
                    <?php print $body;?>
                    <?php
                    if(isset($node->field_newsim['und'][0]['uri'])){
                        $image_url_with_style = image_style_url('news_large',$image_uri);
                        echo '<img src="'.$image_url_with_style.'">';
                    }
                    ?>
                </div>
            <?php }?>
            <script type="text/javascript">
                document.write(VK.Share.button({
                        url: 'http://zvezdaudachi.com/<?php print current_path(); ?>',
                        title: '<?php print $title; ?>',
                        description: '<?php print $dis; ?>',
                        image: '<?php print $im_src; ?>',
                        noparse: true
                    },
                    {type: 'round', text: 'Поделиться новостью'}));
            </script>
            <?php if(!empty($body)){?>
                <a class="btn-more-color-5 pull-right a btn-more">подробнее</a>
                <a class="pull-right btn-hide a hidden"">скрыть</a>
            <?php }?>
        </div>
    </div>
</div>
