<?php 

function shubham_register_styles(){

    wp_enqueue_style('shubham-css',get_template_directory_uri()."/style.css");
}


add_action('wp_enqueue_scripts', 'shubham_register_styles');

function inc_create_sidebar(){

    register_sidebar(array(
        'name'=>__("Shubham",'shubham'),
        'id'=>"My Sidebr",
        'description'=>__("This is decription"),

    ));
}


add_action('widgets_init','inc_create_sidebar');




function mymenu(){

    register_nav_menus(

        array( 'footer_menu'=>__("fooojjgjter","hey"))
    );
}

add_action('init','mymenu');

function remove_menu(){

    remove_menu_page('index.php');


}

// add_action('admin_menu','remove_menu');




function add_menu(){


    add_menu_page(

        "Theme", //Browser title,
        "Shubham", //Dashboard title
        "manage_options",//accessiblity
        "theme-options",//slug for add submenu
        "theme-options-page", //callback

        "",//icon
        100//position
    );

    add_submenu_page(
       'theme-options', //parent slug
       'subtitle',//page title
       'sub option',//menu title
        'manage_options',//acces//
    
        'control-menu',
        'control-option'
    );
    



}

add_action('admin_menu','add_menu');




function s_restrict_user(){

    if(!current_user_can('manage_options') &&( !wp_doing_ajax())){

        wp_die(__("Your Not allowed !"));
        //  wp_redirect(site_url("https://www.youtube.com/watch?v=6pCym_HW8-Y&list=PLD8nQCAhR3tTVcreVOlFteq0piaXq1jjk"));
    }
}


// add_action('admin_init','s_restrict_user');


function notice(){
?>

<div class="notice notice-success is-dismissible">

    <p><?php  _e("Done","etc sample")?></p>



</div>


<?php

}
// add_action("admin_notices",'notice');


function displ_once(){


    $screen = get_current_screen();

    if('edit-post'===$screen->id){
        add_action('all_admin_notices','notice');
    }


}
add_action('load.php','displ_once');


function cust_control(){

    ?>
<style>
body {
    display: none;
}
</style>

<?php


}

// add_action("customize_controls_print_scripts","cust_control");


function cust_init(){
    echo "do something";
}

add_action('customize_controls_init',"cust_init");
?>