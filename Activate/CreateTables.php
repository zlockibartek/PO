<?php

add_action('init', 'pluginActivate');

function pluginActivate()
{
	createPlaceTable();
	createCoffeeTable();
	createTeaTable();
}

function createTeaTable()
{
	global $wpdb;
	$table  = $wpdb->prefix . 'tea';
	$sql = "CREATE TABLE IF NOT EXISTS `$table`(
		`id` INT(6) NOT NULL AUTO_INCREMENT,
		`name` VARCHAR(100) NOT NULL,
		`weight` INT(30) NOT NULL,
		`type` VARCHAR(50),
		`brew_time` INT(6),
		`brew_quantity` INT(6),
		`price` INT(6),
		`quantity` INT(30),
		PRIMARY KEY(id)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
	$wpdb->query($sql);
}

function createCoffeeTable()
{
	global $wpdb;
	$table  = $wpdb->prefix . 'coffee';
	$sql = "CREATE TABLE IF NOT EXISTS $table (
		`id` INT(6) NOT NULL AUTO_INCREMENT,
		name VARCHAR(100) NOT NULL,
		weight INT(30) NOT NULL,
		type VARCHAR(50),
		price INT(6),
		smoke_time TIMESTAMP,
		grind VARCHAR(30),
		quantity INT(30),
		PRIMARY KEY(id)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
	$wpdb->query($sql);
}
function createPlaceTable()
{
	global $wpdb;
	$table  = $wpdb->prefix . 'place';
	$sql = "CREATE TABLE IF NOT EXISTS $table (
		`id` INT(6) NOT NULL AUTO_INCREMENT,
		country VARCHAR(30),
		region VARCHAR(30),
		PRIMARY KEY(id)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
	$wpdb->query($sql);
}
