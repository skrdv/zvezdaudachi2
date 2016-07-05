<?php

$profile = profile2_load_by_user($node->uid,'student');
$profile_data = entity_metadata_wrapper('profile2', $profile->pid);
$items = (isset($content['field_zagruzka']['#items']))?$content['field_zagruzka']['#items']:array();
?>

<div class="node--view--konkurs">
    <header>
        <div class="field-title"><a href="<?php echo $node_url?>"><strong><?php echo $title?></strong></a></div>
        <?php if ($profile_data->field_odinilikol3->value()=='Коллектив'){?>
            <?php echo $profile->field_nazvanie3['und'][0]['value'];?>
        <?php }else{ ?>
            <?php if(empty( $profile->field_name3['und'][0]['value']) && empty($profile->field_familiya3['und'][0]['value'])){?>
                <?php echo strip_tags($name) ;?>
            <?php }else{?>
                <?php echo $profile->field_name3['und'][0]['value'];?> <?php echo $profile->field_familiya3['und'][0]['value'];?>
            <?php }?>
        <?php } ?>
    </header>
    <?php include('parts/node--view--konkurs.php')?>
    <footer class="row">
        <div class="col-lg-8 col-md-8 col-sm-16 col-xs-16">
            <div style="margin-top:10px;">
                <?php if($profile_data->field_odinilikol3->value() == 'Коллектив'){ ?>
                    <?php if($profile->type=='school'){?>
                        <span><strong>Ср. возраст:</strong> <?php echo $profile_data->field_field_srednvozrast4->value();?></span>
                    <?php }?>
                    <br>
                <?php }else{?>
                    <span>
              <!--  <strong>Возраст:</strong> <?php echo $profile_data->field_vozrats4->value();?>  -->
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

