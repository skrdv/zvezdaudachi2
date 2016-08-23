

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-16 col-xs-16 zvezda-content zvezda-content-left">
        <div id="zvezda-content-left-spacer">
            <?php $add_node_konkurs_link = zu_get_add_konkurs_link();
              if(!empty($add_node_konkurs_link)){?>
                <a href="<?php echo $add_node_konkurs_link ?>" class="a" id="zvezda-content-send-work"></a>
            <?php }?>
            <a href="/content/onlayn-zapis-na-kasting" class="a" id="zvezda-content-zapic-kasting"></a>
            <a <?php if(!empty($add_node_konkurs_link)){?>href="<?php echo $add_node_konkurs_link ?>" class="a" <?php }?> id="zvezda-content-vpered-send-work"></a>
            <?php $fieldCountdown=render($content['field_countdown'])?>
        </div>
        <?php if(!empty($fieldCountdown)){?>
            <div id="zvezda-content-counter">
                <div id="zvezda-content-counter-title" >До окончания финала ...</div>
                <?php print render($content['field_countdown']);?>
                <ul class="zvezda-content-counter-time-descr list-unstyled"">
                <li>Дней</li>
                <li>Часов</li>
                <li>Минут</li>
                <li>Секунд</li>
                </ul>
            </div>
        <?php }?>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-16 col-xs-16 zvezda-content zvezda-content-right">
    </div>
</div>


