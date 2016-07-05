<?php
$uri = $_SERVER['HTTP_HOST'] . '/' . request_uri();
if ($uri == 'zvezdaudachi.com//school/o-konkurse' or
$uri == 'zvezdaudachi.com//school/pravila' or
$uri == 'zvezdaudachi.com//school/pressa-o-nas' or
$uri == 'zvezdaudachi.com//school/prizy' or
$uri == 'zvezdaudachi.com//school/galereya' or
$uri == 'zvezdaudachi.com//school/nominations' or
$uri == 'zvezdaudachi.com//content/zhyuri-shkolniki' or
$uri == 'zvezdaudachi.com//konkurs-school' or
$uri == 'zvezdaudachi.com//school/news' or
$uri == 'zvezdaudachi.com//school/partnery' or
$uri == 'zvezdaudachi.com//moi-raboty' or
$uri == 'zvezdaudachi.com//user' ) {?>
<div id="btn-school-casting">
  <a href="/school/casting" class="link">
		<img src="/sites/all/themes/zvezdaudachi2/img/school_casting.png" width="110px">
	</a>
</div>
<div id="btn-school-work">
  <a href="/node/add/konkurs-school" class="link">
		<img src="/sites/all/themes/zvezdaudachi2/img/school_send_work.png">
	</a>
</div>
<?php } ?>

<?php /*
$path = $_SERVER['REQUEST_URI'];
$find = 'videos';
$pos = strpos($path, $find);
if ($pos !== false) { ?>
  <div id="btn-school-casting">
    <a href="/school/casting" class="link">
  		<img src="/sites/all/themes/zvezdaudachi2/img/school_casting.png" width="110px">
  	</a>
  </div>
  <div id="btn-school-work">
    <a href="/node/add/konkurs-school" class="link">
  		<img src="/sites/all/themes/zvezdaudachi2/img/school_send_work.png">
  	</a>
  </div>
<?php } */ ?>

<div id="zvezda-header-school">
  <div class="">
    <?php print render($page['header']);?>
  </div>
  <div class="">
    <div class="col-xs-16 col-sm-13 col-md-13 col-lg-13">
      <div class="header-top-school">ВСЕРОССИЙСКИЙ ТВОРЧЕСКИЙ КОНКУРС ДЛЯ ШКОЛЬНИКОВ</div>
    </div>
    <div class="col-xs-16 col-sm-3 col-md-3 col-lg-3">
      <a href="http://www.cds.spb.ru/" target="_blank" class="link logo-cds-header-school">
        <img src="/sites/all/themes/zvezdaudachi2/img/logo_cds_small.png" />
      </a>
    </div>
    <div class="col-xs-16 col-sm-16 col-md-16 col-lg-16">
      <nav class="navbar navbar-default">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#school-menu-navigation">
            <span class="icon-text">Меню</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse row" id="school-menu-navigation">
          <?php print render($page['navigation']);?>
        </div>
      </nav>
    </div>
  </div>

  <div class="col-xs-16 col-sm-16 col-md-16 col-lg-16 header-slider-wrap">
    <div class="zvezda-logo-3 school-logo-wrap">
      <a class="link logo-school" href="/">
        <img src="/sites/all/themes/zvezdaudachi2/img/logo_leto2016.png" />
      </a>
      <div class="social-school" style="visibility:<?php if (current_path() == 'node/83758') {echo 'hidden'; } ?>">
        <ul class="list-unstyled social-btns">
          <li><a title="vk.com" href="http://vk.com/zu_school" class="vk" target="_blank"></a></li>
          <li><a title="facebook.com" href="https://www.facebook.com/myzvezdaudachi" class="fb" target="_blank"></a></li>
          <li><a title="ok.ru" href="http://ok.ru/myzvezdaudachi" class="od" target="_blank"></a></li>
          <li><a title="youtube.com" href="http://www.youtube.com/channel/UCetOrhkdTnm4iltV0JWtiZA" class="yt" target="_blank"></a></li>
          <li><a title="instagram.com" href="https://instagram.com/my_zvezdaudachi/" class="in" target="_blank"></a></li>
          <li><a title="twitter.com" href="https://twitter.com/zvezdaudachi1" class="tw" target="_blank"></a></li>
        </ul>
      </div>
    </div>
    <?php
    for ($i=1; $i<31; $i++) { $img[]='/'.path_to_theme().'/img/slider/slider'.$i.'.jpg'; }
    shuffle($img);
    $img=array_splice($img,0,8);
    ?>
    <div id="zvezda-slider-wrapper" class="hidden-xs header-slider">
      <ul id="zvezda-slider">
        <?php foreach($img as $img){?>
          <li><img src="<?php echo $img?>"></li>
        <?php }?>
      </ul>
    </div>
  </div>

</div>
