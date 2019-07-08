<!-- Ranking indicator -->
<div class="indicator-window" style="display: none;" v-on:click.self="closeModa()">
    <div class="ribbon">
        <a class="navbar-brand" href="<? LINK ?>">
            <img src="<?= URL ?>images/logo.png" class="logo spin ">
            <span class="site-name"><?=$this->Translate('Africa SDG Index and Dashboards');?></span>
        </a>
        <button class="btn-close" v-on:click="closeModa()">&times;</button>
    </div>

    <div class="indicator-widget" v-if="indic_data != null">
        <div class="indicator-ribbon">
            <button class="btn-close" v-on:click.self="closeModa('.indicator-window')">&times;</button>
        </div>
        <div class="indicator-country-info">
            <img :src="'<?= URL ?>images/flags/'+indic_cou_code+'.png'" width="60"> {{indic_cou_name}}
        </div>

        <div class="indicator-sdg-info">
            <span class="" v-html="indic_sdg_n" style="text-transform: uppercase"></span> <span
                    :style="{'color':indic_sdg_color}" class="fa fa-circle"></span>
        </div>

        <div class="indicator-datas-widget">
            <table class="table">
                <tr>
                    <th width="95%" v-html="indic_sdg_name"></th>
                    <th width="2.5%" class="text-center"><?=$this->Translate('Value');?></th>
                    <th width="2.5%" class="text-center"><?=$this->Translate('Rating');?></th>
                </tr>

                <tr v-for="indic in indic_data">
                    <td>
                        <div class="indicator-name" v-html="indic.name">
                        </div>
                    </td>
                    <td class="text-center" style="position: relative">
                        <div class="indicator-value" v-html="indic.value" v-if="indic.value != ''">
                        </div>
                        <div class="indicator-value"  v-if="indic.value == ''">
                            NA
                        </div>
                    </td>
                    <td class="text-center" style="position: relative">
                        <div class="indicator-rating-icon">
                            <span :style="{'color':indic.color}" class="fa fa-circle"></span>
                        </div>
                    </td>
                </tr>


            </table>
        </div>

    </div>
    <div class="modal-space"></div>
</div>


<!--Trends indicators -->
<div class="Trend-indicator-window" style="display: none;" v-on:click.self="closeModa()">
    <div class="ribbon">
        <a class="navbar-brand" href="<? LINK ?>">
            <img src="<?= URL ?>images/logo.png" class="logo spin ">
            <span class="site-name"><?=$this->Translate('Africa SDG Index and Dashboards');?></span>
        </a>
        <button class="btn-close" v-on:click="closeModa()">&times;</button>
    </div>

    <div class="indicator-widget" v-if="indic_data != null">
        <div class="indicator-ribbon">
            <button class="btn-close" v-on:click.self="closeModa('.indicator-window')">&times;</button>
        </div>
        <div class="indicator-country-info">
            <img :src="'<?= URL ?>images/flags/'+indic_cou_code+'.png'" width="60"> {{indic_cou_name}}
        </div>

        <div class="indicator-sdg-info">
            <span class="" v-html="indic_sdg_n" style="text-transform: uppercase"></span>
            <span class="sdg-trend-indic">
                <div class="indicator-trends-icon">
                                <i v-if="trend_sdg_value == 5" class="fa fa-long-arrow-right maintaining"></i>
                                <i v-if="trend_sdg_value == 2" class="fa fa-long-arrow-right flat"></i>
                                <i v-if="trend_sdg_value == 3" class="fa fa-long-arrow-right rotate-45"></i>
                                <i v-if="trend_sdg_value == 1" class="fa fa-long-arrow-right rotate-270"></i>
                                <i v-if="trend_sdg_value == 4" class="fa fa-long-arrow-right rotate-90"></i>

                            <div v-if="trend_sdg_value == ''" class="sdg-arrow d-flex flex-row" style="margin-top: 2px;">
                                <i class="fa fa-circle"></i>
                                <span style="display: block; width:2px;"></span>
                                <i class="fa fa-circle"></i>
                            </div>

                        </div>
            </span>
        </div>

        <div class="indicator-datas-widget">
            <table class="table">
                <tr>
                    <th width="95%" v-html="indic_sdg_name"></th>
                    <th width="2.5%" class="text-center"><?=$this->Translate('Value');?></th>
                    <th width="2.5%" class="text-center"><?=$this->Translate('Trend');?></th>
                </tr>

                <tr v-for="indic in indic_data">
                    <td>
                        <div class="indicator-name" v-html="indic.name">
                        </div>
                    </td>
                    <td class="text-center" style="position: relative">
                        <div class="indicator-value" v-html="indic.Realvalue" v-if="indic.Realvalue != ''">
                        </div>
                        <div class="indicator-value" v-if="indic.Realvalue == ''">
                            NA
                        </div>
                    </td>
                    <td class="text-center" style="position: relative">
                        <div class="indicator-trends-icon">

                            <i v-if="indic.value == 5" class="fa fa-long-arrow-right maintaining"></i>
                            <i v-if="indic.value == 2" class="fa fa-long-arrow-right flat"></i>
                            <i v-if="indic.value == 3" class="fa fa-long-arrow-right rotate-45"></i>
                            <i v-if="indic.value == 1" class="fa fa-long-arrow-right rotate-270"></i>
                            <i v-if="indic.value == 4" class="fa fa-long-arrow-right rotate-90"></i>

                            <div v-if="indic.value == ''" class="sdg-arrow d-flex flex-row" style="margin-top: 2px;">
                                <i class="fa fa-circle"></i>
                                <span style="display: block; width:2px;"></span>
                                <i class="fa fa-circle"></i>
                            </div>

                        </div>
                    </td>
                </tr>


            </table>
        </div>

    </div>
    <div class="modal-space"></div>
</div>