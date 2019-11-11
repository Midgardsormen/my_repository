<?php

/*
Template Name: Page HP
*/
get_header(); ?>


  <!-- .hp -->
  <div id="content" class=" page-content hp header-transparent-no-padding">
    <div class="entete">
      <div class="container" style="padding-bottom: 20px;">
        <div class="row">
          <div class="col-xs-10 col-xs-push-1 col-md-10 col-md-push-1 col-lg-8 col-lg-push-2">
            <div class="wrap-intro">
              <h1><?php the_field('titre');?></h1>
              <div class="wrap-pictos">
                <div><i class="icon icon-HP2"></i> E-commerce</div>
                <div><i class="icon icon-HP1"></i> M-commerce</div>
                <div><i class="icon icon-HP3"></i> In-Store</div>
              </div>
              <?php the_field('introduction');?>
            </div>
            <div class="wrap-engagements" style="padding-bottom:15px;">
              <?php the_field('engagements');?>
            </div>
          </div>
        </div>
      </div>


    </div>
    
    <div class="eventListHp">
      <h3>À venir</h3>
      <?php echo do_shortcode('[events_list limit="10"]
        <div class="eventItem">
        <span class="dateEvent">#_EVENTDATES</span>
        <p><em>#_EVENTTIMES</em> <strong>  #_EVENTNAME</strong></p>
        #_EVENTEXCERPT </div>
        [/events_list]') ?>
          
    </div>
    <section class="container bg-wt posts" style="margin-top: 0;margin-bottom: 0;">
      <s class="a"></s><s class="b transp"></s>
      

    </section>

    
  </div>
  


	

<?php get_footer(); ?>