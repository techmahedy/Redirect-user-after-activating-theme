<?php

/* Redirect on theme activation */
add_action('admin_init', function(){
    global $pagenow;

    if ("themes.php" == $pagenow && is_admin() && isset($_GET['activated'])) {
        wp_redirect(esc_url_raw(add_query_arg('page', 'keenshot', admin_url('options-general.php'))));
    }
});

function keenshot_register_settings()
{
    add_option('keenshot_option_name', 'This is my option value.');
    register_setting('keenshot_options_group', 'keenshot_option_name', 'keenshot_callback');
}
add_action('admin_init', 'keenshot_register_settings');

function keenshot_register_options_page()
{
    add_options_page('Page Title', 'Keenshot', 'manage_options', 'keenshot', 'keenshot_options_page');
}
add_action('admin_menu', 'keenshot_register_options_page');

function keenshot_options_page()
{
?>
    <div>       
        <h2>Hey dude! Watch this video to know , how to customize keenshot theme ?  Have a good journey! For any query , you can visit also <a href="https://keendevs.com" target="_blank">keendevs</a></h2>
        <iframe width="420" height="315" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe> <br>
        
        <a href="/wp-admin/customize.php" target="_blank" class="button button-primary">Go to theme customizer!</a>
    </div>
<?php
}
