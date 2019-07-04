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


  <!-- Start Slider -->
  <!-- Page breadcrumb -->
 <section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2>Blog Archive</h2>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End breadcrumb -->
 <section id="mu-course-content">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">
              <div class="col-md-9">
                <!-- start course content container -->
                <div class="mu-course-container mu-blog-archive">
                  <div class="row">
                    <?php if(have_posts()): ?>
                      <?php while(have_posts()): the_post(); ?>
                    <div class="col-md-6 col-sm-6">
                      <article class="mu-blog-single-item">
                        <figure class="mu-blog-single-img">
                          <?php the_post_thumbnail(''); ?>
                          <figcaption class="mu-blog-caption">
                            <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                          </figcaption>                      
                        </figure>
                        <div class="mu-blog-meta">
                          <a href="#"><?php the_author() ?></a>
                          <a href="#"><?php the_date() ?></a>
                          <span><i class="fa fa-comments-o"></i><?php comments_number() ?></span>
                        </div>
                        <div class="mu-blog-description">
                         <?php the_excerpt() ?>
                          <a class="mu-read-more-btn" href="<?php the_permalink() ?>">Read More</a>
                        </div>
                      </article> 
                    </div>        
                    <?php endwhile; ?>
                    <?php endif; ?>          
              
                  </div>
                </div>
                <!-- end course content container -->

              </div>
              <div class="col-md-3">
                <!-- start sidebar -->
        
                  <?php get_sidebar() ?>
         
            
                <!-- / end sidebar -->
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

 
  
  </body>

<?php

get_footer();
