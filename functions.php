<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Smaczegopl
 * @since 1.0
 */


$function_path = get_template_directory() . '/inc/';

require $function_path . 'functions-enqueue.php';
require $function_path . 'functions-base.php';
require $function_path . 'functions-cpt.php';
require $function_path . 'functions-navs.php';
require $function_path . 'functions-mylib.php';
require $function_path . 'functions-acf.php';
require $function_path . 'functions-cleanup.php';
require $function_path . 'functions-breadcrumbs.php';
require $function_path . 'functions-restapi.php';
require $function_path . 'functions-sidebar.php';
require $function_path . 'functions-widgets.php';












