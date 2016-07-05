<header id="zvezda-header-wrapper" class="row">
    <?php if (current_path()=='konkurs-student') { include('header-student.php');} else {include('header-school.php');}?>
</header>
<section id="zvezda-content-wrapper" class="row">
    <div class="col-md-16 zvezda-content-color-4" id="zvezda-content<?php if (current_path()=='konkurs-student') {echo '-student' ;}?>">
        <div id="page--konkurs" class="work-page">
            <section id="content">
                <?php if ($title): ?>
                    <h1 class="title" id="page-title"><?php print $title; ?></h1>
                <?php endif; ?>
                <?php print render($page['content']); ?>
            </section>
        </div>
    </div>
</section>


