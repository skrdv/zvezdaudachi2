<?php

/**
 * @param $profile_name
 * @param $field_zagruzka
 * @param $field_golosovanie
 */

$user = user_load($uid);
$data = entity_metadata_wrapper('node', $node);
$profile = profile2_load_by_user($node->uid,$profile_name);
$profile_data = entity_metadata_wrapper('profile2', $profile->pid);
if(empty($fieldGolosovanie))$fieldGolosovanie='field_golosovanie';


$field_nazvuchebn=$profile_data->field_nazvuchebn3->value();
if(empty($field_nazvuchebn) && $node->field_nazvuchebn3)$field_nazvuchebn=$data->field_nazvuchebn3->value();

$field_gorod_tid = isset($user->field_gorod['und'][0]['tid'])? $user->field_gorod['und'][0]['tid']:null;
$field_gorod_term = ($field_gorod_tid)?taxonomy_term_load($field_gorod_tid):'';


?>
<div class="node--konkurs">
    <div class="row">
        <div class="col-md-16" style="text-align: center">
           <h4> Номинация: <?php echo $content[$field_nominaciya][0]['#markup']?></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="thumbnail" style="display: inline-block;">
                <?php print theme('user_picture', array('account' =>$user));?>
            </div>
            <?php

                if($profile_data->field_odinilikol3->value()=='Один участник'){
                    include('profile-single.php');
                }else{

                    include('profile-group.php');
                }  ?>
          <br />
            <div style="text-align: right">
                <?php echo render($content[$fieldGolosovanie]);?>
            </div>
        </div>
        

          
        <div class="col-md-12">
            <div class="fields-carousel">
                <?php
                    // field_zagruzka
                    $slides=array();
                    if(isset($content['field_zagruzka']['#items']) && sizeof($content['field_zagruzka']['#items'])){
                        $items=$content['field_zagruzka']['#items'];
                        $i=0;
                        $files=array();
                        while(isset($content['field_zagruzka'][$i])){
                            $files[]=$content['field_zagruzka'][$i];
                            unset($content['field_zagruzka'][$i]);
                            $i++;
                        }
                        foreach($content['field_zagruzka']['#items'] as $key=>$item){
                            $slideKey=count($slides);
                            $slides[$slideKey]=$content['field_zagruzka'];
                            $slides[$slideKey]['#items']=array($items[$key]);
                            $slides[$slideKey]['#object']->field_zagruzka['und']=array($items[$key]);
                            $slides[$slideKey][0]=$files[$key];
                        }
                    }
                ?>
                <div id="carousel-items-<?php echo $nid?>" class="carousel slide" <?php if(count($slides)>1){?>data-ride="carousel"<?php }?> data-interval="false">
                    <?php if(count($slides)>1){?>
                        <ol class="carousel-indicators">
                            <?php foreach($slides as $key=>$slide){?>
                                <li data-target="#carousel-items-<?php echo $nid?>" data-slide-to="<?php echo $key?>" <?php if($key==0){?>class="active"<?php }?>></li>
                            <?php }?>
                        </ol>
                    <?php }?>
                    <div class="carousel-inner" role="listbox">
                        <?php foreach($slides as $key=>$slide){
                            $slide=$slide[0];
                            if (isset($slide['file']['#file']->uri) || isset($slide['file']['#item']['uri'])){
                                $uri=(isset($slide['file']['#item']['uri']))?$slide['file']['#item']['uri']:$slide['file']['#file']->uri;
                                $url = file_create_url($uri);
                                $pathinfo = pathinfo($url);
                                $type = 'other';
                                if (isset($pathinfo['extension'])) {
                                    $extension=mb_strtolower($pathinfo['extension']);
                                    if (in_array($extension, array('pdf','ppt','pptx','pps','ppsx','doc','docx','rtf'))) {
                                        $type = 'google-doc';
                                    }
                                }
                            }elseif(isset($slide['file']['#uri'])) {
                                $type=$slide['file']['#theme'];
                            }else{
                                if(isset($slide['#markup']) && preg_match('/iframe/',$slide['#markup'])){
                                    $type='vkontakte';
                                }else{
                                    //$type='vkontakte-link';
                                    $type='other';
                                }
                            }?>
                            <div class="<?php if($key==0){?>active<?php }?> item item-type-<?php echo $type?>">
                                <?php switch($type){
                                    case 'google-doc':?>
                                        <div style="text-align: center;margin-bottom: 10px;">
                                            <?php echo  render($slide);?>
                                        </div>
                                        <iframe height="95%" width="100%" src="https://docs.google.com/gview?url=<?php echo $url?>&embedded=true">

                                        </iframe>
                                    <?php break;
                                    case 'media_youtube_video':?>
                                        <?php $youtubeId=str_replace('youtube://v/','',$slide['file']['#uri']);?>
                                        <iframe width="100%" height="90%" src="https://www.youtube.com/embed/<?php echo $youtubeId?>?rel=0" frameborder="0" allowfullscreen></iframe>
                                    <?php break;?>
                                    <?php case 'other': ?>
                                        <?php echo  render($slide);?>
                                    <?php break;
                                    default?>
                                        <?php echo  render($slide);?>
                                    <?php break;?>
                                <?php }?>
                            </div>
                        <?php }?>
                    </div>
                    <?php if(count($slides)>1){?>
                        <a class="left carousel-control" href="#carousel-items-<?php echo $nid?>" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-items-<?php echo $nid?>" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    <?php }?>
                </div>
            </div>

            <div class="comments-wrapper">
                <script type="text/javascript">
                    VK.init({apiId: 5052895, onlyWidgets: true});
                </script>
                <!-- Put this div tag to the place, where the Comments block will be -->
                <div id="vk_comments" class="col-md-4 col-xs-16 col-sm-8 col-lg-4"></div>
                <script type="text/javascript">
                    VK.Widgets.Comments("vk_comments", {limit: 10, width: "200", attach: "*"});
                </script>
            </div>
        </div>
    </div>
</div>

 















