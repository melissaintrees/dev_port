<?php
/*
*	Template Name: FrontPage
*
*/	
 get_header();?>

<?php get_template_part('section-parts/section', 'home' ); ?>		

<?php get_template_part('section-parts/section', 'features' ); ?>		

<?php get_template_part( 'section-parts/section','services' ); ?>

<?php get_template_part( 'section-parts/section','works' ); ?>		

<?php get_template_part( 'section-parts/section','testimonials' ); ?>

<?php get_template_part('section-parts/section','blogs'); ?>		

<?php get_template_part('section-parts/section','fun-facts'); ?>

<?php get_template_part('section-parts/section','team'); ?>

<?php get_template_part('section-parts/section','table'); ?>		

<?php get_template_part('section-parts/section','map'); ?>

<?php get_template_part('section-parts/section','contact'); ?>		

<?php
get_footer();
?>