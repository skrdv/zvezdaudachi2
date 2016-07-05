<div class="col-lg-16 col-md-16 col-sm-16 col-xs-16"  id="zvezda-header">
    <div class="row">
        <?php print render($page['header']);?>
    </div>
    <div class="row">
        <div class="col-lg-14 col-md-14 col-sm-13 col-xs-16" id="zvezda-header-left">
            <div id="zvezda-logo-1">
                ВСЕРОССИЙСКОЕ ТВОРЧЕСКОЕ ДВИЖЕНИЕ
            </div>
            <nav>
                <div id="mobile-menu-btn-toggle-wrapper" class="hidden visible-xs-block">
                    <span id="mobile-menu-btn-toggle" class="btn btn-lg btn-default">
                        <span class="glyphicon glyphicon-align-justify"></span> Меню
                    </span>
                </div>
                <?php print render($page['navigation']);?>
                <div class="hidden visible-xs-block">
                    <div  id="mobile-menu-hide-btn" >
                        <span class="glyphicon glyphicon-chevron-up"></span>&nbsp;
                        срыть меню&nbsp;
                        <span class="glyphicon glyphicon-chevron-up"></span>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-16" id="zvezda-header-right">
            <a href="http://www.cds.spb.ru" id="zvezda-logo-2">

            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-16 col-md-16 col-sm-16 col-xs-16" id="zvezda-header-row">
            <div id="zvezda-logo-4" class="zvezda-logo-4">
                <a class="zvezda-logo-link" href="/"></a>
                <div id="zvezda-logo-3-social">
                    <ul class="list-unstyled social-btns">
                        <li><a title="vk.com" href="http://vk.com/zvezdaudachi2014" class="vk"></a></li>
                        <li><a title="facebook.com" href="https://www.facebook.com/myzvezdaudachi" class="fb"></a></li>
                        <li><a title="ok.ru" href="http://ok.ru/myzvezdaudachi" class="od"></a></li>
                        <li><a title="youtube.com" href="http://www.youtube.com/channel/UCetOrhkdTnm4iltV0JWtiZA" class="yt"></a></li>
                        <li><a title="instagram.com" href="https://instagram.com/my_zvezdaudachi/" class="in"></a></li>
                        <li><a title="twitter.com" href="https://twitter.com/zvezdaudachi1" class="tw"></a></li>
                    </ul>
                </div>
            </div>
            <?php
                $img[]='/'.path_to_theme().'/img/slider/slider_1.jpg';
                $img[]='/'.path_to_theme().'/img/slider/slider_2.jpg';
                $img[]='/'.path_to_theme().'/img/slider/slider_3.jpg';
                $img[]='/'.path_to_theme().'/img/slider/slider_4.jpg';
                $img[]='/'.path_to_theme().'/img/slider/slider_5.jpg';
                $img[]='/'.path_to_theme().'/img/slider/slider_6.jpg';
                $img[]='/'.path_to_theme().'/img/slider/slider_7.jpg';
                $img[]='/'.path_to_theme().'/img/slider/slider_8.jpg';
                $img[]='/'.path_to_theme().'/img/slider/slider_9.jpg';
                $img[]='/'.path_to_theme().'/img/slider/slider_10.jpg';
                $img[]='/'.path_to_theme().'/img/slider/slider_11.jpg';
                $img[]='/'.path_to_theme().'/img/slider/slider_12.jpg';
                $img[]='/'.path_to_theme().'/img/slider/slider_13.jpg';
                $img[]='/'.path_to_theme().'/img/slider/slider_14.jpg';
                $img[]='/'.path_to_theme().'/img/slider/slider_15.jpg';
                $img[]='/'.path_to_theme().'/img/slider/slider_16.jpg';
                $img[]='/'.path_to_theme().'/img/slider/slider_17.jpg';
                $img[]='/'.path_to_theme().'/img/slider/slider_18.jpg';
                $img[]='/'.path_to_theme().'/img/slider/slider_19.jpg';
                $img[]='/'.path_to_theme().'/img/slider/slider_20.jpg';
                $img[]='/'.path_to_theme().'/img/slider/slider_21.jpg';
                $img[]='/'.path_to_theme().'/img/slider/slider_22.jpg';
                $img[]='/'.path_to_theme().'/img/slider/slider_23.jpg';
                $img[]='/'.path_to_theme().'/img/slider/slider_24.jpg';
                $img[]='/'.path_to_theme().'/img/slider/slider_25.jpg';
                $img[]='/'.path_to_theme().'/img/slider/slider_26.jpg';
                $img[]='/'.path_to_theme().'/img/slider/slider_27.jpg';
                $img[]='/'.path_to_theme().'/img/slider/slider_28.jpg';
                $img[]='/'.path_to_theme().'/img/slider/slider_29.jpg';
                $img[]='/'.path_to_theme().'/img/slider/slider_30.jpg';
                shuffle($img);
                $img=array_splice($img,0,8);?>
            <div id="zvezda-slider-wrapper" class="hidden-xs">
                <ul id="zvezda-slider">
                    <?php foreach($img as $img){?>
                        <li><img src="<?php echo $img?>"></li>
                    <?php }?>
                </ul>
            </div>
        </div>
    </div>
</div>