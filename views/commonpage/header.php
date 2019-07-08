
<?php session::init();?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        if (isset($this->title)) {
            echo $this->title;
        } else {
            echo 'Africa SDG Index and Dashboards';
        }
        ?>
    </title>

    <meta property="og:url" content="https://africasdgindex.org/"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="Africa SDG Index and Dashboards"/>
    <meta property="og:description"
          content="The Africa SDG Index and Dashboards are a tool that draws on official and proxy SDG indicators as well as elements of the Agenda 2063 to support African countries benchmark their progress, to identify priorities for action in order to achieve the 17 SDGs, and to highlight specific challenges facing African nations and sub-regions."/>
    <meta property="og:image" content="<?= URL ?>images/share.png"/>

    <link rel="stylesheet" type="text/css" href="<?= URL ?>font/font-awesome.min.css">
    <link rel="stylesheet" href="<?= URL; ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?= URL; ?>css/animate.css">
    <link rel="stylesheet" href="<?= URL; ?>css/style.css">

    <?php
    if (LANG == 'fr') {
        ?>
        <style>
            .sdg_icon_13{
                 margin-top: -30px !important;
             }
        </style>
        <?php
    }
    ?>
    <style>
        .site-name {
            font-size: 14px !important;
        }
        .navbar-light .navbar-nav .nav-link {
            font-size: 12px !important;
        }
        .dropdown-item {
            font-size: 12px !important;
        }
    </style>


    <?php
    if (isset($this->css)) {
        foreach ($this->css as $css) {
            ?>
            <link rel="stylesheet" href="<?php echo URL . $css; ?>">
            <?php
        }
    }
    ?>

    <link rel="shortcut icon" type="image/x-icon" href="<?= URL; ?>images/icon.ico"/>

</head>

<body>

<div class="pre-loader">
    <img src="<?= URL ?>images/logo.png" class="spin" width="80">
    <div><?=$this->Translate('Loading please wait...');?></div>
</div>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


<div class="overlay"></div>

<input id="js-file-location" type="hidden" value="<?php echo URL; ?>">
<input id="js-site-api" type="hidden" value="<?php echo API; ?>">
<input id="js-site-location" type="hidden" value="<?php echo LINK; ?>">
<input id="lang" type="hidden" value="<?php echo LANG; ?>">


<div class="navigation">
    <nav class="navbar navbar-expand-lg navbar-light bg-white" style="position: relative;top: 7px;">
        <a class="navbar-brand" href="<? LINK ?>">
            <img src="<?= URL ?>images/logo.png" class="logo spin ">
            <span class="site-name"><?= $this->Translate('Africa SDG Index and Dashboards'); ?></span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="mr-auto"></ul>
            <ul class="navbar-nav my-2 my-lg-0 menu-list" data-link="<?php if ($this->lang == 'en') {
                echo WP_API_EN;
            } else {
                echo WP_API_FR;
            } ?>" id="menu">

                <li v-for="(menu,index) in menus" class="nav-item dropdown"
                    v-bind:class="{active: (menu.object_slug == '<?= $menu ?>')}">
                    <a
                            v-if="menu.url == '#'"
                            class="nav-link dropdown-toggle"
                            href="#" id="navbarDropdown"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                        {{menu.title}} <span class="fa fa-caret-down"></span>

                    </a>

                    <a class="nav-link" v-if="menu.url != '#'" :href="menu.url">{{menu.title}} </a>

                    <div v-if="menu.children" class="dropdown-menu sub-menu" aria-labelledby="navbarDropdown">
                        <a
                                class="dropdown-item"
                                v-for="sub_menu in menu.children"
                                :href="sub_menu.url">
                            {{sub_menu.title}}
                        </a>

                    </div>
                </li>

            </ul>

                        <ul class="language-list">
                            <li><a href="#en" v-on:click="selectLang('en')" class="lang-btn" data-lang="en">EN</a></li>
                            <li><a href="#fr" v-on:click="selectLang('fr')" class="lang-btn" data-lang="fr">FR</a></li>
                        </ul>


        </div>
    </nav>
    <div class="sdgLine-1">
        <img src="<?= URL ?>images/sdg-line.png" class="sdg-line">
    </div>
</div>


<!--Social media link -->
<div class="social-medial">

    <a class=""
       href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fafricasdgindex.org%2F&amp;src=sdkpreparse"
       target="_blank">
        <img src="<?= URL ?>images/facebook.png" style="margin-bottom: 5px;width: 21px;border-radius: 50%;">
    </a>

    <a class="twitter-hashtag-button"
       href="https://twitter.com/intent/tweet?text=Examine the challenges facing African nations in achieving the SDGs with the Africa SDG Index and Dashboards. Let's start monitoring progress! http://africasdgindex.org&button_hashtag=AfricaSDGIndex"
       target="_blank">
        <img src="<?= URL ?>images/twitter.png" style="margin-bottom: 5px;width: 21px;border-radius: 50%;">
    </a>

</div>