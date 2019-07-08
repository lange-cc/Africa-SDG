<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 flex-center">
                <select class="lang-widget">
                    <?php
                       $lang = $this->All_lang;
                       foreach ($lang as $key => $item) {
                           ?>
                           <option value="<?=$item->abreviation ?>" <?php if($this->lang ==$item->abreviation  ){ echo "selected";} ?>><?=$item->name?></option>
                           <?php
                       }
                    ?>
                </select>
                <select class="year-widget">
                    <?php
                    $current = date('Y');
                    for ($year = 2018; $year <= $current; $year++) {
                        ?>
                        <option value="<?= $year ?>" <?php if ($year == $this->year) {
                            echo "selected";
                        } ?>>SDG data for <?= $year ?></option>
                        <?php
                    }
                    ?>

                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="sdg-data-main-title">
                    Index data files
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-3" style="padding-bottom: 10px;">
                <div class="sdgcard">
                    <div class="sdgcard-logo" style="
                            background:#fff url('<?php echo ADMINURL; ?>images/score.png');
                            background-repeat: no-repeat;
                            background-position: center center;
                            background-size: contain;">
                    </div>
                    <div class="sdgcard-title">
                        Ranking
                    </div>
                    <div class="sdgcard-option">
                        <?php if ($this->run->getPermisssion($userMail, $per_name = "SDG data Download Button", $per_key = 'k_sdgdatdownloadbtn', $page = 'sdgdata', $type = 'button')) { ?>
                            <a class="btn sdgcard-download-btn"
                               href="<?= ADMINURL ?>excel/<?=$this->lang?>/<?= $this->year ?>/Ranking.xlsx" download>Download</a>

                            <?php
                        }
                        ?>

                        <?php if ($this->run->getPermisssion($userMail, $per_name = "SDG data Update Button", $per_key = 'k_sdgdatupdatebtn', $page = 'sdgdata', $type = 'button')) { ?>
                            <a class="btn sdgcard-btn" href="#">Update</a>
                            <?php
                        }
                        ?>

                        <?php if ($this->run->getPermisssion($userMail, $per_name = "SDG data Preview Button", $per_key = 'k_sdgdatpreviewbtn', $page = 'sdgdata', $type = 'button')) { ?>
                            <a class="btn sdgcard-preview-btn" href="" data-file="<?=$this->lang?>/<?= $this->year ?>/Ranking.xlsx">Preview</a>
                            <?php
                        }
                        ?>


                    </div>
                </div>
            </div>

            <div class="col-lg-3" style="padding-bottom: 10px;">
                <div class="sdgcard">
                    <div class="sdgcard-logo" style="
                            background:#fff url('<?php echo ADMINURL; ?>images/radar.png');
                            background-repeat: no-repeat;
                            background-position: center center;
                            background-size: contain;">
                    </div>
                    <div class="sdgcard-title">
                        Average perfomance
                    </div>
                    <div class="sdgcard-option">
                        <?php if ($this->run->getPermisssion($userMail, $per_name = "SDG data Download Button", $per_key = 'k_sdgdatdownloadbtn', $page = 'sdgdata', $type = 'button')) { ?>
                            <a class="btn sdgcard-download-btn"
                               href="<?= ADMINURL ?>excel/<?=$this->lang?>/<?= $this->year ?>/Average-perfomance.xlsx"
                               download>Download</a>

                            <?php
                        }
                        ?>

                        <?php if ($this->run->getPermisssion($userMail, $per_name = "SDG data Update Button", $per_key = 'k_sdgdatupdatebtn', $page = 'sdgdata', $type = 'button')) { ?>
                            <a class="btn sdgcard-btn" href="#">Update</a>
                            <?php
                        }
                        ?>

                        <?php if ($this->run->getPermisssion($userMail, $per_name = "SDG data Preview Button", $per_key = 'k_sdgdatpreviewbtn', $page = 'sdgdata', $type = 'button')) { ?>
                            <a class="btn sdgcard-preview-btn" href=""
                               data-file="<?=$this->lang?>/<?= $this->year ?>/Average-perfomance.xlsx">Preview</a>
                            <?php
                        }
                        ?>

                    </div>
                </div>
            </div>

        </div>
        <!-- ===================================== -->

        <div class="row">
            <div class="col-lg-12">
                <div class="sdg-data-main-title">
                    Dashboard data files
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-3" style="padding-bottom: 10px;">
                <div class="sdgcard">
                    <div class="sdgcard-logo" style="
                            background:#fff url('<?php echo ADMINURL; ?>images/Thresholds.png');
                            background-repeat: no-repeat;
                            background-position: center center;
                            background-size: contain;">
                    </div>
                    <div class="sdgcard-title">
                        Indicators Labels
                    </div>
                    <div class="sdgcard-option">

                        <?php if ($this->run->getPermisssion($userMail, $per_name = "SDG data Download Button", $per_key = 'k_sdgdatdownloadbtn', $page = 'sdgdata', $type = 'button')) { ?>
                            <a class="btn sdgcard-download-btn"
                               href="<?= ADMINURL ?>excel/<?=$this->lang?>/<?= $this->year ?>/Indicators-Labels.xlsx"
                               download>Download</a>
                            <?php
                        }
                        ?>
                        <?php if ($this->run->getPermisssion($userMail, $per_name = "SDG data Update Button", $per_key = 'k_sdgdatupdatebtn', $page = 'sdgdata', $type = 'button')) { ?>
                            <a class="btn sdgcard-btn" href="#">Update</a>
                            <?php
                        }
                        ?>

                        <?php if ($this->run->getPermisssion($userMail, $per_name = "SDG data Preview Button", $per_key = 'k_sdgdatpreviewbtn', $page = 'sdgdata', $type = 'button')) { ?>
                            <a class="btn sdgcard-preview-btn" href=""
                               data-file="<?=$this->lang?>/<?= $this->year ?>/Indicators-Labels.xlsx">Preview</a>

                            <?php
                        }
                        ?>

                    </div>
                </div>
            </div>


            <div class="col-lg-3" style="padding-bottom: 10px;">
                <div class="sdgcard">
                    <div class="sdgcard-logo" style="
                            background:#fff url('<?php echo ADMINURL; ?>images/maindata.png');
                            background-repeat: no-repeat;
                            background-position: center center;
                            background-size: contain;">
                    </div>
                    <div class="sdgcard-title">
                        Indicators Ratings/values
                    </div>
                    <div class="sdgcard-option">
                        <?php if ($this->run->getPermisssion($userMail, $per_name = "SDG data Download Button", $per_key = 'k_sdgdatdownloadbtn', $page = 'sdgdata', $type = 'button')) { ?>
                            <a class="btn sdgcard-download-btn"
                               href="<?= ADMINURL ?>excel/<?=$this->lang?>/<?= $this->year ?>/Indicators-Ratings-values.xlsx" download>Download</a>
                            <?php
                        }
                        ?>

                        <?php if ($this->run->getPermisssion($userMail, $per_name = "SDG data Update Button", $per_key = 'k_sdgdatupdatebtn', $page = 'sdgdata', $type = 'button')) { ?>
                            <a class="btn sdgcard-btn" href="#">Update</a>
                            <?php
                        }
                        ?>

                        <?php if ($this->run->getPermisssion($userMail, $per_name = "SDG data Preview Button", $per_key = 'k_sdgdatpreviewbtn', $page = 'sdgdata', $type = 'button')) { ?>
                            <a class="btn sdgcard-preview-btn"
                               data-file="<?=$this->lang?>/<?= $this->year ?>/Indicators-Ratings-values.xlsx" href="">Preview</a>
                            <?php
                        }
                        ?>

                    </div>
                </div>
            </div>

            <div class="col-lg-3" style="padding-bottom: 10px;">
                <div class="sdgcard">
                    <div class="sdgcard-logo" style="
                            background:#fff url('<?php echo ADMINURL; ?>images/graph.png');
                            background-repeat: no-repeat;
                            background-position: center center;
                            background-size: contain;">
                    </div>
                    <div class="sdgcard-title">
                        Indicators Trends
                    </div>
                    <div class="sdgcard-option">

                        <?php if ($this->run->getPermisssion($userMail, $per_name = "SDG data Download Button", $per_key = 'k_sdgdatdownloadbtn', $page = 'sdgdata', $type = 'button')) { ?>
                            <a class="btn sdgcard-download-btn"
                               href="<?= ADMINURL ?>excel/<?=$this->lang?>/<?= $this->year ?>/Indicators-Trends.xlsx"
                               download>Download</a>
                            <?php
                        }
                        ?>

                        <?php if ($this->run->getPermisssion($userMail, $per_name = "SDG data Update Button", $per_key = 'k_sdgdatupdatebtn', $page = 'sdgdata', $type = 'button')) { ?>
                            <a class="btn sdgcard-btn" href="#">Update</a>
                            <?php
                        }
                        ?>

                        <?php if ($this->run->getPermisssion($userMail, $per_name = "SDG data Preview Button", $per_key = 'k_sdgdatpreviewbtn', $page = 'sdgdata', $type = 'button')) { ?>
                            <a class="btn sdgcard-preview-btn" href=""
                               data-file="<?=$this->lang?>/<?= $this->year ?>/Indicators-Trends.xlsx">Preview</a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>


            <div class="col-lg-3" style="padding-bottom: 10px;">
                <div class="sdgcard">
                    <div class="sdgcard-logo" style="
                            background:#fff url('<?php echo ADMINURL; ?>images/sdg-colors.png');
                            background-repeat: no-repeat;
                            background-position: center center;
                            background-size: contain;">
                    </div>
                    <div class="sdgcard-title">
                        SDGs Rating/colors
                    </div>
                    <div class="sdgcard-option">
                        <?php if ($this->run->getPermisssion($userMail, $per_name = "SDG data Download Button", $per_key = 'k_sdgdatdownloadbtn', $page = 'sdgdata', $type = 'button')) { ?>
                            <a class="btn sdgcard-download-btn"
                               href="<?= ADMINURL ?>excel/<?=$this->lang?>/<?= $this->year ?>/SDGs-Rating-colors.xlsx"
                               download>Download</a>
                            <?php
                        }
                        ?>

                        <?php if ($this->run->getPermisssion($userMail, $per_name = "SDG data Update Button", $per_key = 'k_sdgdatupdatebtn', $page = 'sdgdata', $type = 'button')) { ?>
                            <a class="btn sdgcard-btn" href="#">Update</a>
                            <?php
                        }
                        ?>

                        <?php if ($this->run->getPermisssion($userMail, $per_name = "SDG data Preview Button", $per_key = 'k_sdgdatpreviewbtn', $page = 'sdgdata', $type = 'button')) { ?>
                            <a class="btn sdgcard-preview-btn" href=""
                               data-file="<?=$this->lang?>/<?= $this->year ?>/SDGs-Rating-colors.xlsx">Preview</a>
                            <?php
                        }
                        ?>


                    </div>
                </div>
            </div>


            <div class="col-lg-3" style="padding-bottom: 10px;">
                <div class="sdgcard">
                    <div class="sdgcard-logo" style="
                            background:#fff url('<?php echo ADMINURL; ?>images/trends.png');
                            background-repeat: no-repeat;
                            background-position: center center;
                            background-size: contain;">
                    </div>
                    <div class="sdgcard-title">
                        SDGs Trends
                    </div>
                    <div class="sdgcard-option">
                        <?php if ($this->run->getPermisssion($userMail, $per_name = "SDG data Download Button", $per_key = 'k_sdgdatdownloadbtn', $page = 'sdgdata', $type = 'button')) { ?>
                            <a class="btn sdgcard-download-btn"
                               href="<?= ADMINURL ?>excel/<?=$this->lang?>/<?= $this->year ?>/SDGs-Trends.xlsx" download>Download</a>
                            <?php
                        }
                        ?>

                        <?php if ($this->run->getPermisssion($userMail, $per_name = "SDG data Update Button", $per_key = 'k_sdgdatupdatebtn', $page = 'sdgdata', $type = 'button')) { ?>
                            <a class="btn sdgcard-btn" href="#">Update</a>
                            <?php
                        }
                        ?>

                        <?php if ($this->run->getPermisssion($userMail, $per_name = "SDG data Preview Button", $per_key = 'k_sdgdatpreviewbtn', $page = 'sdgdata', $type = 'button')) { ?>
                            <a class="btn sdgcard-preview-btn" href="" data-file="<?=$this->lang?>/<?= $this->year ?>/SDGs-Trends.xlsx">Preview</a>
                            <?php
                        }
                        ?>


                    </div>
                </div>
            </div>


        </div>


</div>


</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="process-console" style="display: none">
    <div class="row">
        <div class="col-lg-12">
            <span class="fa fa-cog spin sdgloading-icon"></span> Processing Data...
        </div>
        <div class="console">

        </div>
    </div>
</div>

<?php if ($this->run->getPermisssion($userMail, $per_name = "SDG data Process Button", $per_key = 'k_sdgdatprosebtn', $page = 'sdgdata', $type = 'button')) { ?>
    <a class="btn btn-process-file" href=""><span class="fa fa-database" style="margin-right: 18px;"></span> Process
        files </a>
    <?php
}
?>


<div class="excel-preview fadeInDown">
    <div class="title-excel-preview-widget">
        <div class="excel-ribbon-label">
            <img src="<?= ADMINURL ?>images/excel_icon.png" width="40" height="40">
            <span class="sdg-file-name">===============</span>
        </div>

        <div class="sdg-excel-close-widget">
            <a href="#" class="btn"><span class="fa fa-close"></span></a>
        </div>
    </div>

    <div id="demo1" class="">

    </div>
</div>


<div class="loading-overlay" style="display: none">
    <div class="loading-widget">
        <span class="fa fa-cog spin sdgloading-icon"></span>
    </div>
</div>





