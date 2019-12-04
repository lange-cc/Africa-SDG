<section class="index-section">
<div class="row">
    <div class="col-12">
        <div class="index-heading">
            <div class="index-heading-info">
                <h2><?=$this->Translate('The SDG Index');?></h2>
                <p><?=$this->Translate('Select a country to see its full profile.');?></p>
            </div>
            <div class="index-heading-search">
                <div class="input-container">
                    <input v-model="search_data" class="index-search-input"  v-on:keyup="searchCountries()" v-on:change="searchCountries()"  v-on:keydown="searchCountries()"
                        placeholder="<?=$this->Translate('Search country');?>">
                    <span class="fa fa-search search-icon"></span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="data-table-widget">
            <table id="index-data" class="index-data table table-striped display" style="width:100%">
                <thead>
                    <tr>
                        <th width="300px"><?=$this->Translate('Country');?></th>
                        <th><?=$this->Translate('Region');?></th>
                        <th class="text-center"><?=$this->Translate('Rank');?>({{year}})</th>
                        <th class="text-center"><?=$this->Translate('Score');?> ({{year}})</th>
                        <th v-if="nextyeardata == true" class="text-center"><?=$this->Translate('Rank');?>
                            ({{nextyear}})</th>
                        <th v-if="nextyeardata == true" class="text-center"><?=$this->Translate('Score');?>
                            ({{nextyear}})</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(country,index) in countries">
                        <td v-on:click="getProfile(country.code)" class="index-country-name"><img
                                :src="'<?=URL?>images/flags/'+country.code+'.png'" width="50"> {{country.country}}</td>
                        <td>{{country.region}}</td>
                        <td class="text-center">{{country.rank}}</td>
                        <td class="text-center">{{country.index_score}}</td>
                        <td v-if="nextyeardata == true" class="text-center">{{country.nextYearRank}}</td>
                        <td v-if="nextyeardata == true" class="text-center">{{country.nextYearIndex_score}}</td>
                    </tr>
                    <tr v-for="(country,index) in emptydata">
                        <td v-on:click="getProfile(country.code)" class="index-country-name"><img
                                :src="'<?=URL?>images/flags/'+country.code+'.png'" width="50"> {{country.country}}</td>
                        <td>{{country.region}}</td>
                        <td class="text-center"><span>{{country.rank}}</span></td>
                        <td class="text-center"><span>{{country.index_score}}</span></td>
                        <td v-if="nextyeardata == true" class="text-center"><span>{{country.nextYearRank}}</span></td>
                        <td v-if="nextyeardata == true" class="text-center"><span>{{country.nextYearIndex_score}}</span>
                        </td>
                    </tr>
                </tbody>

            </table>



        </div>
    </div>
</div>
</section>

<!-- ========== country profile pop-up ========== -->
<?php include 'views/commonpage/country_profile.php'?>
<!-- ========== country profile pop-up ========== -->