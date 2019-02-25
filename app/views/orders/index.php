<?php
//use yii\easyii\modules\guestbook\api\Guestbook;
use app\modules\orders\api\Guestbook;
use yii\easyii\modules\page\api\Page;

$page = Page::get('page-guestbook');
$base = Yii::$app->getUrlManager()->getBaseUrl();
$this->title = 'Đặt hàng online';
//$this->params['breadcrumbs'][] = $page->model->title;
?>

<div id="wrapper-content" class="clearfix">
            <div class="section-page-title page-title-margin container">
                <section class="page-title-wrap page-title-height page-title-wrap-bg page-title-center" style="background-image: url(<?=$base?>/image/banner/bg-page-title.jpg)">
                    <div class="page-title-overlay"></div>
                    <div class="container">
                        <div class="page-title-inner block-center">
                            <div class="block-center-inner">
                                <h1>Đặt hàng</h1>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="breadcrumb-wrap s-color">
                    <div class="container">
                        <ul class="breadcrumbs">
                            <li><a rel="v:url" href="<?=$base?>" class="home">Trang chủ</a>
                            </li>
                            <li><span>Đặt hàng online</span>
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
                                        <div class="col-md-5 col-sm-12 sm-margin-bottom-30 wpb_column vc_column_container vc_col-sm-6">
                                            fsdfsdf
                                        </div>
                                        <div class="col-md-7 col-sm-12 wpb_column vc_column_container vc_col-sm-6">
                                            <div class="vc_column-inner ">
                                                <div class="wpb_wrapper">
                                                    <div role="form" class="wpcf7" id="wpcf7-f1575-p62-o1" lang="en-US" dir="ltr">
                                                        <div class="screen-reader-response"></div>
                                                        <?php if(Yii::$app->request->get(Guestbook::SENT_VAR)) : ?>
            <h4 class="text-success"><i class="glyphicon glyphicon-ok"></i> Message successfully added</h4>
        <?php else : ?>
            <h4>Leave message</h4>
            <div>
                 <?= Guestbook::form() ?>
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
