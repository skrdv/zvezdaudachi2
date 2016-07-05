<?php
$profile_one = profile2_load_by_user($node->uid,'school');
$profile = entity_metadata_wrapper('profile2', $profile_one->pid);
$items = (isset($content['field_zagruzka']['#items']))?$content['field_zagruzka']['#items']:array();
?>

<div class="node--view--konkurs">
    <header>
        <div class="field-title"><a href="<?php echo $node_url?>"><strong><?php echo $title?></strong></a></div>
        <?php if ($profile_one->field_odinilikol3['und'][0]['value']=='Коллектив'){?>
            <?php echo $profile_one->field_nazvanie3['und'][0]['value'];?>
        <?php }else{?>
            <?php if(empty( $profile_one->field_name3['und'][0]['value']) && empty($profile_one->field_familiya3['und'][0]['value'])){?>
                <?php echo strip_tags($name) ;?>
            <?php }else{?>
                <?php echo $profile_one->field_name3['und'][0]['value'];?> <?php echo $profile_one->field_familiya3['und'][0]['value'];?>
            <?php }?>
        <?php }?>
    </header>
    <?php include('parts/node--view--konkurs.php')?>
    <footer class="row">
        <div class="col-lg-8 col-md-8 col-sm-16 col-xs-16">
            <div style="margin-top:10px;">
                <?php if($profile->field_odinilikol3->value()=='Коллектив'){?>
                    <span>
                <strong>Ср. возраст:</strong> <?php echo $profile->field_field_srednvozrast4->value();?>
              </span><br>
                <?php }else{?>
                    <span>
                <strong>Возраст:</strong> <?php echo $profile->field_vozrats4->value();?>
              </span><br>
                <?php }?>
            </div>
            <?php echo render($content['field_kat']);?>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-16 col-xs-16">
            <?php echo render($content['field_golosovanie']);?>
        </div>
    </footer>
</div>

