<?php
/*
Plugin Name: Book Management System
Description: Manage you books, chapters, and topics contents with custom post types, at one place.
Version: 1.3
Author: MdjMiah
Author URI: https://example.com/author-page  // Replace with your author page URL
Plugin URI: https://example.com/book-management-system-docs  // Replace with your plugin documentation URL
*/

// Include the files for different functionalities
require_once plugin_dir_path(__FILE__) . 'includes/post-types.php';
require_once plugin_dir_path(__FILE__) . 'includes/meta-boxes.php';
require_once plugin_dir_path(__FILE__) . 'includes/admin-dashboard.php';
require_once plugin_dir_path(__FILE__) . 'includes/columns.php';
require_once plugin_dir_path(__FILE__) . 'includes/enqueue-scripts.php';
require_once plugin_dir_path(__FILE__) . 'includes/ai-functions.php'; // Add this line
include_once plugin_dir_path(__FILE__) . 'bms-functions.php';


// Enqueue custom styles for the frontend
add_action('wp_enqueue_scripts', 'bms_enqueue_styles');

// Hook into the 'init' action to register custom post types
add_action('init', 'bms_register_custom_post_types');

// Hook into 'admin_menu' to add the menu and submenus
add_action('admin_menu', 'bms_add_admin_menu');

// Hook into 'add_meta_boxes' to add custom meta boxes
add_action('add_meta_boxes', 'bms_add_custom_meta_boxes');

// Hook into 'save_post' to save custom meta box data
add_action('save_post', 'bms_save_custom_meta_boxes');

// Enqueue scripts and styles for the admin area
add_action('admin_enqueue_scripts', 'bms_enqueue_admin_scripts');

// Hook into 'template_include' to include the custom template
add_filter('template_include', 'bms_include_custom_template');


// Add columns for Books
add_filter('manage_book_posts_columns', 'bms_add_book_columns');
add_action('manage_book_posts_custom_column', 'bms_display_book_column_data', 10, 2);

// Add columns for Chapters
add_filter('manage_chapter_posts_columns', 'bms_add_chapter_columns');
add_action('manage_chapter_posts_custom_column', 'bms_display_chapter_column_data', 10, 2);

// Add columns for Topics
add_filter('manage_topic_posts_columns', 'bms_add_topic_columns');
add_action('manage_topic_posts_custom_column', 'bms_display_topic_column_data', 10, 2);

// Add columns for Questions
add_filter('manage_question_posts_columns', 'bms_add_question_columns');
add_action('manage_question_posts_custom_column', 'bms_display_question_column_data', 10, 2);



