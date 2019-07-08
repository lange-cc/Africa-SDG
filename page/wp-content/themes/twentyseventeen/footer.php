<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */
$This = new HModel();
?>


</div><!-- #content -->


<div class="pre-loader">
    <img src="<?= URL ?>images/logo.png" class="spin" width="80">
    <div><?=$This->Translate('Loading please wait...');?></div>
</div>

<footer class="footer-widget">

    <div class="row">
        <div class="col-12">
            <img class="sdg-bottom-banner" src="<?php echo URL ?>images/banner.png"
                 style="width: 100%;position: relative;top: -9px;">
        </div>
    </div>


    <div class="container">


        <div class="row">
            <div class="col-lg-6 item-right left-sdgs-logo" style="" save_image_to_download="true">
                <a href="https://sdgcafrica.org/" target="_blank"><img
                            src="<?php echo URL ?>images/SDGCA-Logo.jpg"
                            style="width: 160px"></a>
            </div>
            <div class="col-lg-6 right-sdgs-logo">
                <a href="http://unsdsn.org/" target="_blank"> <img
                            src="<?php echo URL ?>images/SDSN_logo.png"
                            style="width: 160px"></a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <hr>
            </div>
        </div>


                <div class="row footer-information">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <label class="descrimer-title bold"><?=$This->Translate('CONTACT');?></label>
                                <br>
                                <p class="footer-location-content">
                                    <?=$This->Translate('For general and media enquiries write to:');?><br>
                                    <a href="mailto:africasdgindex@sdgcafrica.org"> africasdgindex@sdgcafrica.org</a>
                                    <br><?=$This->Translate(' and ');?>and <a href="mailto:info@unsdsn.org">info@unsdsn.org</a>

                                </p>

                            </div>

                            <div class="col-lg-6">
                                <label class="descrimer-title bold">
                                    <?=$This->Translate('DISCLAIMER');?>
                                </label>
                                <div class="discraimer-content">
                                    <?=$This->Translate('The views expressed in this website do not reflect the views of any organization, agency or
                        program of the United Nations. It has been prepared by a team of independent experts of the
                        Sustainable Development Goals Center for Africa and the Sustainable Development Solutions
                        Network Secretariat. <br> <br>
                        This website is best viewed with Mozilla Firefox, Safari, Opera or Chrome Browsers.');?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




        <div class="col-12 item-center">
            <p class="disigned-content"> <?=$This->Translate('Designed and Developed by');?> <a href="https://lange.rw/" target="_blank">LANGE</a>
            </p>
        </div>


    </div>

</footer>


</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>

<script src="<?php echo URL ?>js/jquery.min.js"></script>
<script src="<?php echo URL ?>js/vue.js"></script>
<script src="<?php echo URL ?>js/axios.js"></script>
<script src="<?php echo URL ?>js/main.js"></script>
</body>
</html>
