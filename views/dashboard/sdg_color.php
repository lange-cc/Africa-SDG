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
                <table class="sdg-ranking-table">
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
                    <tbody>
                    <tr v-for="(country,index) in countries" :key="index">
                        <td v-on:click="getProfile(country.code)" class="ranking-country-name">
                            <a>{{country.country}}</a>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg1',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg1}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg2',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg2}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg3',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg3}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg4',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg4}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg5',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg5}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg6',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg6}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg7',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg7}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg8',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg8}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg9',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg9}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg10',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg10}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg11',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg11}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg12',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg12}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg13',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg13}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg14',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg14}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg15',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg15}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg16',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg16}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg17',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg17}"></div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="north-content" v-show="activeTab=='north'">
            <div class="countries-table">
                <table class="sdg-ranking-table">
                    <thead class="goals-names">
                    <tr class="names">
                        <th></th>
                        <th class="color-red"><?=$this->Translate('NO POVERTY');?></th>
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
                    <tbody>
                    <tr v-for="(country,index) in northCountries" :key="index">
                        <td v-on:click="getProfile(country.code)" class="ranking-country-name">
                            <a>{{country.country}}</a>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg1',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg1}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg2',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg2}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg3',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg3}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg4',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg4}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg5',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg5}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg6',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg6}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg7',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg7}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg8',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg8}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg9',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg9}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg10',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg10}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg11',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg11}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg12',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg12}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg13',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg13}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg14',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg14}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg15',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg15}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg16',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg16}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg17',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg17}"></div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="east-content" v-show="activeTab=='east'">
            <div class="countries-table">
                <table class="sdg-ranking-table">
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
                    <tbody>
                    <tr v-for="(country,index) in eastCountries" :key="index">
                        <td v-on:click="getProfile(country.code)" class="ranking-country-name">
                            <a>{{country.country}}</a>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg1',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg1}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg2',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg2}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg3',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg3}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg4',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg4}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg5',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg5}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg6',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg6}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg7',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg7}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg8',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg8}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg9',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg9}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg10',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg10}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg11',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg11}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg12',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg12}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg13',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg13}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg14',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg14}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg15',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg15}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg16',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg16}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg17',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg17}"></div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="central-content" v-show="activeTab=='central'">
            <div class="countries-table">
                <table class="sdg-ranking-table">
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
                    <tbody>
                    <tr v-for="(country,index) in centralCountries" :key="index">
                        <td v-on:click="getProfile(country.code)" class="ranking-country-name">
                            <a>{{country.country}}</a>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg1',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg1}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg2',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg2}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg3',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg3}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg4',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg4}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg5',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg5}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg6',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg6}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg7',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg7}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg8',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg8}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg9',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg9}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg10',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg10}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg11',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg11}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg12',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg12}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg13',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg13}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg14',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg14}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg15',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg15}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg16',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg16}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg17',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg17}"></div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="south-content" v-show="activeTab=='south'">
            <div class="countries-table">
                <table class="sdg-ranking-table">
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
                    <tbody>
                    <tr v-for="(country,index) in southCountries" :key="index">
                        <td v-on:click="getProfile(country.code)" class="ranking-country-name">
                            <a>{{country.country}}</a>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg1',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg1}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg2',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg2}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg3',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg3}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg4',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg4}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg5',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg5}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg6',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg6}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg7',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg7}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg8',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg8}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg9',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg9}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg10',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg10}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg11',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg11}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg12',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg12}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg13',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg13}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg14',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg14}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg15',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg15}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg16',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg16}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg17',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg17}"></div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="west-content" v-show="activeTab=='west'">
            <div class="countries-table">
                <table class="sdg-ranking-table">
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
                    <tbody>
                    <tr v-for="(country,index) in westCountries" :key="index">
                        <td v-on:click="getProfile(country.code)" class="ranking-country-name">
                            <a>{{country.country}}</a>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg1',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg1}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg2',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg2}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg3',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg3}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg4',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg4}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg5',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg5}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg6',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg6}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg7',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg7}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg8',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg8}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg9',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg9}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg10',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg10}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg11',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg11}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg12',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg12}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg13',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg13}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg14',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg14}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg15',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg15}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg16',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg16}"></div>
                        </td>
                        <td>
                            <div v-on:click="getIndicator('sdg17',country.code)" class="goal-box"
                                 :style="{'background-color': country.color_sdg17}"></div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <a class="legend-widget" href="javascript:void(0)"  v-on:mouseover="showLegend(true)"  v-on:mouseleave="showLegend(false)">
        <span _ngcontent-c1="" class="legend-logo-img"><?=$this->Translate('Legend');?></span>
        <span class=" legend-fa-icon fa fa-caret-left" v-if="legend"></span>
    </a>


    <div class="legend-window fadeInRight" v-if="legend">
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
                            <div class="legend-name text-muted"><?=$this->Translate('Significant challenges remain');?></div>
                        </div>
                        <div class="legend-item">
                            <div class="legend-color"><span class="badge badge-pill bg-red">&nbsp;</span></div>
                            <div class="legend-name text-muted"><?=$this->Translate('Significant challenges remain');?></div>
                        </div>
                        <div class="legend-item">
                            <div class="legend-color"><span class="badge badge-pill bg-gray">&nbsp;</span></div>
                            <div class="legend-name text-muted"><?=$this->Translate('[information unavailable]');?></div>
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
