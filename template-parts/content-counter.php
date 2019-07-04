<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package redux
 */

?>

<!-- Start about us counter -->
  <section id="mu-abtus-counter" style="background-image: url(<?php the_field('counter_background_image') ?>) ">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-abtus-counter-area">
            <div class="row">
              <!-- Start counter item -->
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="mu-abtus-counter-single">
                  <span class="fa fa-book"></span>
                  <h4 class="counter"><?php the_field('counter_number'); ?></h4>
                  <p><?php the_field('counter_text'); ?></p>
                </div>
              </div>
              <!-- End counter item -->
              <!-- Start counter item -->
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="mu-abtus-counter-single">
                  <span class="fa fa-users"></span>
                  <h4 class="counter"><?php the_field('counter_number_2'); ?></h4>
                  <p><?php the_field('counter_text_2'); ?></p>
                </div>
              </div>
              <!-- End counter item -->
              <!-- Start counter item -->
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="mu-abtus-counter-single">
                  <span class="fa fa-flask"></span>
                  <h4 class="counter"><?php the_field('counter_number_3'); ?></h4>
                  <p><?php the_field('counter_text_3'); ?></p>
                </div>
              </div>
              <!-- End counter item -->
              <!-- Start counter item -->
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="mu-abtus-counter-single no-border">
                  <span class="fa fa-user-secret"></span>
                  <h4 class="counter"><?php the_field('counter_number_4'); ?></h4>
                  <p><?php the_field('counter_text_4'); ?></p>
                </div>
              </div>
              <!-- End counter item -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End about us counter -->