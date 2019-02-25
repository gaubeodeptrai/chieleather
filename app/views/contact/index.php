<?php
use yii\easyii\modules\feedback\api\Feedback;
use yii\easyii\modules\page\api\Page;

$page = Page::get('page-contact');

$this->title = $page->seo('title', $page->model->title);
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
                                <h1>Liên hệ</h1>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="breadcrumb-wrap s-color">
                    <div class="container">
                        <ul class="breadcrumbs">
                            <li><a rel="v:url" href="/" class="home">Trang chủ</a>
                            </li>
                            <li><span>Liên hệ</span>
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
                                     <h3>Chie Handmade shop : </h3>
                                     
                                    <div class="vc_row wpb_row vc_row-fluid">
                                        
                                        <div class="col-md-6 col-sm-12 sm-margin-bottom-30 wpb_column vc_column_container vc_col-sm-6">
                                            <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1h3dX2PxY7npqJPTLuEEMW7dX_RU" width="100%" height="480"></iframe>
                                        </div>
                                        <div class="col-md-6 col-sm-12 wpb_column vc_column_container vc_col-sm-6">
                                            
                                            <div class="vc_column-inner ">
                                                <div class="wpb_wrapper">
                                                    <h5>Nội dung góp ý</h5>
                                                    <div role="form" class="wpcf7" id="wpcf7-f1575-p62-o1" lang="en-US" dir="ltr">
                                                        <div class="screen-reader-response"></div>
                                                         <?php if(Yii::$app->request->get(Feedback::SENT_VAR)) : ?>
            <h4 class="text-success"><i class="glyphicon glyphicon-ok"></i> Message successfully sent</h4>
        <?php else : ?>
            <div>
                <?= Feedback::form() ?>
            </div>
        <?php endif; ?>
                                                        
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


