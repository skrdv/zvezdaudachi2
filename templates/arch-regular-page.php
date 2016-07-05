
<body> 


<?php if (!empty($page['sidebar_first'])): ?>
<aside>
<?php print render($page['sidebar_first']); ?>
</aside>
<?php endif; ?>
<?php if (!empty($page['help'])): ?>
<?php print render($page['help']); ?>
<?php endif; ?>
<?php echo render($page['content'])?>
<?php if (!empty($page['sidebar_second'])): ?>
<aside>
<?php print render($page['sidebar_second']); ?>
</aside>
<?php endif; ?>
</body>
<footer class="row">
<div class="col-md-2 col-lg-2 col-sm-8 col-xs-14 footer-1"><div class="img-foot"><img src="/sites/all/themes/zvezdaudachi2/img/arch-img/foot.jpg" alt=""></div></div>
<div class="col-md-2 col-lg-2 col-sm-8 col-xs-14 footer-2"><div class="text-menu-footer"><a link href="#">Главная</a><br><a link href="#">О конкурсе</a><br><a link href="#">Конкурсное задание</a><br><a link href="#">Жюри</a><br><a link href="#">Работы</a><br><a link href="#">Учредитель проекта</a></div></div>
<div class="col-md-2 col-lg-2 col-sm-8 col-xs-14 footer-3"><div class="cop">хочется копирайту сюда!</div></div>
<div class="col-md-2 col-lg-2 col-sm-8 col-xs-14 footer-4"></div>
<div class="col-md-2 col-lg-2 col-sm-8 col-xs-14 footer-5"></div>



	<!-- <img src="/sites/all/themes/zvezdaudachi2/img/arch-img/arch-footer.jpg" alt=""> -->
</footer>