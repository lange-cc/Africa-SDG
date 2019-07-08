<div id="faqs_page">
    <div class="faqs-heading">
        <?=$this->Translate('Frequently Asked Questions');?>
    </div>
    <div class="container">
<!--        <h1>Frequently Asked Questions</h1>-->
        <h4><?=$this->Translate('Table of Contents');?></h4>
        <ul class="table-of-contents">
            <li v-for="article in faqsData" :key="article.id" v-on:click="scoll('content_'+article.id)"><a>{{article.title}}</a></li>
        </ul>
        <div class="faqs-content">
            <div class="article" v-for="item in faqsData" :id="'content_'+item.id">
                <h5 class="article-title">{{item.title}}</h5>
                <p class="article-question" v-html="item.content"></p>
            </div>
        </div>
    </div>
</div>

