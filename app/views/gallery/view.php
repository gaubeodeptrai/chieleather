<?php
use yii\easyii\modules\gallery\api\Gallery;
//use yii\helpers\Html;
use yii\bootstrap\Html;
use yii\easyii\helpers\Image;
$this->title = $album->model->title;
//$this->params['breadcrumbs'][] = ['label' => 'Gallery', 'url' => ['gallery/index']];
//$this->params['breadcrumbs'][] = $album->model->title;
$base = Yii::$app->getUrlManager()->getBaseUrl();

?>

<div id="wrapper-content" class="clearfix">
            <div class="section-page-title page-title-margin container">
                <section class="page-title-wrap page-title-height page-title-wrap-bg page-title-center" style="background-image: url(<?=$base?>/image/banner/banner_cat.png)">
                    <div class="page-title-overlay"></div>
                    <div class="container">
                        <div class="page-title-inner block-center">
                            <div class="block-center-inner">
                                <h1><?=$album->model->title?></h1>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="breadcrumb-wrap s-color">
                    <div class="container">
                        <ul class="breadcrumbs">
                            <li><a rel="v:url" href="<?=$base?>" class="home">Trang chủ</a>
                            </li>
                            <li><span><a href="#">Đặt hàng theo mẫu</a></span>
                            </li>
                            <li><span><?=$album->model->title?></span>
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
                                <div id="post-1881" class="post-1881 page type-page status-publish hentry">
                                    <div class="entry-content">
                                        <div class="fullwidth">
                                            <div class="vc_row wpb_row vc_row-fluid">
                                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                                    <div class="vc_column-inner ">
                                                        <div class="wpb_wrapper">
                                                            <div class="portfolio-container">
                                                                <div class="portfolio overflow-hidden    paging" id="portfolio-5806243461aa4">
                                                                  
                                                                    <div class="portfolio-wrapper handmade-col-md-4 col-padding-15 masonry " data-section-id="5806243461aa4" id="portfolio-container-5806243461aa4" data-columns="4">
                                                                       <?php foreach($photos as $photo) : ?>
                                                                        <div class="portfolio-item hover-dir branding home-living knitting  hover-align-center">
                                                                            <div class="entry-thumbnail title-category"> 
                                                                                <?= Html::img(Image::thumb($photo->image, 500,500,true)) ?>
                                                                                <div class="entry-thumbnail-hover p-bg-rgba-color">
                                                                                    <div class="entry-hover-wrapper">
                                                                                        <div class="entry-hover-inner"> <span class="icon-logo"> <a href="<?=$base?><?=$photo->image?>" data-rel="prettyPhoto[pp_gal_22]"  title="<?=$photo->description?>"> <i class="fa fa-search  fc-white"></i> </a> </span>
                                                                                            
                                                                                               <!-- <a href="../portfolio/the-blue/index.html" class="line-height-1">
                                                                                                <div class="title fc-white">đặt mẫu này</div>
                                                                                            </a> -->
                                                                                            <span class="category line-height-1"><?=$photo->description?></span>
                                                                                             
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                       <?php endforeach;?>
                                                                    </div>
                                                                    <div style="clear: both"></div>
                                                                    
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
                <div style="text-align: center"><?= $album->pages() ?></div>
            </main>
        </div>







