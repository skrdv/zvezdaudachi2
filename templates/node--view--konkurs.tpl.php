<?php
if(!isset($fieldZagruzka))$fieldZagruzka="field_zagruzka_1_etap";
if(!isset($fieldGolosovanie))$fieldGolosovanie="field_golosovanie";
$profile_one = profile2_load_by_user($node->uid,'one');
$profile=entity_metadata_wrapper('profile2', $profile_one->pid);

$items=isset($content[$fieldZagruzka]['#items'])?$content[$fieldZagruzka]['#items']:array();
if(isset($content['field__vkontakte']['#items'][0]['value']) && preg_match('/vk\.com/',$content['field__vkontakte']['#items'][0]['value'])) {
    $items[] = $content['field__vkontakte']['#items'][0];
}?>

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
    <section> 
        <div id="carousel-items-<?php echo $id?>" class="carousel slide" <?php if(count($items)>1){?>data-ride="carousel"<?php }?> data-interval="false">
            <?php if(count($items)>1){?>
                <ol class="carousel-indicators">
                    <?php foreach($items as $key=>$item){?>
                        <li data-target="#carousel-items-<?php echo $id?>" data-slide-to="<?php echo $key?>" <?php if($key==0){?>class="active"<?php }?>></li>
                    <?php }?>
                </ol>
            <?php }?>
            <div class="carousel-inner" role="listbox">
                <?php foreach($items as $key=>$item) {
                    if (isset($item['uri'])){
                        $url = file_create_url($item['uri']);
                        $pathinfo = pathinfo($url);
                        $extType = 'other';

                        if($item['filemime']=='video/vk'){
                            $extType='video-vk';
                        }if($item['filemime']=='video/youtube'){
                            $extType = 'youtube';
                        }

                        if (isset($pathinfo['extension']) &&  $extType == 'other') {
                            $extension=mb_strtolower($pathinfo['extension']);
                            if (in_array($extension, array('jpg','jpeg', 'png', 'bmp','gif'))) {
                                $extType = 'img';
                            } elseif (in_array($extension, array('mp3'))) {
                                $extType = 'audio';
                            } elseif (in_array($extension, array('pdf'))) {
                                $extType = 'pdf';
                            }elseif (in_array($extension, array('mp4'))) {
                                $extType = 'video';
                            }elseif(in_array($extension, array('ppt','pptx','pps','ppsx'))){
                                $extType = 'ppt';
                            }elseif(in_array($extension, array('doc','docx','rtf'))){
                                $extType = 'word';
                            }
                        }

                    }else{
                        if(preg_match('/iframe/',$item['value'])){
                            $extType='vkontakte';
                        }else{
                            $extType='vkontakte-link';
                        }
                    }?>
                    <div class="<?php if($key==0){?>active<?php }?> item item-type-<?php echo $extType?>">
                        <?php  switch($extType){
                            case 'audio':?>
                                <audio src="<?php echo $url?>" controls></audio>
                            <?php break;
                            case 'youtube':
                                $youtubeId=str_replace('watch?v=','',$pathinfo['basename']);?>
                                <div class="hidden">
                                    <div class="carousel-colorbox-inline-item item-youtube" id="carousel-colorbox-inline-item-<?php echo $id?>-<?php echo $key?>">
                                        <iframe src="https://www.youtube.com/embed/<?php echo $youtubeId?>" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <a rel="group-<?php echo $id?>"  class='carousel-colorbox-inline' href="#carousel-colorbox-inline-item-<?php echo $id?>-<?php echo $key?>">
                                    <div class="play">
                                        <span class="glyphicon glyphicon-play-circle"></span>
                                    </div>
                                    <img src="http://img.youtube.com/vi/<?php echo $youtubeId?>/0.jpg"/>
                                </a>
                            <?php break;
                            case 'img':?>
                                <div class="hidden">
                                    <div class="carousel-colorbox-inline-item" id="carousel-colorbox-inline-item-<?php echo $id?>-<?php echo $key?>">
                                        <img src="<?php echo image_style_url('konkurs', $item['uri'])?>">
                                    </div>
                                </div>
                                <a rel="group-<?php echo $id?>"  class='carousel-colorbox-inline' href="#carousel-colorbox-inline-item-<?php echo $id?>-<?php echo $key?>">
                                    <img src="<?php echo image_style_url('konkurs_min', $item['uri'])?>">
                                </a>
                            <?php break;
                            case 'pdf': ?>
                                <a href="<?php echo $url?>">

                                </a>
                            <?php break;
                            case 'word': ?>
                                <a href="https://docs.google.com/gview?url=<?php echo $url?>&embedded=true">

                                </a>
                                <?php break;
                            case 'ppt':?>
                                <a href="https://docs.google.com/gview?url=<?php echo $url?>&embedded=true">

                                </a>
                            <?php break;
                            case "vkontakte":?>
                                <?php preg_match('/src="(.+)"/',$item['value'],$matches);?>
                                <a rel="group-<?php echo $id?>" href="<?php echo $matches[1]?>" class="carousel-colorbox-iframe">
                                    <div class="overlay">
                                    </div>
                                    <?php echo $item['value'];?>
                                </a>
                                <?php  break;
                            case 'video' :?>
                                <div class="hide">
                                    <div class="data carousel-colorbox-inline-item item-video" id="carousel-colorbox-inline-item-<?php echo $id?>-<?php echo $key?>">
                                        <?php  echo  render($content[$fieldZagruzka])?>
                                    </div>
                                </div>
                                <?php $pathname = pathinfo($url);
                                    $preview = urldecode(str_replace('http://zvezdaudachi.com/sites/default/files','public:/', $pathinfo['dirname'].'/'.$pathinfo['filename'].'.jpg'));

                                    //var_dump($preview);
                                    if(file_exists(drupal_realpath($preview))){
                                        $preview= image_style_url('konkurs_min', $preview);
                                    }else{
                                        $preview=false;
                                    }

                                ?>
                                <a class='carousel-colorbox-inline'  href="#carousel-colorbox-inline-item-<?php echo $id?>-<?php echo $key?>">
                                    <?php if($preview){?>
                                        <div class="play">
                                            <span class="glyphicon glyphicon-play-circle"></span>
                                        </div>
                                        <img src="<?php echo $preview;?>">
                                    <?php }?>
                                </a>
                                <?php break ;
                                case 'vkontakte-link':?>
                                <a target="_blank" href="<?php echo $item['value']?>">

                                </a>
                                <?php break;
                                case 'video-vk':?>
                                    <?php  $uri=explode('?',$item['uri']);
                                    parse_str($uri[1],$urlArray);
                                    $link='public://media-vk/'.$urlArray['oid'].'_'.$urlArray['id'].'.jpg';?>
                                    <div class="hidden">
                                        <div class="carousel-colorbox-inline-item item-video-vk" id="carousel-colorbox-inline-item-<?php echo $id?>-<?php echo $key?>">
                                            <?php  echo  render($content[$fieldZagruzka])?>
                                        </div>
                                    </div>
                                    <a rel="group-<?php echo $id?>"  class='carousel-colorbox-inline' href="#carousel-colorbox-inline-item-<?php echo $id?>-<?php echo $key?>">
                                        <div class="play">
                                            <span class="glyphicon glyphicon-play-circle"></span>
                                        </div>
                                        <img src="<?php echo file_create_url($link);?>">
                                    </a>
                                    <?php break;
                                case 'other':?>
                                    <a  href="<?php echo file_create_url($item['uri']);?>">

                                    </a>
                                <?php break;?>
                            <?php }?>
                    </div>
                <?php }?>
            </div>
            <?php if(count($items)>1){?>
                <a class="left carousel-control" href="#carousel-items-<?php echo $id?>" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-items-<?php echo $id?>" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            <?php }?>
        </div>







        <?php       // var_dump(file_create_url($content['field_zagruzka']['#items'][1]['uri']));



        //var_dump( file_create_url($content['field_zagruzka'][0]['#file']->uri));

        //var_dump($content['field__vkontakte']['#items'][0]['value']);
        //echo render($content['field__vkontakte']);

        //echo render($content['field__vkontakte']);

        /* echo render($content['title']);
         echo render($content['workflow']);
         echo render($content['links']);

         echo render($content['field_kat']);

         echo render($content['field_golosovanie_3_etap']);
         echo render($content['field_vozkon']);
         echo render($content['workflow_current_state']);*/?>

    </section>
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
            <?php echo render($content[$field_golosovanie]);?>
        </div>
    </footer>
</div>

