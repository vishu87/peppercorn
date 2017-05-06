<?php 
function add_theme_menu_item()
{
    add_menu_page("Theme Options", "Theme Options", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}
 
add_action("admin_menu", "add_theme_menu_item");

function theme_settings_page()
{
    ?>
        <div class="wrap">
        <h1>Theme Panel</h1>
        <form method="post" action="options.php">
            <input type="hidden" name="theme_hidden" value="1">
            <?php
                settings_fields("section");
                do_settings_sections("theme-options");      
                submit_button(); 
            ?>          
        </form>
        </div>
    <?php
}

function display_facebook_element()
{
    ?>
        <input type="text" name="facebook_url" id="facebook_url" value="<?php echo esc_attr(get_option('facebook_url')); ?>" style="width:500px" />
    <?php
}
function display_twitter_element()
{
    ?>
        <input type="text" name="twitter_url" id="twitter_url" value="<?php echo esc_attr(get_option('twitter_url')); ?>" style="width:500px" />
    <?php
}
function display_instagram_element()
{
    ?>
        <input type="text" name="instagram_url" id="instagram_url" value="<?php echo esc_attr(get_option('instagram_url')); ?>" style="width:500px" />
    <?php
}

function display_theme_panel_fields(){
    
    add_settings_section("section", "All Settings", null, "theme-options");
    // add_settings_field("favicon", "Favicon", "display_favicon_element", "theme-options", "section");
    add_settings_field("twitter_url", "Twitter Profile", "display_twitter_element", "theme-options", "section");
    add_settings_field("facebook_url", "Facebook Profile", "display_facebook_element", "theme-options", "section");
    add_settings_field("instagram_url", "Instagram Profile", "display_instagram_element", "theme-options", "section");
    // add_settings_field("youtube_url", "Youtube Profile", "display_youtube_element", "theme-options", "section");

    // add_settings_field("quote_text", "Quote Text", "display_quote_text_element", "theme-options", "section");
    // add_settings_field("quote_author", "Quote Author", "display_quote_author_element", "theme-options", "section");

    //register_setting("section", "main_logo");
    // register_setting("section", "favicon");
    register_setting("section", "twitter_url");
    register_setting("section", "facebook_url");
    register_setting("section", "instagram_url");
    // register_setting("section", "youtube_url");
    // register_setting("section", "quote_text");
    // register_setting("section", "quote_author");
}
add_action("admin_init", "display_theme_panel_fields");
?>