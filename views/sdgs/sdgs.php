<div id="sdgs_page">
    <div class="sdgs-heading" >
        <?=$this->Translate('Sustainable Development Goals');?>
    </div>
    <div class="container">
        <div class="sdg-goals">
            <div class="sdgs-row">
                <!-- 1. No Poverty -->
                <div @click.stop="showGoal(1)" class="sdg-goal-card" style="background: #eb1c2d;">
                    <div class="header">
                        <div class="number">
                            1
                        </div>
                        <div class="name"> <?=$this->Translate('No <br>Poverty');?>
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-1.png" class="image-ht-110" alt="">
                    </div>
                </div>
                <!-- 2. Zero Hunger -->
                <div @click.stop="showGoal(2)" class="sdg-goal-card" style="background: #d3a029;">
                    <div class="header">
                        <div class="number">
                            2
                        </div>
                        <div class="name"><?=$this->Translate('Zero <br> Hunger');?>
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-2.png" class="image-ht-70" alt="">
                    </div>
                </div>
                <!-- 3. Good Health And Well Being -->
                <div @click.stop="showGoal(3)" class="sdg-goal-card" style="background: #279b48;">
                    <div class="header">
                        <div class="number">
                            3
                        </div>
                        <div class="name"><?=$this->Translate('Good Health <br> And Well Being');?>
                            
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-3.png" class="image-ht-80" alt="">
                    </div>
                </div>
                <!-- 4. Quality Education -->
                <div @click.stop="showGoal(4)" class="sdg-goal-card" style="background: #c31f33">
                    <div class="header">
                        <div class="number">
                            4
                        </div>
                        <div class="name"><?=$this->Translate('Quality <br> Education');?>
                            
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-4.png" class="image-ht-70" alt="">
                    </div>
                </div>
                <!-- 5. Gender Equality -->
                <div @click.stop="showGoal(5)" class="sdg-goal-card" style="background: #ef402b">
                    <div class="header">
                        <div class="number">
                            5
                        </div>
                        <div class="name"><?=$this->Translate('Gender <br> Equality');?>
                           
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-5.png" class="image-ht-70" alt="">
                    </div>
                </div>
                <!-- 6. Clean Water and Sanitation -->
                <div @click.stop="showGoal(6)" class="sdg-goal-card" style="background: #00aed9">
                    <div class="header">
                        <div class="number">
                            6
                        </div>
                        <div class="name"><?=$this->Translate('Clean Water <br> and Sanitation');?>
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-6.png" style="height: 75px;" alt="">
                    </div>
                </div>

                <!-- 7. Affordable and clean Energy -->
                <div @click.stop="showGoal(7)" class="sdg-goal-card" style="background: #fdb713">
                    <div class="header">
                        <div class="number">
                            7
                        </div>
                        <div class="name"><?=$this->Translate('Affordable and <br> clean Energy');?>
                            
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-7.png" class="image-ht-70"
                             style="height: 65px;" alt="">
                    </div>
                </div>

                <!-- 8. Decent Work and Economic Growth -->
                <div @click.stop="showGoal(8)" class="sdg-goal-card" style="background: #8f1838">
                    <div class="header">
                        <div class="number">
                            8
                        </div>
                        <div class="name"><?=$this->Translate('Decent Work and <br> Economic Growth');?>
                            
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-8.png" style="height: 58px;margin-top: 5px;"
                             alt="">
                    </div>
                </div>
                <!-- 9. Industry , Innovation and Infrastructure -->
                <div @click.stop="showGoal(9)" class="sdg-goal-card" style="background: #f36d25">
                    <div class="header">
                        <div class="number">
                            9
                        </div>
                        <div class="name"><?=$this->Translate('Industry, Innovation <br> and Infrastructure');?>
                            
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-9.png" class="image-ht-70" alt="">
                    </div>
                </div>
            </div>
            <div class="sdgs-row">
                <!-- 10. Reduced Inequalities -->
                <div @click.stop="showGoal(10)" class="sdg-goal-card" style="background: #e11484">
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
                <div @click.stop="showGoal(11)" class="sdg-goal-card" style="background: #f99d26">
                    <div class="header">
                        <div class="number">
                            11
                        </div>
                        <div class="name"><?=$this->Translate('Sustainable cities <br> and Communities');?>
                            
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-11.png" style="height: 75px;"
                             class="image-ht-70" alt="">
                    </div>
                </div>

                <!-- 12. Responsible consumption and Production -->
                <div @click.stop="showGoal(12)" class="sdg-goal-card" style="background: #cf8d2a">
                    <div class="header">
                        <div class="number">
                            12
                        </div>
                        <div class="name"><?=$this->Translate('Responsible <br> consumption <br> and Production');?>
                            
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-12.png" class="image-ht-70" alt="">
                    </div>
                </div>

                <!-- 13. Climate Action -->
                <div @click.stop="showGoal(13)" class="sdg-goal-card" style="background: #48773e">
                    <div class="header">
                        <div class="number">
                            13
                        </div>
                        <div class="name"><?=$this->Translate('Climate <br> Action');?>
                            
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-13.png" class="image-ht-110 sdg_icon_13" alt="">
                    </div>
                </div>

                <!-- 14. Life Below Water -->
                <div @click.stop="showGoal(14)" class="sdg-goal-card" style="background:#007dbc">
                    <div class="header">
                        <div class="number">
                            14
                        </div>
                        <div class="name"><?=$this->Translate('Life <br> Below Water');?>
                           
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-14.png" class="image-ht-70" alt="">
                    </div>
                </div>

                <!-- 15. Life On Land -->
                <div @click.stop="showGoal(15)" class="sdg-goal-card" style="background:#3eb049">
                    <div class="header">
                        <div class="number">
                            15
                        </div>
                        <div class="name"><?=$this->Translate('Life <br> On Land');?>
                            
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-15.png" style="margin-top: 5px;"
                             class="image-ht-60" alt="">
                    </div>
                </div>

                <!-- 16. Peace, Justice and Strong Institutions -->
                <div @click.stop="showGoal(16)" class="sdg-goal-card" style="background:#02558b">
                    <div class="header">
                        <div class="number">
                            16
                        </div>
                        <div class="name"><?=$this->Translate('Peace, Justice <br> and Strong <br> Institutions');?>
                            
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-16.png" class="image-ht-70"
                             style="margin-top: -5px;" alt="">
                    </div>
                </div>
                <!-- 17. Partnership for The Goals -->
                <div @click.stop="showGoal(17)" class="sdg-goal-card" style="background:#183668">
                    <div class="header">
                        <div class="number">
                            17
                        </div>
                        <div class="name"><?=$this->Translate('Partnership for <br> The Goals');?>
                            
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-17.png" class="image-ht-70" alt="">
                    </div>
                </div>

                <!-- 18. Sustainable Development Goals -->
                <div @click.stop="showGoal(18)" class="sdg-goal-card" style="background:#fff;padding: 10px;">
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-18.png" class="image-ht-80" alt="">
                    </div>
                </div>
            </div>
        </div>

<!-- SDG Content -->
        <div class="row" v-for="(item,index) in goalsData" :key="index" v-show="goalShown == item.subtitle" :id="'sdg_'+item.subtitle">
            <div class="col-md-12" style="margin-top: 20px;">
                <!-- 1. No Poverty -->
                <div class="sdg-goal-card-big" v-if="item.subtitle=='1'" style="background: #eb1c2d;">
                    <div class="header">
                        <div class="number">
                            1
                        </div>
                        <div class="name"><?=$this->Translate('No <br> Poverty');?>
                           
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-1.png" class="image-ht-110" alt="">
                    </div>
                </div>
                <!-- 2. Zero Hunger -->
                <div class="sdg-goal-card-big" v-if="item.subtitle=='2'" style="background: #d3a029;">
                    <div class="header">
                        <div class="number">
                            2
                        </div>
                        <div class="name"><?=$this->Translate('Zero <br> Hunger');?>
                            
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-2.png" class="image-ht-70" alt="">
                    </div>
                </div>
                <!-- 3. Good Health And Well Being -->
                <div class="sdg-goal-card-big" v-if="item.subtitle=='3'" style="background: #279b48;">
                    <div class="header">
                        <div class="number">
                            3
                        </div>
                        <div class="name"><?=$this->Translate('Good Health <br> And Well Being');?>
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-3.png" class="image-ht-80" alt="">
                    </div>
                </div>
                <!-- 4. Quality Education -->
                <div class="sdg-goal-card-big" v-if="item.subtitle=='4'" style="background: #c31f33;">
                    <div class="header">
                        <div class="number">
                            4
                        </div>
                        <div class="name"><?=$this->Translate('Quality <br> Education');?>
                            
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-4.png" class="image-ht-70" alt="">
                    </div>
                </div>
                <!-- 5. Gender Equality -->
                <div class="sdg-goal-card-big" v-if="item.subtitle=='5'" style="background: #ef402b;">
                    <div class="header">
                        <div class="number">
                            5
                        </div>
                        <div class="name"><?=$this->Translate('Gender <br> Equality');?>
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-5.png" class="image-ht-70" alt="">
                    </div>
                </div>
                <!-- 6. Clean Water and Sanitation -->
                <div class="sdg-goal-card-big" v-if="item.subtitle=='6'" style="background: #00aed9;">
                    <div class="header">
                        <div class="number">
                            6
                        </div>
                        <div class="name"><?=$this->Translate('Clean Water <br> and Sanitation');?>
                            
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-6.png" style="height: 75px;" alt="">
                    </div>
                </div>

                <!-- 7. Affordable and clean Energy -->
                <div class="sdg-goal-card-big" v-if="item.subtitle=='7'" style="background: #fdb713;">
                    <div class="header">
                        <div class="number">
                            7
                        </div>
                        <div class="name"><?=$this->Translate('Affordable and <br> clean Energy');?>
                           
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-7.png" class="image-ht-70"
                             style="height: 65px;" alt="">
                    </div>
                </div>

                <!-- 8. Decent Work and Economic Growth -->
                <div class="sdg-goal-card-big" v-if="item.subtitle=='8'" style="background: #8f1838;">
                    <div class="header">
                        <div class="number">
                            8
                        </div>
                        <div class="name"><?=$this->Translate('Decent Work and <br> Economic Growth');?>
                            
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-8.png" style="height: 58px;margin-top: 5px;"
                             alt="">
                    </div>
                </div>
                <!-- 9. Industry , Innovation and Infrastructure -->
                <div class="sdg-goal-card-big" v-if="item.subtitle=='9'" style="background: #f36d25;">
                    <div class="header">
                        <div class="number">
                            9
                        </div>
                        <div class="name"><?=$this->Translate('Industry, Innovation <br> and Infrastructure');?>
                            
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-9.png" class="image-ht-70" alt="">
                    </div>
                </div>

                <!-- 10. Reduced Inequalities -->
                <div class="sdg-goal-card-big" v-if="item.subtitle=='10'" style="background: #e11484;">
                    <div class="header">
                        <div class="number">
                            10
                        </div>
                        <div class="name"><?=$this->Translate('Reduced <br> Inequalities Reduced <br> Inequalities');?>
                            
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-10.png"
                             style="height: 105px;margin-top: -15px;" class="image-ht-110"
                             style="margin-top: -15px;" alt="">
                    </div>
                </div>
                <!-- 11. Sustainable cities and Communities -->
                <div class="sdg-goal-card-big" v-if="item.subtitle=='11'" style="background: #f99d26;">
                    <div class="header">
                        <div class="number">
                            11
                        </div>
                        <div class="name"><?=$this->Translate('Sustainable cities <br> and Communities');?>
                            
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-11.png" style="height: 75px;"
                             class="image-ht-70" alt="">
                    </div>
                </div>

                <!-- 12. Responsible consumption and Production -->
                <div class="sdg-goal-card-big" v-if="item.subtitle=='12'" style="background: #cf8d2a;">
                    <div class="header">
                        <div class="number">
                            12
                        </div>
                        <div class="name"><?=$this->Translate('Responsible <br> consumption <br> and Production');?>
                           
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-12.png" class="image-ht-70" alt="">
                    </div>
                </div>

                <!-- 13. Climate Action -->
                <div class="sdg-goal-card-big" v-if="item.subtitle=='13'" style="background: #48773e">
                    <div class="header">
                        <div class="number">
                            13
                        </div>
                        <div class="name"><?=$this->Translate('Climate <br> Action');?>
                            
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-13.png" class="image-ht-110" alt="">
                    </div>
                </div>

                <!-- 14. Life Below Water -->
                <div class="sdg-goal-card-big" v-if="item.subtitle=='14'" style="background:#007dbc">
                    <div class="header">
                        <div class="number">
                            14
                        </div>
                        <div class="name"><?=$this->Translate('Life <br> Below Water');?>
                            
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-14.png" class="image-ht-70" alt="">
                    </div>
                </div>

                <!-- 15. Life On Land -->
                <div class="sdg-goal-card-big" v-if="item.subtitle=='15'" style="background:#3eb049">
                    <div class="header">
                        <div class="number">
                            15
                        </div>
                        <div class="name"><?=$this->Translate('Life <br> On Land');?>
                            
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-15.png" style="margin-top: 5px;"
                             class="image-ht-60" alt="">
                    </div>
                </div>

                <!-- 16. Peace, Justice and Strong Institutions -->
                <div class="sdg-goal-card-big" v-if="item.subtitle=='16'" style="background:#02558b">
                    <div class="header">
                        <div class="number">
                            16
                        </div>
                        <div class="name"><?=$this->Translate('Peace, Justice <br> and Strong <br> Institutions');?>
                           
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-16.png" class="image-ht-70"
                             style="margin-top: -5px;" alt="">
                    </div>
                </div>
                <!-- 17. Partnership for The Goals -->
                <div class="sdg-goal-card-big" v-if="item.subtitle=='17'" style="background:#183668">
                    <div class="header">
                        <div class="number">
                            17
                        </div>
                        <div class="name"><?=$this->Translate('Partnership for <br> The Goals');?>
                            
                        </div>
                    </div>
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-17.png" class="image-ht-70" alt="">
                    </div>
                </div>

                <!-- 18. Sustainable Development Goals -->
                <div class="sdg-goal-card-big" v-if="item.subtitle=='18'" style="background:#fff;padding: 10px;">
                    <div class="body">
                        <img src="<?= URL; ?>images/sdg-vector-icon/Vectors-18.png" class="image-ht-80" alt="">
                    </div>
                </div>

                <h4 style="text-transform: capitalize; color: #aaa5a5;font-weight: normal;"><?=$this->Translate('Sustainable Development Goal');?>
                            
                    {{item.subtitle}}</h4>
                <h2 style="font-weight: normal;margin-bottom: 27px;">{{item.title}}</h2>
                <div class="goal-text" style="text-align: justify;padding-right: 20px;" v-html="item.content"></div>
            </div>
        </div>
    </div>
</div>