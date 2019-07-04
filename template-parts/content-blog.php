<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package redux
 */

?>

<!-- Start from blog -->
  <section id="mu-from-blog">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-from-blog-area">
            <!-- start title -->
            <div class="mu-title">
              <h2>From Blog</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum vitae quae vero ut natus. Dolore!</p>
            </div>
            <!-- end title -->  
            <!-- start from blog content   -->
            <div class="mu-from-blog-content">
              <div class="row">
                <?php $args = array(
                    'type' => 'posts',
                    'posts_per_page' => 3,
                ) ; ?>
                <?php $loop = new Wp_Query($args) ?>
                <?php if($loop->have_posts()):
                    while($loop->have_posts()):
                      $loop->the_post(); ?>
                <div class="col-md-4 col-sm-4">
                  <article class="mu-blog-single-item">
                    <figure class="mu-blog-single-img">
                     <?php the_post_thumbnail(''); ?>
                      <figcaption class="mu-blog-caption">
                        <h3><a href="#"><?php the_title() ?></a></h3>
                      </figcaption>                      
                    </figure>
                    <div class="mu-blog-meta">
                      <a href="#"><?php the_author() ?></a>
                      <a href="#"><?php the_date() ?></a>
                      <span><i class="fa fa-comments-o"></i><?php comments_number() ?></span>
                    </div>
                    <div class="mu-blog-description">
                      <p><?php the_excerpt(); ?></p>
                      <a class="mu-read-more-btn" href="<?php the_permalink() ?>">Read More</a>
                    </div>
                  </article>
                </div>
              <?php endwhile; ?>
            <?php endif; ?>
              </div>
            </div>     
            <!-- end from blog content   -->   
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End from blog -->