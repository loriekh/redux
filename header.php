<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package redux
 */
global $redux_theme;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


  <!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>      
    </a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start header  -->
  <header id="mu-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-header-area">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-left">
                  <?php if($redux_theme['text_email']) {  ?>
                  <div class="mu-top-email">
                    <i class="fa fa-envelope"></i>
                    <span><?php echo $redux_theme['text_email'] ?></span>
                  </div>
                <?php } ?>
                 <?php if($redux_theme['text_phone']) {  ?>
                  <div class="mu-top-phone">
                    <i class="fa fa-phone"></i>
                    <span><?php echo $redux_theme['text_phone'] ?></span>
                  </div>
                <?php } ?>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-right">
                  <nav>
                    <ul class="mu-top-social-nav">
                       <?php if($redux_theme['header_facebook']) {  ?>
                          <li><a href="#"><span class="<?php echo $redux_theme['header_facebook'] ?>"></span></a></li>
                       <?php } ?>
                        <?php if($redux_theme['header_twitter']) {  ?>
                          <li><a href="#"><span class="<?php echo $redux_theme['header_twitter'] ?>"></span></a></li>
                       <?php } ?>
                        <?php if($redux_theme['header_google']) {  ?>
                          <li><a href="#"><span class="<?php echo $redux_theme['header_google'] ?>"></span></a></li>
                       <?php } ?>
                        <?php if($redux_theme['header_linkedin']) {  ?>
                          <li><a href="#"><span class="<?php echo $redux_theme['header_linkedin'] ?>"></span></a></li>
                       <?php } ?>
                        <?php if($redux_theme['header_youtube']) {  ?>
                          <li><a href="#"><span class="<?php echo $redux_theme['header_youtube'] ?>"></span></a></li>
                       <?php } ?>
                     </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End header  -->
  <!-- Start menu -->
  <section id="mu-menu">
    <nav class="navbar navbar-default" role="navigation">  
      <div class="container">
        <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO -->              
          <!-- TEXT BASED LOGO -->
          <?php if($redux_theme['switch-parent-1'] == '1') { ?>
              <a class="navbar-brand" href="index.html"><img src="<?php echo $redux_theme['opt-logo']['url'] ?>" alt="logo"></a>
          <?php } else {  ?>
            <a class="navbar-brand" href="index.html"><i class="<?php echo $redux_theme['text_icon'] ?>"></i><span><?php echo $redux_theme['text_logo'] ?></span></a>
          <?php } ?>
          <!-- IMG BASED LOGO  -->
          <!-- <a class="navbar-brand" href="index.html"><img src="assets/img/logo.png" alt="logo"></a> -->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
              <?php 
                  wp_nav_menu(array(
                    'theme_location' => 'menu-1',
                    'menu_class'     => 'nav navbar-nav navbar-right main-nav'
                  ));
              ?>
          </ul>                     
        </div><!--/.nav-collapse -->        
      </div>     
    </nav>
  </section>
  <!-- End menu -->


  <!-- Start search box -->
  <!-- <div id="mu-search">
    <div class="mu-search-area">      
      <button class="mu-search-close"><span class="fa fa-close"></span></button>
      <div class="container">
        <div class="row">
          <div class="col-md-12">            
            <form class="mu-search-form">
              <input type="search" placeholder="Type Your Keyword(s) & Hit Enter">              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <!-- End search box -->