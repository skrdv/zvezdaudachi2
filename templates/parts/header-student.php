<?php $uri = $_SERVER['HTTP_HOST'] . '/' . request_uri();
if ($uri == 'zvezdaudachi.com//students/about' or
$uri == 'zvezdaudachi.com//student/rules' or
$uri == 'zvezdaudachi.com//student/pressa-o-nas' or
$uri == 'zvezdaudachi.com//student/prizy' or
$uri == 'zvezdaudachi.com//student/gallery' or
$uri == 'zvezdaudachi.com//student/nominations' or
$uri == 'zvezdaudachi.com//content/zhyuri-student' or
$uri == 'zvezdaudachi.com//konkurs-student' or
$uri == 'zvezdaudachi.com//student/news' or
$uri == 'zvezdaudachi.com//students/partners' or
$uri == 'zvezdaudachi.com//moi-raboty' or
$uri == 'zvezdaudachi.com//user' ) {?>
<div id="btn-student-casting">
  <a href="/student/casting" class="link">
		<img src="/sites/all/themes/zu/img/student_casting.png">
	</a>
</div>
<div id="btn-student-work">
  <a href="/node/add/konkurs-student" class="link">
		<img src="/sites/all/themes/zu/img/student_send_work.png">
	</a>
</div>
<?php } ?>

<div id="zvezda-header-student">
  <div class="row">
    <?php print render($page['header']);?>
  </div>
  <div class="row">
    <div class="col-xs-16 col-sm-16 col-md-4 col-lg-4">
      <a class="link logo-student" href="/">
        <img src="/sites/all/themes/zu/img/logo_leto2016.png" />
      </a>
    </div>
    <div class="col-xs-16 col-sm-16 col-md-12 col-lg-12">
      <div class="col-xs-16 col-sm-16 col-md-8 col-lg-8">
        <ul class="social-student">
          <li><a title="vk.com" href="http://vk.com/zu.students" class="vk"></a></li>
          <li><a title="facebook.com" href="https://www.facebook.com/zu.student.official" class="fb"></a></li>
          <li><a title="youtube.com" href="http://www.youtube.com/channel/UCetOrhkdTnm4iltV0JWtiZA" class="yt"></a></li>
          <li><a title="instagram.com" href="https://www.instagram.com/zu.students" class="in"></a></li>
        </ul>
      </div>
      <div class="col-xs-16 col-sm-16 col-md-8 col-lg-8">
        <a href="http://www.cds.spb.ru/" target="_blank" class="pull-right link logo-cds-header-student">
          <img src="/sites/all/themes/zu/img/zvezda_front/cds-logo.png" />
        </a>
      </div>
      <div class="col-xs-16 col-sm-16 col-md-16 col-lg-16">
        <nav class="navbar navbar-default">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#student-menu-navigation">
              <span class="icon-text">Меню</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="student-menu-navigation">
            <?php print render($page['navigation']);?>
          </div>
        </nav>
      </div>
    </div>
  </div>
</div>
