<?php

/*
  Plugin Name: Cookie Alert
  Version: 0.1
  Description: Plugin shows information about cookie used on website
  Author: Egoist
*/

function install() {
	global $wpdb;
	$prefix = $wpdb->prefix;
	$tablename = $prefix . "cookie_alert";

	$ca_db_version = "1.0";

	if ($wpdb->get_var("show tables like '" . $tablename . "'") != $tablename) {
		$query = "create table " . $tablename . " (
		id int(9) not null auto_increment,
		name varchar(250) not null,
		graphic varchar(250),
		text varchar(255) not null,
		primary key (id)
		)";

		$wpdb->query($query);

		add_option("ca_db_version", $ca_db_version);
	}
}

function uninstall() {
	global $wpdb;
	$prefix = $wpdb->prefix;
	$tablename = $prefix . "cookie_alert";
	$query = 'drop table '.$tablename;
	$wpdb->query($query);
}

register_activation_hook(__FILE__, 'install');
register_deactivation_hook(__FILE__, 'uninstall');


