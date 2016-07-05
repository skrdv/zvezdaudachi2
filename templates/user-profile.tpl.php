<div class="profile"<?php print $attributes; ?>>
    <div class="row">
        <div style="text-align: center" class="col-lg-4 col-md-4 col-sm-6 col-xs-14 col-lg-offset-0 col-md-offset-0 col-sm-offset-5 col-xs-offset-2">
            <div style="display: inline-block" class="thumbnail">
                <?php print render($user_profile['user_picture']);?>
            </div>
            <?php if(!user_has_role(3) && !user_has_role(4) && !user_has_role(5)) {
                hide($user_profile['privatemsg_send_new_message']);
            }else{?>
                <ul class="list-unstyled">
                    <?php
                    if(isset($user_profile['privatemsg_send_new_message']) && $user_profile['privatemsg_send_new_message']['#access']){?>
                        <li style="padding: 1px"><span class="glyphicon glyphicon-envelope"></span> <?php echo render($user_profile['privatemsg_send_new_message']);?></li>
                    <?php }?>
                    <?php if(isset($user_profile['masquerade']) && $user_profile['masquerade']['#access']){?>
                        <li style="padding: 1px"><span class="glyphicon glyphicon-user"></span> <?php echo render($user_profile['masquerade']);?></li>
                    <?php }?>
                </ul>
            <?php }?>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-10 col-xs-16 col-lg-offset-0  col-md-offset-0  col-sm-offset-3 col-xs-offset-0">
            <?php hide($user_profile['profile_one']['#title']) ?>
            <?php print render($user_profile);?>
        </div>
    </div>
</div>


