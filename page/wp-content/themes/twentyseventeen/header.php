<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
include( dirname( __FILE__ ) . '/hcmc_lib.php' );
$This = new HModel();
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/x-icon" href="<?php echo URL?>images/favicon.ico">

<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<input id="js-file-location" type="hidden" value="<?php echo URL; ?>">
<input id="js-site-api" type="hidden" value="<?php echo API; ?>">
<input id="js-site-location" type="hidden" value="<?php echo LINK; ?>">


<!--Social media link -->
<div class="social-medial">
    <div class="fb-share-button" data-href="http://africasdgindex.org/" data-layout="button" data-mobile-iframe="true"
         data-size="small">
        <a class="fb-xfbml-parse-ignore"
           href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fafricasdgindex.org%2F&amp;src=sdkpreparse"
           target="_blank">
            <img src="<?= URL ?>images/facebook.png" style="margin-bottom: 5px;width: 21px;border-radius: 50%;">
        </a>
    </div>
    <a class="twitter-share-button"
       href="https://twitter.com/intent/tweet?text=Examine the challenges facing African nations in achieving the SDGs with the AfricaSDGIndex and Dashboards. Let's start monitoring progress! http://africasdgindex.org"
       target="_blank">
        <img src="<?= URL ?>images/twitter.png" style="margin-bottom: 5px;width: 21px;border-radius: 50%;">
    </a>
</div>

 <div class="overlay" style="display: none"></div>

  <div class="phone-menu-widget" style="display: none">

  		<?php

        $args = array(
							'theme_location' => LANG,
							'depth'          => 2,
							'container'      => false,
							'menu_class'     => 'nav navbar-nav',
							'walker'         => new Bootstrap_Walker_Nav_Menu()
							);
						if (has_nav_menu($lang)) {
							wp_nav_menu($args);
						}


						?>
					
				
  	

  </div>



<div id="page" class="site">
	<header id="masthead" class="site-header" role="banner">
		<?php //get_template_part( 'template-parts/header/header', 'image' ); ?>

		
	
		<nav role="navigation" id="navbar-main" class="navbar-fixed-top">
			<div class="navbar navbar navbar-expand-lg navbar-light  main-manu">
				
					<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
					
			<button  class="nav-togger-btn navbar-toggler navbar-toggler-right float-right" type="button" data-toggle="collapse" data-target="#navb">
                  <span class="navbar-toggler-icon"></span>
             </button>

						<a class="navbar-brand float-left" href="javascript:void(0)">
                        <img src="<?php echo URL?>images/logo.png" class="logo spin">
                        <span class="brand-name bold" style="font-size: 14px !important;"><?=$This->Translate('Africa SDG Index and Dashboards');?></span>
                         </a>
						<?php //the_custom_logo(); ?>
					

					<div class="navbar-collapse collapse navbar-responsive-collapse main-navigation">

						 <ul class="navbar-nav mr-auto">
                 
                  </ul>
        
						<?php

                        $args = array(
                            'theme_location' => LANG,
                            'depth'      => 2,
                            'container'  => false,
                            'menu_class'     => 'nav navbar-nav',
                            'walker'     => new Bootstrap_Walker_Nav_Menu()
                        );
                        if (has_nav_menu(LANG)) {
                            wp_nav_menu($args);
                        }

						?>

                        <ul class="language-list">
                            <li><a href="#en" v-on:click="selectLang('en')" class="lang-btn" data-lang="en">EN</a></li>
                            <li><a href="#fr" v-on:click="selectLang('fr')" class="lang-btn" data-lang="fr">FR</a></li>
                        </ul>

					</div>
				

				<img src="<?php echo URL?>images/banner.png" style="position: absolute;bottom: 0px;width: 100%;z-index: 98;left: 0;right: 0;" class="sdg-banner">

			</div>    
                           
</nav>
           
	</header><!-- #masthead -->



	<div class="site-content-contain">
		<div id="content" class="site-content">
