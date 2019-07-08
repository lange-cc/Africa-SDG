<!-- ========== country profile pop-up ========== -->
<? include('views/commonpage/loading.php') ?>
<!-- ========== country profile pop-up ========== -->

<?php
  if(isset($this->isYear)) {
    if($this->isYear) {
?>
<span  class="year-widget" v-on:mouseover ="year_window = true" v-on:mouseleave ="year_window = false"><span class="legend-logo-img">Year</span>
  <div class="year-window" v-if="year_window">
      <ul>
          <li v-for="data in years"><a href="javascript:void(0)" v-on:click="SelectYear(data.year)">{{data.year}}</a></li>
      </ul>
  </div>
</span>
<?php
}
}
?>

<!-- start of footer -->
<footer>
    <div class="sdgLine-2">
        <img src="<?= URL ?>images/sdg-line.png" class="sdg-line">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="footer-logo">
                    <a href="https://sdgcafrica.org/">
                        <img src="<?= URL ?>images/SDGCA-Logo.jpg" class="float-right"/>
                    </a>
                </div>
            </div>
            <div class="col-6">
                <div class="footer-logo">
                    <a href="http://unsdsn.org/">
                        <img src="<?= URL ?>images/SDSN_logo.png"/>
                    </a>
                </div>
            </div>
            <hr class="col-12">
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="footer-content">
                    <label><?=$this->Translate('CONTACT');?></label>
                    <div class="content">
                        <?=$this->Translate('For general and media enquiries write to:');?><br>
                        <a href="mailto:africasdgindex@sdgcafrica.org">africasdgindex@sdgcafrica.org</a><br>
                        & <a href="mailto:info@unsdsn.org">info@unsdsn.org</a><br>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer-content">
                    <label><?=$this->Translate('DISCLAIMER');?></label>
                    <div class="content"><?=$this->Translate('The views expressed in this website do not reflect the views of any organization, agency or
                        program of the United Nations. It has been prepared by a team of independent experts of the
                        Sustainable Development Goals Center for Africa and the Sustainable Development Solutions
                        Network Secretariat. <br> <br>
                        This website is best viewed with Mozilla Firefox, Safari, Opera or Chrome Browsers.');?>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="Developer-content">
                    <?=$this->Translate('Designed and Developed by');?> <a href="http://lange.rw">LANGE</a>
                </div>
            </div>
        </div>

    </div>
</footer>
<!-- end of footer -->



</body>
<!-- Any plugin from public/plugin directory -->
<script src="<?php echo URL; ?>plugin/jquery.js"></script>
<script src="<?php echo URL; ?>plugin/circle-progress.js"></script>
<script src="<?php echo URL; ?>plugin/chart.js"></script>
<script src="<?php echo URL; ?>plugin/bootstrap.js"></script>
<script src="<?php echo URL; ?>plugin/popper.js"></script>
<script src="<?php echo URL; ?>plugin/vue.js"></script>
<script src="<?php echo URL; ?>plugin/axios.js"></script>
<script src="<?php echo URL; ?>plugin/TweenMax.min.js"></script>
<script src="<?php echo URL; ?>plugin/main.js"></script>


<!-- Ant Lib inserted from controller -->
<?php
if (isset($this->js)) {
    foreach ($this->js as $js) {
        ?>
        <script type="text/javascript" src="<?php echo URL . $js; ?>"></script>
    <?php }
} ?>

</html>
