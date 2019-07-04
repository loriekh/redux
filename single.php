<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package redux
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php while(have_posts()) :
				the_post()
			 ?>
			<section id="mu-course-content">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">
              <div class="col-md-9">
                <!-- start course content container -->
                <div class="mu-course-container mu-blog-single">
                  <div class="row">
                    <div class="col-md-12">
                      <article class="mu-blog-single-item">
                        <figure class="mu-blog-single-img">
                          <?php the_post_thumbnail() ?>
                          <figcaption class="mu-blog-caption">
                            <h3><a href="#"><?php the_title(); ?></a></h3>
                          </figcaption>                      
                        </figure>
                        <div class="mu-blog-meta">
                          <a href="#"><?php the_author() ?></a>
                          <a href="#"><?php the_date() ?></a>
                          <span><i class="fa fa-comments-o"></i><?php comments_number() ?></span>
                        </div>
                        <div class="mu-blog-description">
                         <?php the_content() ?>
                          
                        </div>
  
                      </article>
                    </div>                                   
                  </div>
                </div>
                <!-- end course content container -->
            <?php endwhile; ?>
               
                <!-- start related course item -->
                <div class="row">
                  <div class="col-md-12">
                    <div class="mu-related-item">
                      <h3>Related News</h3>
                      <div class="mu-related-item-area">
                        <div id="mu-related-item-slide">
                        	<?php $args = array(
                        		'type' => 'posts',
                        		'posts_per_page' => 3
                        	); ?>
                        	<?php $loop = new WP_Query($args) ?>
                        	<?php if($loop->have_posts()) {
                        		while($loop->have_posts()) {
                        			$loop->the_post();
                        	 ?>
                          <div class="col-md-6">
                            <article class="mu-blog-single-item">
                              <figure class="mu-blog-single-img">
                              <?php the_post_thumbnail(array(500, 211)); ?>
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
                                <a href="<?php the_permalink() ?>" class="mu-read-more-btn">Read More</a>
                              </div>
                            </article>
                          </div>
                          	<?php } } ?>
                         
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end start related course item -->
 			</div>
 			<div class="col-md-3">
 				<?php get_sidebar(); ?>
 			</div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
