<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package redux
 */

?>

  <!-- Start Slider -->
  <section id="mu-slider">
    <!-- Start single slider item -->
    <div class="mu-slider-single">
      <div class="mu-slider-img">
        <figure>
          <img src="<?php the_field('image'); ?>" alt="img" >
        </figure>
      </div>
      <div class="mu-slider-content">
        <h4><?php the_field('welcome_text'); ?></h4>
        <span></span>
        <h2><?php the_field('text_2'); ?></h2>
        <p><?php the_field('text_3'); ?></p>
        <a href="#" class="mu-read-more-btn"><?php the_field('button_text'); ?></a>
      </div>
    </div>
    <!-- Start single slider item -->
    <!-- Start single slider item -->
    <div class="mu-slider-single">
      <div class="mu-slider-img">
        <figure>
          <img src="<?php the_field('image_2'); ?>" alt="img">
        </figure>
      </div>
      <div class="mu-slider-content">
        <h4><?php the_field('slider_text'); ?></h4>
        <span></span>
        <h2><?php the_field('slider_text_2'); ?></h2>
        <p><?php the_field('slider_text_3'); ?></p>
        <a href="#" class="mu-read-more-btn"><?php the_field('button_link_2'); ?></a>
      </div>
    </div>
    <!-- Start single slider item -->

  </section>
  <!-- End Slider -->
  <!-- Start service  -->
  <section id="mu-service">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-service-area">
            <!-- Start single service -->
            <div class="mu-service-single">
              <span class="<?php the_field('service_icon'); ?>"></span>
              <h3><?php the_field('service_title'); ?></h3>
              <p><?php the_field('service_text'); ?></p>
            </div>
            <!-- Start single service -->
            <!-- Start single service -->
            <div class="mu-service-single">
              <span class="<?php the_field('service_icon_2'); ?>"></span>
              <h3><?php the_field('service_title_2'); ?></h3>
              <p><?php the_field('service_text_2'); ?></p>
            </div>
            <!-- Start single service -->
            <!-- Start single service -->
            <div class="mu-service-single">
              <span class="<?php the_field('service_icon_3'); ?>"></span>
              <h3><?php the_field('service_title_3'); ?></h3>
              <p><?php the_field('service_text_3'); ?></p>
            </div>
            <!-- Start single service -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End service  -->
