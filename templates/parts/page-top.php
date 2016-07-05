<?php if (!empty($page['sidebar_first'])): ?>
    <aside>
        <?php print render($page['sidebar_first']); ?>
    </aside>
<?php endif; ?>
<?php if (!empty($page['help'])): ?>
    <?php print render($page['help']); ?>
<?php endif; ?>

<?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
<?php if ($messages): ?>
    <div id="messages"><?php print $messages; ?></div>
<?php endif; ?>
