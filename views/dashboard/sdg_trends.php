<div id="sdg-dashboard">


    <div class="continent-parts-tabs">
        <ul>
            <li :class="{active: (activeTab=='africa')}" @click="activeTab='africa'"><?=$this->Translate('Africa');?></li>
            <li :class="{active: (activeTab=='north')}" @click="activeTab='north'"><?=$this->Translate('North Africa');?></li>
            <li :class="{active: (activeTab=='east')}" @click="activeTab='east'"><?=$this->Translate('East Africa');?></li>
            <li :class="{active: (activeTab=='central')}" @click="activeTab='central'"><?=$this->Translate('Central Africa');?></li>
            <li :class="{active: (activeTab=='south')}" @click="activeTab='south'"><?=$this->Translate('Southern Africa');?></li>
            <li :class="{active: (activeTab=='west')}" @click="activeTab='west'"><?=$this->Translate('West Africa');?></li>
        </ul>
    </div>
    <div class="continent-parts-tabs-content">
        <div class="africa-content" v-show="activeTab=='africa'">
            <div class="countries-table">
                <table>
                    <thead class="goals-names">
                    <tr class="names">
                        <th></th>
                        <th class="color-red"><?=$this->Translate('NO <br> POVERTY');?></th>
                        <th class="color-yellow"><?=$this->Translate('ZERO <br> HUNGER');?></th>
                        <th class="color-green"><?=$this->Translate('GOOD HEALTH <br> AND <br> WELL BEING');?></th>
                        <th class="color-red-2"><?=$this->Translate('QUALITY EDUCATION');?></th>
                        <th class="color-red-3"><?=$this->Translate('GENDER EQUALITY');?></th>
                        <th class="color-blue"><?=$this->Translate('CLEAN <br> WATER <br> AND <br> SANITATION');?></th>
                        <th class="color-yellow"><?=$this->Translate('AFFORDABLE <br> AND <br> CLEAN <br> ENERGY');?></th>
                        <th class="color-red-4"><?=$this->Translate('DECENT <br> WORK <br> AND <br> ECONOMIC <br> GROWTH');?></th>
                        <th class="color-orange-1"><?=$this->Translate('INDUSTRY, INNOVATION AND INFRASTRUCTURE');?></th>
                        <th class="color-red-5"><?=$this->Translate('REDUCED INEQUALITIES');?></th>
                        <th class="color-yellow-1"><?=$this->Translate('SUSTAINABLE <br> CITIES <br> AND <br> COMMUNITIES');?></th>
                        <th class="color-yellow-2"><?=$this->Translate('RESPONSIBLE <br> CONSUMPTION <br> AND <br> PRODUCTION');?></th>
                        <th class="color-green-1"><?=$this->Translate('CLIMATE <br> ACTION');?></th>
                        <th class="color-blue-1"><?=$this->Translate('LIFE <br> BELOW <br> WATER');?></th>
                        <th class="color-green-2"><?=$this->Translate('LIFE <br> ON <br> LAND');?></th>
                        <th class="color-blue-2"><?=$this->Translate('PEACE, <br> JUSTICE <br> AND <br> STRONG <br> INSTITUTIONS');?></th>
                        <th class="color-blue-3"><?=$this->Translate('PARTNERSHIP <br> FOR <br> THE <br> GOALS');?></th>
                    </tr>
                    <tr class="counters">
                        <th></th>
                        <th class="color-red">1</th>
                        <th class="color-yellow">2</th>
                        <th class="color-green">3</th>
                        <th class="color-red-2">4</th>
                        <th class="color-red-3">5</th>
                        <th class="color-blue">6</th>
                        <th class="color-yellow">7</th>
                        <th class="color-red-4">8</th>
                        <th class="color-orange-1">9</th>
                        <th class="color-red-5">10</th>
                        <th class="color-yellow-1">11</th>
                        <th class="color-yellow-2">12</th>
                        <th class="color-green-1">13</th>
                        <th class="color-blue-1">14</th>
                        <th class="color-green-2">15</th>
                        <th class="color-blue-2">16</th>
                        <th class="color-blue-3">17</th>
                    </tr>
                    </thead>
                    <tbody class="trends-body">
                    <tr v-for="(country,index) in countries" :key="index">
                        <td v-on:click="getProfile(country.code)" class="ranking-country-name">
                            <a>{{country.country}}</a>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg1',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg1==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg1)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg2',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg2==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg2)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg3',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg3==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg3)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg4',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg4==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg4)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg5',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg5==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg5)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg6',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg6==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg6)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg7',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg7==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg7)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg8',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg8==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg8)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg9',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg9==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg9)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg10',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg10==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg10)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg11',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg11==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg11)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg12',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg12==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg12)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg13',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg13==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg13)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg14',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg14==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg14)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg15',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg15==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg15)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg16',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg16==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg16)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg17',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg17==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg17)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="north-content" v-show="activeTab=='north'">
            <div class="countries-table">
                <table>
                    <thead class="goals-names">
                    <tr class="names">
                        <th></th>
                        <th class="color-red"><?=$this->Translate('NO <br> POVERTY');?></th>
                        <th class="color-yellow"><?=$this->Translate('ZERO <br> HUNGER');?></th>
                        <th class="color-green"><?=$this->Translate('GOOD HEALTH <br> AND <br> WELL BEING');?></th>
                        <th class="color-red-2"><?=$this->Translate('QUALITY EDUCATION');?></th>
                        <th class="color-red-3"><?=$this->Translate('GENDER EQUALITY');?></th>
                        <th class="color-blue"><?=$this->Translate('CLEAN <br> WATER <br> AND <br> SANITATION');?></th>
                        <th class="color-yellow"><?=$this->Translate('AFFORDABLE <br> AND <br> CLEAN <br> ENERGY');?></th>
                        <th class="color-red-4"><?=$this->Translate('DECENT <br> WORK <br> AND <br> ECONOMIC <br> GROWTH');?></th>
                        <th class="color-orange-1"><?=$this->Translate('INDUSTRY, INNOVATION AND INFRASTRUCTURE');?></th>
                        <th class="color-red-5"><?=$this->Translate('REDUCED INEQUALITIES');?></th>
                        <th class="color-yellow-1"><?=$this->Translate('SUSTAINABLE <br> CITIES <br> AND <br> COMMUNITIES');?></th>
                        <th class="color-yellow-2"><?=$this->Translate('RESPONSIBLE <br> CONSUMPTION <br> AND <br> PRODUCTION');?></th>
                        <th class="color-green-1"><?=$this->Translate('CLIMATE <br> ACTION');?></th>
                        <th class="color-blue-1"><?=$this->Translate('LIFE <br> BELOW <br> WATER');?></th>
                        <th class="color-green-2"><?=$this->Translate('LIFE <br> ON <br> LAND');?></th>
                        <th class="color-blue-2"><?=$this->Translate('PEACE, <br> JUSTICE <br> AND <br> STRONG <br> INSTITUTIONS');?></th>
                        <th class="color-blue-3"><?=$this->Translate('PARTNERSHIP <br> FOR <br> THE <br> GOALS');?></th>
                    </tr>
                    <tr class="counters">
                        <th></th>
                        <th class="color-red">1</th>
                        <th class="color-yellow">2</th>
                        <th class="color-green">3</th>
                        <th class="color-red-2">4</th>
                        <th class="color-red-3">5</th>
                        <th class="color-blue">6</th>
                        <th class="color-yellow">7</th>
                        <th class="color-red-4">8</th>
                        <th class="color-orange-1">9</th>
                        <th class="color-red-5">10</th>
                        <th class="color-yellow-1">11</th>
                        <th class="color-yellow-2">12</th>
                        <th class="color-green-1">13</th>
                        <th class="color-blue-1">14</th>
                        <th class="color-green-2">15</th>
                        <th class="color-blue-2">16</th>
                        <th class="color-blue-3">17</th>
                    </tr>
                    </thead>
                    <tbody class="trends-body">
                    <tr v-for="(country,index) in northCountries" :key="index">
                        <td v-on:click="getProfile(country.code)" class="ranking-country-name">
                            <a>{{country.country}}</a>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg1',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg1==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg1)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg2',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg2==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg2)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg3',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg3==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg3)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg4',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg4==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg4)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg5',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg5==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg5)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg6',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg6==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg6)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg7',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg7==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg7)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg8',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg8==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg8)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg9',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg9==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg9)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg10',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg10==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg10)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg11',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg11==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg11)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg12',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg12==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg12)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg13',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg13==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg13)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg14',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg14==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg14)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg15',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg15==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg15)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg16',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg16==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg16)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg17',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg17==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg17)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="east-content" v-show="activeTab=='east'">
            <div class="countries-table">
                <table>
                    <thead class="goals-names">
                    <tr class="names">
                        <th></th>
                        <th class="color-red"><?=$this->Translate('NO <br> POVERTY');?></th>
                        <th class="color-yellow"><?=$this->Translate('ZERO <br> HUNGER');?></th>
                        <th class="color-green"><?=$this->Translate('GOOD HEALTH <br> AND <br> WELL BEING');?></th>
                        <th class="color-red-2"><?=$this->Translate('QUALITY EDUCATION');?></th>
                        <th class="color-red-3"><?=$this->Translate('GENDER EQUALITY');?></th>
                        <th class="color-blue"><?=$this->Translate('CLEAN <br> WATER <br> AND <br> SANITATION');?></th>
                        <th class="color-yellow"><?=$this->Translate('AFFORDABLE <br> AND <br> CLEAN <br> ENERGY');?></th>
                        <th class="color-red-4"><?=$this->Translate('DECENT <br> WORK <br> AND <br> ECONOMIC <br> GROWTH');?></th>
                        <th class="color-orange-1"><?=$this->Translate('INDUSTRY, INNOVATION AND INFRASTRUCTURE');?></th>
                        <th class="color-red-5"><?=$this->Translate('REDUCED INEQUALITIES');?></th>
                        <th class="color-yellow-1"><?=$this->Translate('SUSTAINABLE <br> CITIES <br> AND <br> COMMUNITIES');?></th>
                        <th class="color-yellow-2"><?=$this->Translate('RESPONSIBLE <br> CONSUMPTION <br> AND <br> PRODUCTION');?></th>
                        <th class="color-green-1"><?=$this->Translate('CLIMATE <br> ACTION');?></th>
                        <th class="color-blue-1"><?=$this->Translate('LIFE <br> BELOW <br> WATER');?></th>
                        <th class="color-green-2"><?=$this->Translate('LIFE <br> ON <br> LAND');?></th>
                        <th class="color-blue-2"><?=$this->Translate('PEACE, <br> JUSTICE <br> AND <br> STRONG <br> INSTITUTIONS');?></th>
                        <th class="color-blue-3"><?=$this->Translate('PARTNERSHIP <br> FOR <br> THE <br> GOALS');?></th>
                    </tr>
                    <tr class="counters">
                        <th></th>
                        <th class="color-red">1</th>
                        <th class="color-yellow">2</th>
                        <th class="color-green">3</th>
                        <th class="color-red-2">4</th>
                        <th class="color-red-3">5</th>
                        <th class="color-blue">6</th>
                        <th class="color-yellow">7</th>
                        <th class="color-red-4">8</th>
                        <th class="color-orange-1">9</th>
                        <th class="color-red-5">10</th>
                        <th class="color-yellow-1">11</th>
                        <th class="color-yellow-2">12</th>
                        <th class="color-green-1">13</th>
                        <th class="color-blue-1">14</th>
                        <th class="color-green-2">15</th>
                        <th class="color-blue-2">16</th>
                        <th class="color-blue-3">17</th>
                    </tr>
                    </thead>
                    <tbody class="trends-body">
                    <tr v-for="(country,index) in eastCountries" :key="index">
                        <td v-on:click="getProfile(country.code)" class="ranking-country-name">
                            <a>{{country.country}}</a>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg1',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg1==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg1)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg2',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg2==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg2)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg3',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg3==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg3)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg4',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg4==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg4)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg5',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg5==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg5)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg6',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg6==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg6)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg7',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg7==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg7)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg8',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg8==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg8)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg9',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg9==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg9)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg10',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg10==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg10)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg11',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg11==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg11)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg12',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg12==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg12)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg13',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg13==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg13)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg14',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg14==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg14)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg15',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg15==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg15)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg16',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg16==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg16)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg17',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg17==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg17)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="central-content" v-show="activeTab=='central'">
            <div class="countries-table">
                <table>
                    <thead class="goals-names">
                    <tr class="names">
                        <th></th>
                        <th class="color-red"><?=$this->Translate('NO <br> POVERTY');?></th>
                        <th class="color-yellow"><?=$this->Translate('ZERO <br> HUNGER');?></th>
                        <th class="color-green"><?=$this->Translate('GOOD HEALTH <br> AND <br> WELL BEING');?></th>
                        <th class="color-red-2"><?=$this->Translate('QUALITY EDUCATION');?></th>
                        <th class="color-red-3"><?=$this->Translate('GENDER EQUALITY');?></th>
                        <th class="color-blue"><?=$this->Translate('CLEAN <br> WATER <br> AND <br> SANITATION');?></th>
                        <th class="color-yellow"><?=$this->Translate('AFFORDABLE <br> AND <br> CLEAN <br> ENERGY');?></th>
                        <th class="color-red-4"><?=$this->Translate('DECENT <br> WORK <br> AND <br> ECONOMIC <br> GROWTH');?></th>
                        <th class="color-orange-1"><?=$this->Translate('INDUSTRY, INNOVATION AND INFRASTRUCTURE');?></th>
                        <th class="color-red-5"><?=$this->Translate('REDUCED INEQUALITIES');?></th>
                        <th class="color-yellow-1"><?=$this->Translate('SUSTAINABLE <br> CITIES <br> AND <br> COMMUNITIES');?></th>
                        <th class="color-yellow-2"><?=$this->Translate('RESPONSIBLE <br> CONSUMPTION <br> AND <br> PRODUCTION');?></th>
                        <th class="color-green-1"><?=$this->Translate('CLIMATE <br> ACTION');?></th>
                        <th class="color-blue-1"><?=$this->Translate('LIFE <br> BELOW <br> WATER');?></th>
                        <th class="color-green-2"><?=$this->Translate('LIFE <br> ON <br> LAND');?></th>
                        <th class="color-blue-2"><?=$this->Translate('PEACE, <br> JUSTICE <br> AND <br> STRONG <br> INSTITUTIONS');?></th>
                        <th class="color-blue-3"><?=$this->Translate('PARTNERSHIP <br> FOR <br> THE <br> GOALS');?></th>
                    </tr>
                    <tr class="counters">
                        <th></th>
                        <th class="color-red">1</th>
                        <th class="color-yellow">2</th>
                        <th class="color-green">3</th>
                        <th class="color-red-2">4</th>
                        <th class="color-red-3">5</th>
                        <th class="color-blue">6</th>
                        <th class="color-yellow">7</th>
                        <th class="color-red-4">8</th>
                        <th class="color-orange-1">9</th>
                        <th class="color-red-5">10</th>
                        <th class="color-yellow-1">11</th>
                        <th class="color-yellow-2">12</th>
                        <th class="color-green-1">13</th>
                        <th class="color-blue-1">14</th>
                        <th class="color-green-2">15</th>
                        <th class="color-blue-2">16</th>
                        <th class="color-blue-3">17</th>
                    </tr>
                    </thead>
                    <tbody class="trends-body">
                    <tr v-for="(country,index) in centralCountries" :key="index">
                        <td v-on:click="getProfile(country.code)" class="ranking-country-name">
                            <a>{{country.country}}</a>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg1',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg1==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg1)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg2',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg2==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg2)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg3',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg3==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg3)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg4',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg4==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg4)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg5',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg5==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg5)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg6',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg6==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg6)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg7',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg7==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg7)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg8',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg8==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg8)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg9',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg9==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg9)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg10',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg10==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg10)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg11',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg11==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg11)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg12',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg12==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg12)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg13',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg13==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg13)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg14',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg14==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg14)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg15',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg15==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg15)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg16',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg16==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg16)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg17',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg17==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg17)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="south-content" v-show="activeTab=='south'">
            <div class="countries-table">
                <table>
                    <thead class="goals-names">
                    <tr class="names">
                        <th></th>
                        <th class="color-red"><?=$this->Translate('NO <br> POVERTY');?></th>
                        <th class="color-yellow"><?=$this->Translate('ZERO <br> HUNGER');?></th>
                        <th class="color-green"><?=$this->Translate('GOOD HEALTH <br> AND <br> WELL BEING');?></th>
                        <th class="color-red-2"><?=$this->Translate('QUALITY EDUCATION');?></th>
                        <th class="color-red-3"><?=$this->Translate('GENDER EQUALITY');?></th>
                        <th class="color-blue"><?=$this->Translate('CLEAN <br> WATER <br> AND <br> SANITATION');?></th>
                        <th class="color-yellow"><?=$this->Translate('AFFORDABLE <br> AND <br> CLEAN <br> ENERGY');?></th>
                        <th class="color-red-4"><?=$this->Translate('DECENT <br> WORK <br> AND <br> ECONOMIC <br> GROWTH');?></th>
                        <th class="color-orange-1"><?=$this->Translate('INDUSTRY, INNOVATION AND INFRASTRUCTURE');?></th>
                        <th class="color-red-5"><?=$this->Translate('REDUCED INEQUALITIES');?></th>
                        <th class="color-yellow-1"><?=$this->Translate('SUSTAINABLE <br> CITIES <br> AND <br> COMMUNITIES');?></th>
                        <th class="color-yellow-2"><?=$this->Translate('RESPONSIBLE <br> CONSUMPTION <br> AND <br> PRODUCTION');?></th>
                        <th class="color-green-1"><?=$this->Translate('CLIMATE <br> ACTION');?></th>
                        <th class="color-blue-1"><?=$this->Translate('LIFE <br> BELOW <br> WATER');?></th>
                        <th class="color-green-2"><?=$this->Translate('LIFE <br> ON <br> LAND');?></th>
                        <th class="color-blue-2"><?=$this->Translate('PEACE, <br> JUSTICE <br> AND <br> STRONG <br> INSTITUTIONS');?></th>
                        <th class="color-blue-3"><?=$this->Translate('PARTNERSHIP <br> FOR <br> THE <br> GOALS');?></th>
                    </tr>
                    <tr class="counters">
                        <th></th>
                        <th class="color-red">1</th>
                        <th class="color-yellow">2</th>
                        <th class="color-green">3</th>
                        <th class="color-red-2">4</th>
                        <th class="color-red-3">5</th>
                        <th class="color-blue">6</th>
                        <th class="color-yellow">7</th>
                        <th class="color-red-4">8</th>
                        <th class="color-orange-1">9</th>
                        <th class="color-red-5">10</th>
                        <th class="color-yellow-1">11</th>
                        <th class="color-yellow-2">12</th>
                        <th class="color-green-1">13</th>
                        <th class="color-blue-1">14</th>
                        <th class="color-green-2">15</th>
                        <th class="color-blue-2">16</th>
                        <th class="color-blue-3">17</th>
                    </tr>
                    </thead>
                    <tbody class="trends-body">
                    <tr v-for="(country,index) in southCountries" :key="index">
                        <td v-on:click="getProfile(country.code)" class="ranking-country-name">
                            <a>{{country.country}}</a>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg1',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg1==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg1)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg2',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg2==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg2)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg3',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg3==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg3)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg4',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg4==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg4)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg5',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg5==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg5)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg6',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg6==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg6)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg7',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg7==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg7)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg8',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg8==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg8)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg9',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg9==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg9)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg10',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg10==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg10)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg11',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg11==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg11)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg12',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg12==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg12)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg13',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg13==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg13)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg14',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg14==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg14)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg15',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg15==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg15)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg16',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg16==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg16)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg17',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg17==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg17)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="west-content" v-show="activeTab=='west'">
            <div class="countries-table">
                <table>
                    <thead class="goals-names">
                    <tr class="names">
                        <th></th>
                        <th class="color-red"><?=$this->Translate('NO <br> POVERTY');?></th>
                        <th class="color-yellow"><?=$this->Translate('ZERO <br> HUNGER');?></th>
                        <th class="color-green"><?=$this->Translate('GOOD HEALTH <br> AND <br> WELL BEING');?></th>
                        <th class="color-red-2"><?=$this->Translate('QUALITY EDUCATION');?></th>
                        <th class="color-red-3"><?=$this->Translate('GENDER EQUALITY');?></th>
                        <th class="color-blue"><?=$this->Translate('CLEAN <br> WATER <br> AND <br> SANITATION');?></th>
                        <th class="color-yellow"><?=$this->Translate('AFFORDABLE <br> AND <br> CLEAN <br> ENERGY');?></th>
                        <th class="color-red-4"><?=$this->Translate('DECENT <br> WORK <br> AND <br> ECONOMIC <br> GROWTH');?></th>
                        <th class="color-orange-1"><?=$this->Translate('INDUSTRY, INNOVATION AND INFRASTRUCTURE');?></th>
                        <th class="color-red-5"><?=$this->Translate('REDUCED INEQUALITIES');?></th>
                        <th class="color-yellow-1"><?=$this->Translate('SUSTAINABLE <br> CITIES <br> AND <br> COMMUNITIES');?></th>
                        <th class="color-yellow-2"><?=$this->Translate('RESPONSIBLE <br> CONSUMPTION <br> AND <br> PRODUCTION');?></th>
                        <th class="color-green-1"><?=$this->Translate('CLIMATE <br> ACTION');?></th>
                        <th class="color-blue-1"><?=$this->Translate('LIFE <br> BELOW <br> WATER');?></th>
                        <th class="color-green-2"><?=$this->Translate('LIFE <br> ON <br> LAND');?></th>
                        <th class="color-blue-2"><?=$this->Translate('PEACE, <br> JUSTICE <br> AND <br> STRONG <br> INSTITUTIONS');?></th>
                        <th class="color-blue-3"><?=$this->Translate('PARTNERSHIP <br> FOR <br> THE <br> GOALS');?></th>
                    </tr>
                    <tr class="counters">
                        <th></th>
                        <th class="color-red">1</th>
                        <th class="color-yellow">2</th>
                        <th class="color-green">3</th>
                        <th class="color-red-2">4</th>
                        <th class="color-red-3">5</th>
                        <th class="color-blue">6</th>
                        <th class="color-yellow">7</th>
                        <th class="color-red-4">8</th>
                        <th class="color-orange-1">9</th>
                        <th class="color-red-5">10</th>
                        <th class="color-yellow-1">11</th>
                        <th class="color-yellow-2">12</th>
                        <th class="color-green-1">13</th>
                        <th class="color-blue-1">14</th>
                        <th class="color-green-2">15</th>
                        <th class="color-blue-2">16</th>
                        <th class="color-blue-3">17</th>
                    </tr>
                    </thead>
                    <tbody class="trends-body">
                    <tr v-for="(country,index) in westCountries" :key="index">
                        <td v-on:click="getProfile(country.code)" class="ranking-country-name">
                            <a>{{country.country}}</a>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg1',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg1==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg1)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg2',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg2==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg2)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg3',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg3==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg3)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg4',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg4==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg4)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg5',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg5==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg5)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg6',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg6==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg6)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg7',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg7==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg7)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg8',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg8==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg8)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg9',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg9==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg9)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg10',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg10==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg10)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg11',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg11==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg11)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg12',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg12==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg12)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg13',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg13==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg13)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg14',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg14==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg14)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg15',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg15==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg15)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg16',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg16==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg16)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div v-on:click="getTrendsIndicator('sdg17',country.code)" class="goal-box">
                                <div class="sdg-arrow" v-if="!country.value_sdg17==''">
                                    <i class="fa fa-long-arrow-right" :class="getArrowClass(country.value_sdg17)"></i>
                                </div>
                                <div class="sdg-arrow d-flex flex-row" v-else>
                                    <i class="fa fa-circle"></i>
                                    <span style="display: block; width:5px;"></span>
                                    <i class="fa fa-circle color-red"></i>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="sdg-notes">
            <p>
               <?=$this->Translate('Note: Goals without an arrow signify that a country did not have data for 75% of the indicators used for
                trends analysis. More detailed explanation available in <a href="<?= LINK ?>faqs">FAQs</a>.');?> 
            </p>
        </div>
    </div>


    <a class="legend-widget" href="javascript:void(0)"  v-on:mouseover="showLegend(true)"  v-on:mouseleave="showLegend(false)">
        <span class="legend-logo-img"><?=$this->Translate('Legend');?></span>
        <span class=" legend-fa-icon fa fa-caret-left" v-if="legend"></span>
    </a>

    <div class="legend-window fadeInRight" v-if="legend">
        <div class="row">
            <div class="row">


                <div class="col-12">
                    <div class="legend-rating legend-trend bg-white shadow-sm text-left p-3 h-100">
                        <h6>Trend</h6>
                        <div class="legend-item">
                            <div class="legend-color trend-5"><span
                                        class="fa fa-long-arrow-right trendsIndicProfile-icon"
                                        style="color:#61ac56"></span></div>
                            <div class="legend-name text-muted"><?=$this->Translate('Mantaining SDG achievement');?></div>
                        </div>

                        <div class="legend-item">
                            <div class="legend-color trend-4"><span class="fa fa-long-arrow-up trendsIndicProfile-icon"
                                                                    style="color:#61ac56"></span></div>
                            <div class="legend-name text-muted"><?=$this->Translate('On track to achieve goal by 2030');?></div>
                        </div>

                        <div class="legend-item">
                            <div class="legend-color trend-3"><span
                                        class="fa fa-long-arrow-right trendsIndicProfile-icon icon-rotate"
                                        style="color:#f0ca47;z-index: 0 !important;"></span></div>
                            <div class="legend-name text-muted"><?=$this->Translate('Score moderately increasing, insufficient to attain goal');?>
                            </div>
                        </div>

                        <div class="legend-item">
                            <div class="legend-color trend-2"><span
                                        class="fa fa-long-arrow-right trendsIndicProfile-icon"
                                        style="color:#e5873c"></span></div>
                            <div class="legend-name text-muted"><?=$this->Translate('Score stagnating or increasing at less than 50% of
                                required');?>
                                rate
                            </div>
                        </div>

                        <div class="legend-item">
                            <div class="legend-color trend-1"><span
                                        class="fa fa-long-arrow-down trendsIndicProfile-icon"
                                        style="color:red"></span></div>
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
                            <div class="legend-name text-muted"><?=$this->Translate('Trend information unavailable');?></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- ========== country profile pop-up ========== -->
<?php include('views/commonpage/country_profile.php') ?>
<!-- ========== country profile pop-up ========== -->



