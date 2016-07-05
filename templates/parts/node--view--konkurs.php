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
                        case 'video' :?>
                            <div class="hide">
                                <div class="data carousel-colorbox-inline-item item-video" id="carousel-colorbox-inline-item-<?php echo $id?>-<?php echo $key?>">
                                    <?php  echo  render($content['field_zagruzka'])?>
                                </div>
                            </div>
                            <?php $pathname = pathinfo($url);
                            $preview = urldecode(str_replace('http://zvezdaudachi.com/sites/default/files','public:/', $pathinfo['dirname'].'/'.$pathinfo['filename'].'.jpg'));
                            if(file_exists(drupal_realpath($preview))){
                                $preview= image_style_url('konkurs_min', $preview);
                            }else{
                                $preview=false;
                            }?>
                            <a class='carousel-colorbox-inline'  href="#carousel-colorbox-inline-item-<?php echo $id?>-<?php echo $key?>">
                                <?php if($preview){?>
                                    <div class="play">
                                        <span class="glyphicon glyphicon-play-circle"></span>
                                    </div>
                                    <img src="<?php echo $preview;?>">
                                <?php }?>
                            </a>
                            <?php break ;
                        case 'video-vk':?>
                            <?php  $uri=explode('?',$item['uri']);
                            parse_str($uri[1],$urlArray);
                            $link='public://media-vk/'.$urlArray['oid'].'_'.$urlArray['id'].'.jpg';?>
                            <div class="hidden">
                                <div class="carousel-colorbox-inline-item item-video-vk" id="carousel-colorbox-inline-item-<?php echo $id?>-<?php echo $key?>">
                                    <?php  echo  render($content['field_zagruzka'])?>
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
</section>