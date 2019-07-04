<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package redux
 */

get_header();
?>

	<head>
    

   


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body> 

<?php
global $redux_theme;
$layout = $redux_theme['opt-homepage-layout']['enabled'];
 
if ($layout): foreach ($layout as $key=>$value) {
 
    switch($key) {
 
        case 'slider': get_template_part( 'template-parts/content', 'slider' );
        break;
 
        case 'feature': get_template_part( 'template-parts/content', 'feature' );
        break;
 
        case 'blog': get_template_part( 'template-parts/content', 'blog' );
        break;
 
        case 'counter': get_template_part( 'template-parts/content', 'counter');    
        break;  

        case 'about': get_template_part( 'template-parts/content', 'about');    
        break; 
 
    }
 
}
 
endif;

  

  ?>

  


  

  
  
  </body>

<?php

get_footer();
