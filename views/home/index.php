<div class="annauncement" v-if="slideText != null">
    <h5 v-html="slideText"></h5>
</div>

<!-- ========= map ============ -->

<div style="background: #fff url('<?= URL ?>images/home-bg.png') no-repeat center; background-size: cover;">
    <div class="row">
        <div class="col-lg-4">
            <div class="map-guide">
                <h1>
                    <?=$this->Translate('TRACK <br> AFRICAN <br> PROGRESS ON <br> SDGs');?>
                </h1>

                <div class="search-overlay" v-if="search" v-on:click="Switch()"></div>
                <div class="main-search-widget" id="search">
                   <input class="search-input"  v-on:keyup="SearchCountry()" v-model="searchingText" placeholder="<?=$this->Translate('Search country');?>">
                    <span class="fa fa-search home-search-icon"></span>
                    <div class="search-result-widget" v-if="search">
                        <div class="search-widget-title" v-if="loading">
                            <img src="<?=URL?>images/loading.gif">
                        </div>
                      <ul>
                          <li v-for="search in searchdata" v-on:click="getProfile(search.country_code)"
                              @mouseover="ShowOnMap(search.country_code,true)"
                              @mouseleave="ShowOnMap(search.country_code,false)">
                            <img :src="'<?=URL?>images/flags/'+search.country_code+'.png'" width="40">
                              {{search.country_name}}
                          </li>
                      </ul>
                    </div>
                </div>

                <h3>
                    <?=$this->Translate('Or click on a country to track its <br> progress');?>
                </h3>
            </div>

        </div>


        <div class="col-lg-8">
            <div class="map-preview">
                <? include('public/images/africa.svg') ?>
            </div>
            <div class="map-tooltip"></div>
            <div class="Map-Controls">
                <button class="zoom-out" title="Zoom out">-</button>
                <button class="zoom-in" title="Zoom in">+</button>
            </div>
        </div>
    </div>

    <div class="">
        <div class="row">
            <div class="col-12">
                <div class="map-n-b">
                    <?=$this->Translate('This map is for illustrative purposes only. The boundaries and names shown do not
                    imply official endorsement or acceptance.');?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- =========== map =========== -->

<!-- ========== country profile pop-up ========== -->
<?include('views/commonpage/country_profile.php')?>
<!-- ========== country profile pop-up ========== -->