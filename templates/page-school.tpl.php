<header id="zvezda-header-wrapper" class="row">
    <?php include('parts/header-school.php');?>
</header>

<section id="zvezda-content-wrapper" class="row">
  <?php if (current_path()=='node/83758') {
    print render($page['content']);
  } else {
    include('page-school-content.tpl.php');
  }?>
</section>

<div class="row" id="pre-footer-school"> </div>

<footer id="zvezda-footer">
  <?php include('footer.tpl.php');?>
</footer>

<?php //print $page_bottom; ?>
</div>
