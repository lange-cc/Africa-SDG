<!--
 * Created by PhpStorm.
 * User: Bapt
 * Date: 10/7/2018
 * Time: 10:27 PM
 -->
<div id="downloads_page">
    <div class="downloads-heading">
        <?=$this->Translate('Downloads');?>
    </div>
    <div class="tabs">
        <ul class="tabs-heading">
            <li :class="{active:(activeTab=='report')}" @click="activeTab='report'"><?=$this->Translate('Report');?></li>
            <li :class="{active:(activeTab=='data')}" @click="activeTab='data'"><?=$this->Translate('Data');?></li>
            <li :class="{active:(activeTab=='country')}" @click="activeTab='country'"><?=$this->Translate('Country Profile');?></li>
        </ul>
        <div class="container">
            <div class="tabs-content" v-show="activeTab=='report'">
                <div class="tab-content">
                    <div class="row no-gutters bd-bottom-1-gray-1 mt-5 pb-5" v-for="report in reportData">
                        <div class="col-md-12">


                            <div class="file-box pull-right" v-if="report.ext == 'pdf'">
                                <div id="file-preview-1" class="file-preview">
                                    <img :src="'data:image/png;base64,'+report.preview" alt="pdf"
                                         class="img-responsive"/>
                                </div>
                                <div class="file-box-footer">
                                    <div class="d-flex flex-row justify-content-between">
                                        <span class="d-block">{{report.size}}</span>
                                        <a :href="'<?= LINK ?>'+report.file" class="btn btn-sm btn-primary" download><?=$this->Translate('Download');?></a>
                                    </div>
                                </div>
                            </div>

                            <div class="file-box pull-right" v-else>
                                <div class="data-file-box">
                                    <div class="d-flex flex-row justify-content-between">
                                        <div>
                                            <img src="<?= URL; ?>images/excel-icon.png" alt="" class="d-block">
                                            <span class="d-block">{{report.size}}</span>
                                        </div>
                                        <div>
                                            <a :href="'<?= LINK ?>'+report.file" class="btn btn-sm btn-primary"
                                               download><?=$this->Translate('Download');?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <h3 class="data-title">{{report.title}}</h3>
                            <div class="data-text" v-html="report.content"></div>
                            <div class="other-downloads">
                                <ul>
                                    <li v-for="(file,index) in report.files"><a
                                                :href="'<?= URL ?>all-images/'+file.file_name" download
                                                v-html="file.title"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tabs-content" v-show="activeTab=='data'">
                <div class="tab-content data">
                    <div class="row no-gutters bd-bottom-1-gray-1 mt-5 pb-5" v-for="dataItem in data">
                        <div class="col-md-12">
                            <div class="file-box pull-right" v-if="dataItem.ext=='pdf'">
                                <div id="file-preview-1" class="file-preview">
                                    <img v-if="report.ext == 'pdf'" :src="'data:image/png;base64,'+dataItem.preview"
                                         alt="pdf" class="img-responsive"/>
                                </div>
                                <div class="file-box-footer">
                                    <div class="d-flex flex-row justify-content-between">
                                        <span class="d-block">{{dataItem.size}}</span>
                                        <a :href="'<?= LINK ?>'+dataItem.file" class="btn btn-sm btn-primary" download><?=$this->Translate('Download');?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="file-box pull-right" v-else>
                                <div class="data-file-box">
                                    <div class="d-flex flex-row justify-content-between">
                                        <div>
                                            <img src="<?= URL; ?>images/excel-icon.png" alt="" class="d-block">
                                            <span class="d-block">{{dataItem.size}}</span>
                                        </div>
                                        <div>
                                            <a :href="'<?= LINK ?>'+dataItem.file" class="btn btn-sm btn-primary" download><?=$this->Translate('Download');?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="data-title">{{dataItem.title}}</h3>
                            <div class="data-text" v-html="dataItem.content"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tabs-content profiles" v-show="activeTab=='country'">
                <div class="tab-content">
                    <button class="download-all" type="button" @click="downloadAllFiles()" v-if="checkedFiles.length>0">
                        <?=$this->Translate('Download');?>
                    </button>
                    <button class="download-all" type="button" @click="downloadAllFiles()"
                            v-else="checkedFiles.length>0"><?=$this->Translate('Download All');?>
                    </button>
                    <div class="row">
                        <div class="col-lg-3" v-for="item in countriesItems">
                            <div class="country-file-box">
                                <div class="upper-part">
                                    <input type="checkbox" @click="toggleFileChecking(item.code)" class="d-block mt-1">
                                    <span class="profile-country-name d-block ml-1">{{item.name}}</span>
                                </div>
                                <div class="file-preview">
                                    <img :src="'<?= URL ?>Report/<?= $this->year ?>/'+item.preview" alt="pdf"
                                         class="img-responsive"/>
                                </div>
                                <div class="footer">
                                    <a download :href="'<?= URL ?>Report/<?= $this->year ?>/'+item.code+'.pdf'"
                                       download>
                                        <i class="fa fa-download"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="#">
                    <div class="floating-move-up">
                        <span class="fa fa-angle-up"></span>
                    </div>
                </a>

            </div>
        </div>
    </div>
</div>