<div class="country-profile-modal pop-up">
    <div class="ribbon">
        <a class="navbar-brand" href="<? LINK ?>">
            <img src="<?= URL ?>images/logo.png" class="logo spin ">
            <span class="site-name"><?=$this->Translate('Africa SDG Index and Dashboards');?></span>
        </a>
        <!--        <button class="btn-close" data-close=".overlay,.pop-up">&times;</button>-->
    </div>

    <div class="modal-body-widget">

        <div class="row">
            <div class="col-lg-5">
                <div class="country-card-widget">
                    <div class="country-info">
                        <img :src="'<?= URL ?>images/flags/'+country_code+'.png'" alt="Flag" class="flag-img">
                        <h3 class="country-name" v-html="country_name"><?=$this->Translate('names');?></h3>
                        <h5 class="country-region" v-html="country_region"><?=$this->Translate('Region');?></h5>
                        <p class="country-rank">
                            <?=$this->Translate('Rank');?> : <span v-html="country_rank"></span>
                            <span v-show="country_rank != 'NA'"
                                v-html="' '+'<?=$this->Translate('out of');?>'+' '+country_number"></span>
                        </p>
                    </div>

                    <div class="country-modal-main-widget">
                        <div class="widget-title"><?=$this->Translate('OVERALL PERFORMANCE');?>

                        </div>
                        <div class="widget-content">
                            <div class="row">
                                <div class="col-6">
                                    <div class="country-progress">
                                        <label><?=$this->Translate('Index score');?></label>
                                        <div id="index-score" is="stat-circle" :percentage="country_score"></div>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="country-progress">
                                        <label><?=$this->Translate('Regional average score');?></label>
                                        <div id="average-score" is="stat-circle" :percentage="country_av_score"></div>
                                    </div>
                                </div>

                            </div>
                            <script id="stat-circle" type="x-template">
                                <svg class="stat-circle" viewBox="0 0 20 20">
                                    <circle class="bg" cx="10" cy="10" r="8"/>
                                    </circle>
                                    <circle class="progress" cx="10" cy="10" r="8" :data-percentage="percentage"/>
                                    </circle>
                                    <text x="" y="">{{ percentage }}</text>
                                </svg>
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="country-card-widget chart-section">
                    <div class="row">
                        <div class="col-12">
                            <a class="btn-download" v-if="profilePdf" download
                                :href="'<?= URL ?>Report/<?=$this->year?>/'+country_code+'.pdf'">
                                <span class="fa fa-download"></span>
                                <span><?=$this->Translate('Download Country Profile');?></span>
                            </a>

                            <button class="btn-close pull-right country-profile-close-btn"
                                data-close=".overlay,.pop-up">&times;</button>

                        </div>
                        <div class="col-12">
                            <div class="country-modal-main-widget chart-widget">
                                <div class="widget-title"><?=$this->Translate('AVERAGE PERFORMANCE BY SDG');?>

                                </div>
                                <div class="widget-content">
                                    <div class="row">
                                        <div class="col-12">
                                            <canvas id="sdg-chart" width="300" height="152"></canvas>
                                            <canvas id="sdg-chart-labels" width="300" height="132"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="country-goal-card-container">
                    <div class="country-modal-main-widget">
                        <div class="widget-title"><?=$this->Translate('SDG DASHBOARD');?>

                        </div>
                        <div class="widget-content">
                            <div class="row">
                                <div class="col-12">
                                    <div class="sdg-cards-icons" v-if="sdgdata != null">

                                        <!-- 1. No Poverty -->
                                        <div class="sdg-goal-card" :style="{'background-color': sdgdata[0].color}"
                                            v-on:click="getIndicator('sdg1',country_code)">
                                            <div class="header">
                                                <div class="number">
                                                    1
                                                </div>
                                                <div class="name"><?=$this->Translate('No <br> Poverty');?>

                                                </div>
                                            </div>
                                            <div class="body">
                                                <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-1.png"
                                                    class="image-ht-110" alt="">
                                            </div>
                                        </div>
                                        <!-- 2. Zero Hunger -->
                                        <div class="sdg-goal-card" :style="{'background-color': sdgdata[1].color}"
                                            v-on:click="getIndicator('sdg2',country_code)">
                                            <div class="header">
                                                <div class="number">
                                                    2
                                                </div>
                                                <div class="name"><?=$this->Translate('Zero <br> Hunger');?>

                                                </div>
                                            </div>
                                            <div class="body">
                                                <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-2.png"
                                                    class="image-ht-70" alt="">
                                            </div>
                                        </div>
                                        <!-- 3. Good Health And Well Being -->
                                        <div class="sdg-goal-card" :style="{'background-color': sdgdata[2].color}"
                                            v-on:click="getIndicator('sdg3',country_code)">
                                            <div class="header">
                                                <div class="number">
                                                    3
                                                </div>
                                                <div class="name">
                                                    <?=$this->Translate('Good Health <br> And Well Being');?>

                                                </div>
                                            </div>
                                            <div class="body">
                                                <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-3.png"
                                                    class="image-ht-80" alt="">
                                            </div>
                                        </div>
                                        <!-- 4. Quality Education -->
                                        <div class="sdg-goal-card" :style="{'background-color': sdgdata[3].color}"
                                            v-on:click="getIndicator('sdg4',country_code)">
                                            <div class="header">
                                                <div class="number">
                                                    4
                                                </div>
                                                <div class="name"><?=$this->Translate('Quality <br> Education');?>

                                                </div>
                                            </div>
                                            <div class="body">
                                                <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-4.png"
                                                    class="image-ht-70" alt="">
                                            </div>
                                        </div>
                                        <!-- 5. Gender Equality -->
                                        <div class="sdg-goal-card" :style="{'background-color': sdgdata[4].color}"
                                            v-on:click="getIndicator('sdg5',country_code)">
                                            <div class="header">
                                                <div class="number">
                                                    5
                                                </div>
                                                <div class="name">
                                                    <?=$this->Translate('Gender <br> Equality');?>
                                                </div>
                                            </div>
                                            <div class="body">
                                                <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-5.png"
                                                    class="image-ht-70" alt="">
                                            </div>
                                        </div>
                                        <!-- 6. Clean Water and Sanitation -->
                                        <div class="sdg-goal-card" :style="{'background-color': sdgdata[5].color}"
                                            v-on:click="getIndicator('sdg6',country_code)">
                                            <div class="header">
                                                <div class="number">
                                                    6
                                                </div>
                                                <div class="name">
                                                    <?=$this->Translate('Clean Water <br> and Sanitation');?>

                                                </div>
                                            </div>
                                            <div class="body">
                                                <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-6.png"
                                                    style="height: 75px;" alt="">
                                            </div>
                                        </div>

                                        <!-- 7. Affordable and clean Energy -->
                                        <div class="sdg-goal-card" :style="{'background-color': sdgdata[6].color}"
                                            v-on:click="getIndicator('sdg7',country_code)">
                                            <div class="header">
                                                <div class="number">
                                                    7
                                                </div>
                                                <div class="name">
                                                    <?=$this->Translate('Affordable and <br> clean Energy');?>

                                                </div>
                                            </div>
                                            <div class="body">
                                                <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-7.png"
                                                    class="image-ht-70" style="height: 65px;" alt="">
                                            </div>
                                        </div>

                                        <!-- 8. Decent Work and Economic Growth -->
                                        <div class="sdg-goal-card" :style="{'background-color': sdgdata[7].color}"
                                            v-on:click="getIndicator('sdg8',country_code)">
                                            <div class="header">
                                                <div class="number">
                                                    8
                                                </div>
                                                <div class="name">
                                                    <?=$this->Translate('Decent Work and <br> Economic Growth');?>

                                                </div>
                                            </div>
                                            <div class="body">
                                                <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-8.png"
                                                    style="height: 58px;margin-top: 5px;" alt="">
                                            </div>
                                        </div>
                                        <!-- 9. Industry , Innovation and Infrastructure -->
                                        <div class="sdg-goal-card" :style="{'background-color': sdgdata[8].color}"
                                            v-on:click="getIndicator('sdg9',country_code)">
                                            <div class="header">
                                                <div class="number">
                                                    9
                                                </div>
                                                <div class="name">
                                                    <?=$this->Translate('Industry, Innovation <br> and Infrastructure');?>

                                                </div>
                                            </div>
                                            <div class="body">
                                                <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-9.png"
                                                    class="image-ht-70" alt="">
                                            </div>
                                        </div>
                                        <!-- 10. Reduced Inequalities -->
                                        <div class="sdg-goal-card" :style="{'background-color': sdgdata[9].color}"
                                            v-on:click="getIndicator('sdg10',country_code)">
                                            <div class="header">
                                                <div class="number">
                                                    10
                                                </div>
                                                <div class="name"><?=$this->Translate('Reduced <br> Inequalities');?>

                                                </div>
                                            </div>
                                            <div class="body">
                                                <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-10.png"
                                                    style="height: 105px;margin-top: -15px;" class="image-ht-110"
                                                    style="margin-top: -15px;" alt="">
                                            </div>
                                        </div>
                                        <!-- 11. Sustainable cities and Communities -->
                                        <div class="sdg-goal-card" :style="{'background-color': sdgdata[10].color}"
                                            v-on:click="getIndicator('sdg11',country_code)">
                                            <div class="header">
                                                <div class="number">
                                                    11
                                                </div>
                                                <div class="name">
                                                    <?=$this->Translate('Sustainable cities <br> and Communities');?>

                                                </div>
                                            </div>
                                            <div class="body">
                                                <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-11.png"
                                                    style="height: 75px;" class="image-ht-70" alt="">
                                            </div>
                                        </div>

                                        <!-- 12. Responsible consumption and Production -->
                                        <div class="sdg-goal-card" :style="{'background-color': sdgdata[11].color}"
                                            v-on:click="getIndicator('sdg12',country_code)">
                                            <div class="header">
                                                <div class="number">
                                                    12
                                                </div>
                                                <div class="name">
                                                    <?=$this->Translate('Responsible <br> consumption <br> and Production');?>

                                                </div>
                                            </div>
                                            <div class="body">
                                                <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-12.png"
                                                    class="image-ht-70" alt="">
                                            </div>
                                        </div>

                                        <!-- 13. Climate Action -->
                                        <div class="sdg-goal-card" :style="{'background-color': sdgdata[12].color}"
                                            v-on:click="getIndicator('sdg13',country_code)">
                                            <div class="header">
                                                <div class="number">
                                                    13
                                                </div>
                                                <div class="name"><?=$this->Translate('Climate <br> Action');?>

                                                </div>
                                            </div>
                                            <div class="body">
                                                <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-13.png"
                                                    class="image-ht-110 sdg_icon_13" alt="">
                                            </div>
                                        </div>

                                        <!-- 14. Life Below Water -->
                                        <div class="sdg-goal-card" :style="{'background-color': sdgdata[13].color}"
                                            v-on:click="getIndicator('sdg14',country_code)">
                                            <div class="header">
                                                <div class="number">
                                                    14
                                                </div>
                                                <div class="name"><?=$this->Translate('Life <br> Below Water');?>

                                                </div>
                                            </div>
                                            <div class="body">
                                                <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-14.png"
                                                    class="image-ht-70" alt="">
                                            </div>
                                        </div>

                                        <!-- 15. Life On Land -->
                                        <div class="sdg-goal-card" :style="{'background-color': sdgdata[14].color}"
                                            v-on:click="getIndicator('sdg15',country_code)">
                                            <div class="header">
                                                <div class="number">
                                                    15
                                                </div>
                                                <div class="name"><?=$this->Translate('Life <br> On Land');?>

                                                </div>
                                            </div>
                                            <div class="body">
                                                <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-15.png"
                                                    style="margin-top: 5px;" class="image-ht-60" alt="">
                                            </div>
                                        </div>

                                        <!-- 16. Peace, Justice and Strong Institutions -->
                                        <div class="sdg-goal-card" :style="{'background-color': sdgdata[15].color}"
                                            v-on:click="getIndicator('sdg16',country_code)">
                                            <div class="header">
                                                <div class="number">
                                                    16
                                                </div>
                                                <div class="name">
                                                    <?=$this->Translate('Peace, Justice <br> and Strong <br> Institutions');?>

                                                </div>
                                            </div>
                                            <div class="body">
                                                <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-16.png"
                                                    class="image-ht-70" style="margin-top: -5px;" alt="">
                                            </div>
                                        </div>
                                        <!-- 17. Partnership for The Goals -->
                                        <div class="sdg-goal-card" :style="{'background-color': sdgdata[16].color}"
                                            v-on:click="getIndicator('sdg17',country_code)">
                                            <div class="header">
                                                <div class="number">
                                                    17
                                                </div>
                                                <div class="name">
                                                    <?=$this->Translate('Partnership for <br> The Goals');?>

                                                </div>
                                            </div>
                                            <div class="body">
                                                <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-17.png"
                                                    class="image-ht-70" alt="">
                                            </div>
                                        </div>

                                        <!-- 18. Sustainable Development Goals -->
                                        <div class="sdg-goal-card" style="background:#fff;padding: 10px;">
                                            <div class="body">
                                                <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-18.png"
                                                    class="image-ht-80" alt="">
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="country-goal-card-container">
                    <div class="country-modal-main-widget">
                        <div class="widget-title">
                            <?=$this->Translate('SDG TRENDS');?>
                        </div>
                        <div class="widget-content">
                            <div class="row">
                                <div class="col-12">
                                    <div class="sdg-cards-icons" v-if="sdgtrenddata != null">

                                        <div class="sdg-arrow-box" v-for="(trend,index) in sdgtrenddata"
                                            v-on:click="getTrendsIndicator('sdg'+(index+1),country_code)">
                                            <div class="upper-part">
                                                <div class="d-flex flex-row">
                                                    <div class="sdg-score">
                                                        {{index+1}}
                                                    </div>
                                                    <div class="sdg-name" v-if="1 == index+1">
                                                        <?=$this->Translate('No <br> Poverty');?>

                                                    </div>
                                                    <div class="sdg-name" v-if="2 == index+1">
                                                        <?=$this->Translate('Zero <br> Hunger');?>
                                                    </div>
                                                    <div class="sdg-name" v-if="3 == index+1">
                                                        <?=$this->Translate('Good Health <br> And Well Being');?>
                                                    </div>
                                                    <div class="sdg-name" v-if="4 == index+1">
                                                        <?=$this->Translate('Quality <br> Education');?>

                                                    </div>
                                                    <div class="sdg-name" v-if="5 == index+1">
                                                        <?=$this->Translate('Gender <br> Equality');?>

                                                    </div>
                                                    <div class="sdg-name" v-if="6 == index+1">
                                                        <?=$this->Translate('Clean Water <br> and Sanitation');?>

                                                    </div>
                                                    <div class="sdg-name" v-if="7 == index+1">
                                                        <?=$this->Translate('Affordable and <br> clean Energy');?>

                                                    </div>
                                                    <div class="sdg-name" v-if="8 == index+1">
                                                        <?=$this->Translate('Decent Work and <br> Economic Growth');?>

                                                    </div>
                                                    <div class="sdg-name" v-if="9 == index+1">
                                                        <?=$this->Translate('Industry, Innovation <br> and Infrastructure');?>

                                                    </div>
                                                    <div class="sdg-name" v-if="10 == index+1">
                                                        <?=$this->Translate('Reduced <br> Inequalities');?>

                                                    </div>
                                                    <div class="sdg-name" v-if="11 == index+1">
                                                        <?=$this->Translate('Sustainable cities <br> and Communities');?>

                                                    </div>
                                                    <div class="sdg-name" v-if="12 == index+1">
                                                        <?=$this->Translate('Responsible <br> consumption <br> and Production');?>

                                                    </div>
                                                    <div class="sdg-name" v-if="13 == index+1">
                                                        <?=$this->Translate('Climate <br> Action');?>

                                                    </div>
                                                    <div class="sdg-name" v-if="14 == index+1">
                                                        <?=$this->Translate('Climate <br> Action');?>

                                                    </div>
                                                    <div class="sdg-name" v-if="15 == index+1">
                                                        <?=$this->Translate('Life <br> Below Water');?>

                                                    </div>
                                                    <div class="sdg-name" v-if="16 == index+1">
                                                        <?=$this->Translate('Peace, Justice <br> and Strong <br> Institutions');?>

                                                    </div>
                                                    <div class="sdg-name" v-if="17 == index+1">
                                                        <?=$this->Translate('Peace, Justice <br> and Strong <br> Institutions');?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sdg-arrow">
                                                <i v-if="trend.value == 5"
                                                    class="fa fa-long-arrow-right maintaining"></i>
                                                <i v-if="trend.value == 2" class="fa fa-long-arrow-right flat"></i>
                                                <i v-if="trend.value == 3" class="fa fa-long-arrow-right rotate-45"></i>
                                                <i v-if="trend.value == 1"
                                                    class="fa fa-long-arrow-right rotate-270"></i>
                                                <i v-if="trend.value == 4" class="fa fa-long-arrow-right rotate-90"></i>
                                            </div>

                                            <div v-if="trend.value == ''" class="sdg-arrow d-flex flex-row"
                                                style="margin-top: 2px;">
                                                <i class="fa fa-circle"></i>
                                                <span style="display: block; width:2px;"></span>
                                                <i class="fa fa-circle"></i>
                                            </div>

                                        </div>

                                        <!-- 18. Sustainable Development Goals -->
                                        <div class="sdg-goal-card sdg-arrow-box" style="background:#fff;padding: 10px;">
                                            <div class="body">
                                                <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-18.png"
                                                    class="image-ht-80" alt="">
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="modal-space"></div>
    </div>

    <!--    ===============  legend  ============= -->
    <a class="profile-legend-widget" href="javascript:void(0)" v-on:mouseover="showLegend(true)"
        v-on:mouseleave="showLegend(false)" v-if="legend">
        <span class="legend-logo-img"><?=$this->Translate('Legend');?></span>
        <span class=" legend-fa-icon fa fa-caret-left" v-if="profileLegend"></span>
    </a>

    <div class="legend-window fadeInRight" v-if="profileLegend">

        <div class="row">
            <div class="row">
                <div class="col-12">
                    <div class="legend-rating bg-white shadow-sm text-left p-3 h-100">
                        <h6><?=$this->Translate('Rating');?></h6>

                        <div class="legend-item">
                            <div class="legend-color"><span class="badge badge-pill bg-green">&nbsp;</span></div>
                            <div class="legend-name text-muted"><?=$this->Translate('SDG achieved');?></div>
                        </div>

                        <div class="legend-item">
                            <div class="legend-color"><span class="badge badge-pill bg-yellow">&nbsp;</span></div>
                            <div class="legend-name text-muted"><?=$this->Translate('Challenges remain');?></div>
                        </div>

                        <div class="legend-item">
                            <div class="legend-color"><span class="badge badge-pill bg-orange">&nbsp;</span></div>
                            <div class="legend-name text-muted"><?=$this->Translate('Significant challenges remain');?>
                            </div>
                        </div>
                        <div class="legend-item">
                            <div class="legend-color"><span class="badge badge-pill bg-red">&nbsp;</span></div>
                            <div class="legend-name text-muted"><?=$this->Translate('Major challenges remain');?></div>
                        </div>
                        <div class="legend-item">
                            <div class="legend-color"><span class="badge badge-pill bg-gray">&nbsp;</span></div>
                            <div class="legend-name text-muted"><?=$this->Translate('[information unavailable]');?>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="row">
            <div class="row">
                <div class="col-12">
                    <div class="legend-rating legend-trend bg-white shadow-sm text-left p-3 h-100">
                        <h6><?=$this->Translate('Trend');?></h6>
                        <div class="legend-item">
                            <div class="legend-color trend-5"><span
                                    class="fa fa-long-arrow-right trendsIndicProfile-icon" style="color:#61ac56"></span>
                            </div>
                            <div class="legend-name text-muted"><?=$this->Translate('Trend');?></div>
                        </div>

                        <div class="legend-item">
                            <div class="legend-color trend-4"><span class="fa fa-long-arrow-up trendsIndicProfile-icon"
                                    style="color:#61ac56"></span></div>
                            <div class="legend-name text-muted">
                                <?=$this->Translate('On track to achieve goal by 2030');?></div>
                        </div>

                        <div class="legend-item">
                            <div class="legend-color trend-3"><span
                                    class="fa fa-long-arrow-right trendsIndicProfile-icon icon-rotate"
                                    style="color:#f0ca47;z-index: 0 !important;"></span></div>
                            <div class="legend-name text-muted">
                                <?=$this->Translate('Score moderately increasing, insufficient to attain goal');?>
                            </div>
                        </div>

                        <div class="legend-item">
                            <div class="legend-color trend-2"><span
                                    class="fa fa-long-arrow-right trendsIndicProfile-icon" style="color:#e5873c"></span>
                            </div>
                            <div class="legend-name text-muted">
                                <?=$this->Translate('Score stagnating or increasing at less than 50% of required');?>
                                rate
                            </div>
                        </div>

                        <div class="legend-item">
                            <div class="legend-color trend-1"><span
                                    class="fa fa-long-arrow-down trendsIndicProfile-icon" style="color:red"></span>
                            </div>
                            <div class="legend-name text-muted"><?=$this->Translate('Score decreasing');?></div>
                        </div>

                        <div class="legend-item">
                            <div class="legend-color">
                                <span class="ubsnce-indic" style="position: relative;top: 0px;left: 10px;">
                                    <span class="fa fa-circle trendsIndicProfile-icon"
                                        style="color:#939598;font-size: 8px;margin-right: -23px"></span>
                                    <span class="fa fa-circle trendsIndicProfile-icon"
                                        style="color:#939598;font-size: 8px"></span>
                                </span>
                            </div>
                            <div class="legend-name text-muted"><?=$this->Translate('Trend information unavailable');?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--    ===============  legend  ============= -->

</div>








<!-- ================ indicator pop-up ========== -->
<?php include('views/commonpage/indicator.php')?>
<!-- ================ indicator pop-up ========== -->