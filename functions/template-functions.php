<?php

/**
 * @package Bootscore Child
 *
 * Template Functions
 * 
 * @version 6.0.0
 */

// Prevent sidebar container markup
function disable_sidebar_widgets( $sidebars_widgets )
{
    if (is_single())
    {
        $sidebars_widgets = false;
    }   
    return $sidebars_widgets;
}
add_filter( 'sidebars_widgets', 'disable_sidebar_widgets' );

/*
 * Page section templates
 */
function include_theme_page_sections() {
	
	//page section elements
	if(have_rows('flexible_page_sections')) : 

		while (have_rows('flexible_page_sections')): the_row();

			$layout = str_replace('_', '-', get_row_layout());
			$template_path = locate_template("page-sections/{$layout}.php");
			
			//if file exists, include it
			if ($template_path) 
				include $template_path;

		endwhile;

	endif;
	
}
add_action('the_content', 'include_theme_page_sections');