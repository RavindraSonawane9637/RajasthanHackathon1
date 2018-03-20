<?php

if ((!defined('ABS_PATH')))
    exit('ABS_PATH is not loaded. Direct access is not allowed.');
if (!OC_ADMIN)
    exit('User access is not allowed.');
/* 
 * Copyright (C) 2016 Puiu Calin
 * This program is a commercial software: is forbidden to use this software without licence, 
 * on multiple installations, and by purchasing from other source than those authorized for the sale of software.
 * Unauthorized copying of this file, via any medium is strictly prohibited
 */

?>
<link rel="stylesheet" href="<?php echo osc_base_url(); ?>oc-content/plugins/auto_response/css/css.css" type="text/css">
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=651333508343077";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div class="rights" >
    <a style="float:left;" href="http://theme.calinbehtuk.ro" title="Premium theme and plugins for oslcass">
        <img src="<?php echo osc_base_url() ?>oc-content/plugins/auto_response/images/calinbehtuk.png" title="premium theme and plugins for oslcass"/></a>
    <span style="float:right;line-height:40px;font-weight:700;"><?php _e('Follow:', 'auto_response'); ?><a target="blank" style="text-decoration:none;" href="https://www.facebook.com/Calinbehtuk-themes-1086739291344584/"> <img style="margin-bottom:-5px;margin-left:5px;" src="<?php echo osc_base_url() ?>oc-content/plugins/auto_response/images/facebook.png" title="facebook"/></a></span>
    <div class="like">
        <div class="fb-like" data-href="https://www.facebook.com/Calinbehtuk-themes-1086739291344584/" data-layout="standard" data-action="like" data-show-faces="false" data-share="false"></div>
    </div>
</div>
<?php //auto_response_content(); ?>
<h2 class="render-title"><?php _e('Settings', 'auto_response'); ?></h2>
<form style="border:1px solid #ddd;padding:15px;background:#F6F6F6;border-radius:3px;" action="<?php echo osc_admin_render_plugin_url('auto_response/admin/settings.php'); ?>" method="post">  
    <input type="hidden" name="auto_response_action_specific" value="auto_response_settings" />
    <fieldset>
        <div class="form-horizontal">
            <div class="form-row">
                <div class="form-label"><?php _e('Send auto response email', 'auto_response'); ?></div>
                <div class="form-controls">
                    <select name="send_email">
                        <option name="send_email" value="0" <?php
                        if (osc_get_preference('send_email', 'auto_response') == '0') {
                            echo 'selected="selected"';
                        }
                        ?>><?php _e('No', 'auto_response'); ?></option> 
                        <option name="send_email" value="1" <?php
                        if (osc_get_preference('send_email', 'auto_response') == '1') {
                            echo 'selected="selected"';
                        }
                        ?>><?php _e('Yes', 'auto_response'); ?></option>
                    </select>
                </div> 
            </div> 
            <input type="submit" value="<?php _e('Save changes', 'auto_response'); ?>" class="btn btn-submit">           
        </div>
    </fieldset>
</form>
<br />
<br />
<h2 class="render-title"><?php _e('Info', 'auto_response'); ?></h2>
<pre>
<?php _e('This plugin send an email to the user which use the contact page to send a message to administator, and in this email the user is informed that will be contacted in the short time by the administator of the site.', 'auto_response'); ?>
<br />
<?php _e('When the contact form is submitted, Auto Response plugin send an automatic email to the email entered in the email field, as automatic response to the question send to admin, the user is informed to not replay on this message.', 'auto_response'); ?>
<br />
<?php _e('You have to activate this plugin and set the option in the plugin settings to send or not the email to users.', 'auto_response'); ?>
<br />
<?php _e('You can change the email template under Email template tab/auto_response_message.', 'auto_response'); ?>
<a href="<?php echo osc_base_url(); ?>oc-admin/index.php?page=emails"> <?php _e('Email templates', 'auto_response'); ?></a>
</pre>
<center><iframe width="560" height="315" src="https://www.youtube.com/embed/RVKi7aGbomk" frameborder="0" allowfullscreen></iframe></center>