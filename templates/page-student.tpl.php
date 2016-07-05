<header id="zvezda-header-wrapper">
    <?php include('parts/header-student.php');?>
</header>

<section id="zvezda-content-wrapper" class="row">
  <?php if (current_path()=='node/88685') {
    print render($page['content']);
  } else {
    include('page-student-content.tpl.php');
  }?>
</section>

<?php include('footer-student.tpl.php');?>
