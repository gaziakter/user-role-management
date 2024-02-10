<?php
/**
 * Plugin Name: User Role Management
 * Description: A user role management plugin
 * Version: 4.0.0
 * Author: Gazi Akter
 * Author URI: http://gaziakter.com/
 * Plugin URI: http://gaziakter.com/plugin/user-role-management/
 */

 Class User_role_management{
    public function __construct(){
        add_action( 'init', array($this, 'user_role_namagement_function') );
        add_filter( 'query_vars', array($this, 'query_vars_function') );
        add_action( 'template_redirect', array($this, 'template_redirection_function') );
    }

    public function user_role_namagement_function(){

        //Create New Custom role
        add_role('custom_role', 'Custom Role', array( 'blocked' => true ));

        //Create custom url link
        add_rewrite_rule( 'custom-role/?$', 'index.php?custom-role=1', 'top' );

        //user ristraction
        if(is_admin() && current_user_can( 'blocked' )){
            wp_redirect( get_home_url().'/custom-role' );
            die();

        }
    }

    public function query_vars_function($query_vars){
        $query_vars[] = 'custom-role';
        return $query_vars;
    }

    public function template_redirection_function(){
        $is_custom_url = intval(get_query_var('custom-role' ));
        if($is_custom_url){
            echo '<h2>This is custom role page</h2>';
            die();
        }
    }
 }

 new User_role_management();