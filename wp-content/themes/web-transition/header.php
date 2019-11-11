<?php
/**
 * The template for displaying the header
 *
 */

?><!DOCTYPE html>
<!--[if IE 8]><html class="lt-ie10 lt-ie9 no-js"><![endif]-->
<!--[if IE 9]><html class="lt-ie10 no-js"><![endif]-->
<!--[if gt IE 11]><!--><html <?php language_attributes(); ?> class="lt-ie10 lt-ie9 no-js"><!--<![endif]-->
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="google-site-verification" content="0Nb0H-lTuTcFdn8cedZvVS323Io05W-T1NXzcbwIFCg" />

  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png" />

  <!--[if lte IE 8]>
  <script type="text/javascript" src="scripts/html5shiv.js"></script>
  <link rel="stylesheet" type="text/css" media="all" href="styles/ie678-patch.css" />
  <link rel="stylesheet" type="text/css" media="screen and (max-width: 800px)" href="styles/ie678-patch-resp.css" />
  <script type="text/javascript" src="scripts/respond.min.js"></script>
  <![endif]-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

  <?php wp_head(); ?>

	
<script type='text/javascript'>
	var path = '<?php echo get_template_directory_uri(); ?>/vendors/';
</script>
<script src="<?php echo get_template_directory_uri(); ?>/scripts/includes.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/scripts/scripts.min.js"></script>

	<?php
		global $post;
        if ( isset( $post ) ) {
          global $wp_query;
          $template_name = get_post_meta( $wp_query->post->ID, '_wp_page_template', true );
          if( isset($template_name) and $template_name =="page-actualites.php"){
			?>
			<script src="<?php echo get_template_directory_uri(); ?>/scripts/scripts-actus.js"></script>
			<?php
		  }
      elseif( isset($template_name) and $template_name =="page-recrutement.php"){
      ?>
      <script src="<?php echo get_template_directory_uri(); ?>/scripts/scripts-recrutement.js"></script>
      <?php
      }
		  elseif( isset($template_name) and $template_name =="page-contact.php"){
			?>
			<script src="http://cdn.muicss.com/mui-0.9.9-rc2/js/mui.min.js"></script>
			<script src="<?php echo get_template_directory_uri(); ?>/scripts/scripts-contact.js"></script>
			<?php
		  }
		  
		  
		  
		}


	?>

	
<script type='text/javascript' src='/wp-content/plugins/contact-form-7/includes/js/jquery.form.min.js?ver=3.40.0-2013.08.13'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var _wpcf7 = {"loaderUrl":"\/wp-content\/plugins\/contact-form-7\/images\/ajax-loader.gif","sending":"Sending ..."};
/* ]]> */
</script>
<script type='text/javascript' src='/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=3.5.2'></script>
</head>


<body <?php body_class(); ?>>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-64296028-1', 'auto');
  ga('send', 'pageview');

</script>

    <!-- #header -->
	<?php
		$type_de_header = get_field("type_de_header");
	?>
  <header id="header" class="top-navigation <?php echo "header-".$type_de_header; ?>">
    <div id="top-navigation-content" class="top-navigation-content">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 no-nav-mobile-gutter">

            <div class="wrap-header">
              <!--  Logo -->
              <div class="main-logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-wt-md">
                  <span class="logo"></span>
                </a>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-wt-base-line">
                  <strong>Web</strong>&nbsp;<span>Transition</span>
                </a>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-wt-base-line-sticky">
                  <strong>Web</strong>&nbsp;<span>Transition</span>
                </a>
              </div>
              <div class="second-nav">
                <div class="menu-menu-secondaire-container">
                  <ul id="menu-menu-secondaire" class="menu">
                    <li class="menu-item contact cta2 menu-item"><span><a href="<?php echo esc_url( get_permalink(get_page_by_path( 'rejoignez-nous' )) ); ?>">Recrutement</a></span></li>
                    <li class="menu-item contact cta2 small menu-item"><span><a href="<?php echo esc_url( get_permalink(get_page_by_path( 'contact' )) ); ?>">contact</a></span></li>
                  </ul>
                </div>
              </div>
            </div>


            <div class="nav-line">
              <nav class="main-nav resp-nav">
                <div class="nav-wrap">
                  <div class="main-logo hide-desktop">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-wt-md">
                      <span class="logo"></span>
                    </a>
                  </div>

				  <?php if ( has_nav_menu( 'primary' ) ) : 
						 wp_nav_menu( array(
						   'theme_location' => 'primary',
						   'container' => false,
						   /*'container_class'     => 'nav-wrap',*/
						   'walker' => new webtransition_Nav_Walker()
						   ) );
						endif; 
					?>
                  <div class="social-nav hide-desktop">
                    <ul>
                      <li>
                        <a href="<?php echo esc_url( get_permalink(get_page_by_path( 'contact' )) ); ?>"><i class="icon icon-enveloppe"></i></a>
                      </li>
                      <li>
                        <a href="https://twitter.com/webtransition" target="_blank"><i class="icon icon-twtt"></i></a>
                      </li>
                      <li>
                        <a href="https://www.facebook.com/webtransition/" target="_blank"><i class="icon icon-facebook"></i></a>
                      </li>
                      <li>
                        <a href="https://www.linkedin.com/company/web-transition" target="_blank"><i class="icon icon-linkedin"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>
            </div>

            <!-- .respNav-toggle -->
            <label class="top-navigation-respNav respNav-toggle ">
              <span class="pictoz_css hamburger top-navigation-respNav-icons">
                <span class="top-navigation-respNav-icon top"></span>
                <span class="top-navigation-respNav-icon middle"></span>
                <span class="top-navigation-respNav-icon bottom"></span>
              </span>
            </label>


          </div>
        </div>
      </div>
    </div>
  </header>
<?php $classes = get_body_class();
if (in_array('jobpost-template-default',$classes)) {

     echo "<div class='col-xs-12 maw1170'>
            <div class='main-title icon-title'>
              <i class='icon icon-recrutement'>
                <i class='icon path1'></i>
                <i class='icon path2'></i>
                <i class='icon path3'></i>
              </i>
              <h2><span>Recrutement</span></h2>
            </div>
          </div>
     <div class='t3Outer'>
      <div class='tIntro'>
        Une question ou juste pour dire bonjour, laissez nous votre message !
      </div>
      <!--INTROLINKS-->
      <div class='tItemContainer'>
        <div class='tSubHeader'>Pour accompagner son développement rapide,</div>
        <div class='tText'>Web Transition cherche sans cesse de nouveaux talents</div>
        <!--LINKS-->
      </div>
    <span class='line'></span>
  </div>";
    }else{

    } ?>