<?php
 /**
 * @package LogicEmpower
 */

 defined('WP_UNINSTALL_PLUGIN') or die("Error occured");

//Clear database from custom post type

// Fitst Method 
// $tickets = get_posts( array("post_type"=> "ticket", "numberposts"=>-1 ) );

// foreach( $tickets as $ticket ):

//     wp_delete_post( $ticket->ID, false);

// endforeach;

// Second Method access the database via MySQL
global $wpdb;
$wpdb->query( "DELETE FROM `wp_posts` WHERE `post_type` = 'ticket'" );
$wpdb->query( "DELETE FROM `wp_postmeta` WHERE NOT EXISTS (SELECT 1 FROM `wp_posts` WHERE `wp_postmeta`.`post_id` = `wp_posts`.`ID`)" );
$wpdb->query( "DELETE FROM `wp_term_relationships` WHERE `object_id` NOT IN (SELECT `id` FROM `wp_posts`)" );

$wpdb->query( "DROP TABLE `le_tickets`" );