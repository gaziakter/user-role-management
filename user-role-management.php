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
    }

    public function user_role_namagement_function(){
        add_role('custom_role', 'Custom Role', ['blocked' => true]);
    }
 }

 new User_role_management();