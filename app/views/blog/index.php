<?php
use yii\easyii\modules\news\api\News;
use yii\easyii\modules\page\api\Page;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\easyii\helpers\Image;

$page = Page::get('page-news');
$base = Yii::$app->getUrlManager()->getBaseUrl();
$this->title = $page->seo('title', $page->model->title);
//$this->params['breadcrumbs'][] = $page->model->title;
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
                            <li><span>Chie Blogs</span>
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
                                                                    <div class="blog-inner clearfix blog-style-masonry blog-paging-load-more blog-col-3">
                                                                        <?php 
                                                                        $blogs = \app\modules\blog\models\News::find()
                                                                                ->where('status =1')
                                                                                ->all();
                                                                          foreach($blogs as $item) : 
                                                                            if ($item->youtube_key){
                                                                        ?>
                                                                        
                                                                        <article id="post-2761" class="clearfix post-2761 post type-post status-publish format-video hentry category-uncategorized post_format-post-format-video">
                                                                            <div class="entry-thumbnail-wrap">
                                                                                <div class="embed-responsive embed-responsive-16by9 embed-responsive-full">
                                                                                    <iframe width="500" height="281" src="https://www.youtube.com/embed/<?=$item->youtube_key?>?feature=oembed" frameborder="0"></iframe>
                                                                                </div>
                                                                            </div>
                                                                            <div class="entry-content-wrap">
                                                                                <h3 class="entry-title p-font"> <a href="<?=$base?>/blog/view/<?=$item->slug?>" rel="bookmark" title="Video Post"><?=$item->title?></a></h3>
                                                                                <?=$item->short?>
                                                                            </div>
                                                                        </article>
                                                                        <?php
                                                                         }else{
                                                                        ?>
                                                                        <article id="post-447" class="clearfix post-447 post type-post status-publish format-standard has-post-thumbnail hentry category-food category-nature tag-destination tag-nature">
                                                                            <div class="entry-thumbnail-wrap">
                                                                                <div class="entry-thumbnail">
                                                                                    <a href="<?=$base?>/blog/view/<?=$item->slug?>" title="<?=$item->title?>" class="entry-thumbnail_overlay"> 
                                                                                        <?= Html::img(Image::thumb($item->image, 500,330,true)) ?>
                                                                                    </a> <a data-rel="prettyPhoto" href="<?=$base?><?=$item->image?>" class="prettyPhoto"><i class="fa fa-expand"></i></a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="entry-content-wrap">
                                                                                <h3 class="entry-title p-font"> <a href="<?=$base?>/blog/view/<?=$item->slug?>" rel="bookmark" title="<?=$item->title?>"><?=$item->title?></a></h3>
                                                                                
                                                                                <div class="entry-excerpt">
                                                                                    <?=$item->short?>
                                                                                </div>
                                                                            </div>
                                                                        </article>
                                                                         <?php } ?>
                                                                      <?php endforeach;?>
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
                </div>
            </main>
        </div>


