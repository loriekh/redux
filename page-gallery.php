<?php
/**

 *
 * @package redux
 */

get_header();
?>
<!-- Start gallery  -->
 <section id="mu-gallery">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-gallery-area">
          <!-- start title -->
          <div class="mu-title">
            <h2>Some Moments</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores ut laboriosam corporis doloribus, officia, accusamus illo nam tempore totam alias!</p>
          </div>
          <!-- end title -->
          <!-- start gallery content -->
          <div class="mu-gallery-content">
            <!-- Start gallery menu -->
            <div class="mu-gallery-top">              
              <ul>
                <li class="filter active" data-filter="all">All</li>
        		<?php $get_cat =  get_terms('sort');
        			foreach ($get_cat as $cat ){ ?>
					<li class="filter" data-filter=".<?php echo $cat->name; ?>"><?php echo $cat->name; ?></li>
        		<?php	} ?>
              </ul>
            </div>
            <!-- End gallery menu -->
            <div class="mu-gallery-body">
              <ul id="mixit-container" class="row">
              	<?php $args = array('post_type' => 'gallery'); 
              	 $loop = new WP_Query($args);
              	 while($loop->have_posts()) {
              		$tslugs_arr = array();
              		$loop->the_post(); ?>
              		<?php $terms = get_the_terms($loop->ID, 'sort');
              		foreach ($terms as $term) {
              			$tslugs_arr[] = $term->slug;
              		};
              		$terms_slug_str = join(" ", $tslugs_arr); ?>
              	
                <!-- start single gallery image -->
                <li class="col-md-4 col-sm-6 col-xs-12 mix <?php echo $terms_slug_str; ?>">
                  <div class="mu-single-gallery">                  
                    <div class="mu-single-gallery-item">
                      <div class="mu-single-gallery-img">
                        <?php the_post_thumbnail() ?>
                      </div>
                      <div class="mu-single-gallery-info">
                        <div class="mu-single-gallery-info-inner">
                          <h4><?php the_title() ?></h4>
                          <p><?php $terms_slug_str; ?></p>
                          <a href="<?php the_post_thumbnail_url() ?>" data-fancybox-group="gallery" class="fancybox"><span class="fa fa-eye"></span></a>
                          <a href="<?php the_permalink() ?>" class="aa-link"><span class="fa fa-link"></span></a>
                        </div>
                      </div>                  
                    </div>
                  </div>
                </li>
            <?php } ?>
              </ul>            
            </div>
          </div>
          <!-- end gallery content -->
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End gallery  -->
	

<?php

get_footer();
