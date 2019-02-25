<?php
use yii\easyii\modules\feedback\api\Feedback;
use yii\easyii\modules\page\api\Page;

$page = Page::get('page-payment');

$this->title = 'Thanh toán';
//$this->params['breadcrumbs'][] = $page->model->title;
$base = Yii::$app->getUrlManager()->getBaseUrl();
?>

<div id="wrapper-content" class="clearfix">
            <div class="section-page-title page-title-margin container">
                <section class="page-title-wrap page-title-height page-title-wrap-bg page-title-center" style="background-image: url(<?=$base?>/image/banner/bg-page-title.jpg)">
                    <div class="page-title-overlay"></div>
                    <div class="container">
                        <div class="page-title-inner block-center">
                            <div class="block-center-inner">
                                <h1>Hướng dẫn thanh toán</h1>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="breadcrumb-wrap s-color">
                    <div class="container">
                        <ul class="breadcrumbs">
                            <li><a rel="v:url" href="/" class="home">Trang chủ</a>
                            </li>
                            <li><span>Thanh toán</span>
                            </li>
                        </ul>
                    </div>
                </section>
            </div>
            <main class="site-content-page">
                <div class="site-content-page-inner ">
                    <div class="page-content">
                        <div id="post-62" class="post-62 page type-page status-publish hentry">
                            <div class="entry-content">
                                <div class="container">
                                    <div class="vc_row wpb_row vc_row-fluid">
                                        <div class="col-md-6 col-sm-12 sm-margin-bottom-30 wpb_column vc_column_container vc_col-sm-6">
                                            <ul class="footer-contact-us">
                                                    <li> <i class="fa fa-map-marker p-color"></i> <span> <?=  \yii\easyii\models\Setting::get('address')?></span></li>
                                                    <li> <i class="fa fa-envelope p-color"></i> <span> <?=  \yii\easyii\models\Setting::get('email')?> </span></li>
                                                    <li> <i class="fa fa-phone p-color"></i> <span> <a href="tel:<?=  \yii\easyii\models\Setting::get('tel')?>"><?=  \yii\easyii\models\Setting::get('tel')?> </a></span></li>
                                                    <li> <i class="fa fa-facebook p-color"></i> <span> 
                                                      <a href="<?=  \yii\easyii\models\Setting::get('facebook')?>" target="_blank">      
                                                        <?=  \yii\easyii\models\Setting::get('facebook')?> 
                                                      </a>    
                                                     </span></li>
                                                </ul>
                                        </div>
                                        <div class="col-md-6 col-sm-12 sm-margin-bottom-30 wpb_column vc_column_container vc_col-sm-6">
                                           <?=$page->model->text?>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>


