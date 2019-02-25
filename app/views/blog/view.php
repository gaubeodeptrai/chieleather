<?php
use yii\easyii\modules\news\api\News;
use yii\helpers\Url;

$base = Yii::$app->getUrlManager()->getBaseUrl();
$this->title = $news->seo('title', $news->model->title);
$image = 'http://chiehandmade.com';
$image .= $news->image;
$this->registerMetaTag(['name' => 'description', 'content' => $news->seo('description')]);
$this->registerMetaTag(['name' => 'keywords', 'content' => $news->seo('keywords')]);
$this->registerMetaTag(['property' => 'og:image', 'content' => $image]);
$this->registerMetaTag(['property' => 'og:title', 'content' => $news->title]);
$base = Yii::$app->getUrlManager()->getBaseUrl();
//$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['news/index']];
//$this->params['breadcrumbs'][] = $news->model->title;
?>

<div id="wrapper-content" class="clearfix">
            <div class="section-page-title page-title-margin container">
                <section class="page-title-wrap page-title-height page-title-wrap-bg page-title-center" style="background-image: url(<?=$base?>/image/banner/bg-page-title.jpg)">
                    <div class="page-title-overlay"></div>
                    <div class="container">
                        <div class="page-title-inner block-center">
                            <div class="block-center-inner">
                                <h1><?=$this->title?></h1>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="breadcrumb-wrap s-color">
                    <div class="container">
                        <ul class="breadcrumbs">
                            <li><a rel="v:url" href="/" class="home">Trang chủ</a>
                            </li>
                            <li><span><a href="/blog/">Chie Blogs</a></span>
                            </li>
                            <li><span><?=$news->title?></span>
                            </li>
                        </ul>
                    </div>
                </section>
            </div>
            <main class="site-content-page">
                <div class="container clearfix">
                    <div class="row clearfix">
                        <div class="site-content-page-inner col-md-12">
                            <div class="page-content">
                                <div id="post-2093" class="post-2093 page type-page status-publish hentry">
                                    <div class="entry-content">
                                        <div class="container">
                                            <div class="vc_row wpb_row vc_row-fluid">
                                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                                    <div class="vc_column-inner ">
                                                        <div class="wpb_wrapper">
                                                            <div class="shortcode-blog-wrap  ">
                                                                <div class="blog-wrap masonry">
                                                                  <h1><?= $news->seo('h1', $news->title) ?></h1>  
                                                                   <?= $news->text ?>

<?php if(count($news->photos)) : ?>
    <div>
        <h4>Photos</h4>
        <?php foreach($news->photos as $photo) : ?>
            <?= $photo->box(100, 100) ?>
        <?php endforeach;?>
        <?php News::plugin() ?>
    </div>
    <br/>
<?php endif; ?>
<p>
    <?php foreach($news->tags as $tag) : ?>
        <a href="<?= Url::to(['/news', 'tag' => $tag]) ?>" class="label label-info"><?= $tag ?></a>
    <?php endforeach; ?>
</p>

<div class="small-muted">Views: <?= $news->views?></div>
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
                        </div>
                    </div>
                </div>
            </main>
        </div>




