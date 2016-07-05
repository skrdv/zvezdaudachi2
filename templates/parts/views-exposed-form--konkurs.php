<?php  $add_node_konkurs_link = zvezdaudachi2_get_add_konkurs_link(); ?>
<div id="views-exposed-form--konkurs">
    <div class="row">
       <div class="col-md-1 star-kasting-wrapper hidden-xs">
            <?php //<a class="star-kasting" href="/school/onlayn-zapis-na-kasting"></a> ?>
        </div>
        <div class="col-lg-11 col-md-11 col-sm-16 col-xs-16">
            <?php if(isset($filterFieldKat)){?>
                <div class="row">
                    <div class="col-lg-16 col-md-16 col-xs-16 filter-field_kat">
                        <?php print $widgets['filter-'.$filterFieldKat]->widget;?>
                    </div>
                </div>
            <?php }?>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-8">
                    <label><?php print $widgets['filter-field_gorod_tid']->label?></label>
                    <div class="form-item-field-gorod-tid">
                        <?php print $widgets['filter-field_gorod_tid']->widget;?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-8">
                    <label><?php print $widgets['filter-contestfilter']->label?></label>
                    <div class="form-item-contestfilter">
                        <?php print $widgets['filter-contestfilter']->widget;?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-8">
                    <?php print $sort_by; ?>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-8">
                    <a id="konkurs-filters-submit"></a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-16 col-xs-16">
                    <div id="filter-field_nominaciya">
                        <div class="filter-field_nominaciya-title">НОМИНАЦИЯ</div>
                        <div id="konkurs-nominaciya-toggle">
                            <?php print $widgets['filter-'.$filterFieldNominaciya]->widget;?>
                        </div>
                        <div class="hidden visible-xs-block">
                            <span id="konkurs-nominaciya-toggle-button" class="pull-right a">показать все номинации</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10 col-xs-16" id="selected_filters">
                    <?php if(isset($filterFieldKat)){?>
                        <div>
                            <span class="color_menu_color_4">КАТЕГОРИЯ:</span>
                            <?php if(!isset($_GET['field_kat_value']) || $_GET['field_kat_value']=='All'){?>Все категории
                            <?php }elseif($_GET['field_kat_value']==1){?>Начальная школа
                            <?php }elseif($_GET['field_kat_value']==2){?>Средняя школа
                            <?php }elseif($_GET['field_kat_value']==3){?>Старшая школа<?php }?>
                        </div>
                    <?php }?>
                    <div>
                        <span class="color_menu_color_4">НОМИНАЦИЯ:</span>&nbsp;<?php if(!isset($_GET['"'.$filterFieldNominaciya.'"']) || $_GET['"'.$filterFieldNominaciya.'"']=='All'){?>Все номинации<?php }else{ echo $_GET['"'.$filterFieldNominaciya.'"'];}?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xs-16">

        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function(){
        jQuery('#konkurs-filters-submit').click(function(){
            jQuery('.view-filters form').submit();
        })
    })
</script>
