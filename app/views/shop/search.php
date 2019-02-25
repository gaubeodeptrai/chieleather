<?php
use yii\easyii\modules\catalog\api\Catalog;
use yii\easyii\modules\page\api\Page;
use yii\bootstrap\Html;
use yii\easyii\helpers\Image;
$page = Page::get('page-shop-search');

$this->title = 'Kết quả tìm kiếm';
//$this->params['breadcrumbs'][] = ['label' => 'Shop', 'url' => ['shop/index']];
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
                                <h1>Kết quả tìm kiếm : tìm thấy <?=count($items)?> kết quả</h1>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="breadcrumb-wrap s-color">
                    <div class="container">
                        <ul class="breadcrumbs">
                            <li><a rel="v:url" href="<?=$base?>" class="home">Trang chủ</a>
                            </li>
                            <li><span>Kết quả tìm kiếm</span>
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
                                        <div class="col-md-9 col-sm-12 ">
                            <div class="archive-product-wrap clearfix layout-container">
                                <h4>Sản phẩm</h4>
                                <hr/>
                                <div class="product-listing woocommerce clearfix columns-4">
                                    <?php
                                    foreach ($items as $item):
                                          
                                    ?>
                                    <div class="product-item-wrap post-1555 product type-product status-publish has-post-thumbnail product_cat-birthday-gifts product_cat-illumination product_cat-romantic product_cat-special-goods product_tag-birthday product_tag-illumination product_tag-romatic product_tag-special-goods shipping-taxable purchasable product-type-simple product-cat-birthday-gifts product-cat-illumination product-cat-romantic product-cat-special-goods product-tag-birthday product-tag-illumination product-tag-romatic product-tag-special-goods instock">
                                        
                                        <div class="product-item-inner">
                                            <div class="product-thumb">
                                               
                                                <div class="product-thumb-primary"> 
                                                     <?= Html::img(Image::thumb($item->image, 300, 300,true)) ?>
                                                </div>
                                                <?php
                                                  foreach($item->photos as $photo) :
                                                ?>
                                                <div class="product-thumb-secondary"> 
                                                     <?= Html::img(Image::thumb($photo->image, 300, 300,true)) ?>
                                                </div>
                                                <?php
                                                  endforeach;
                                                ?>
                                                <a class="product-link" href="<?=$base?>/shop/view/<?=$item->slug?>"></a>
                                                
                                            </div>
                                            <div class="product-info">
                                                <div class="star-rating" title="Rated 5 out of 5"><span style="width:100%"><strong class="rating">5</strong> out of 5</span>
                                                </div>
                                                <h3 class="product-name p-font">
                                                    <a href="<?=$base?>/shop/view/<?=$item->slug?>"><?=$item->title?></a>
                                                </h3>
                                                
                                            </div>
                                        </div>
                                    </div>
                                  <?php
                                endforeach;
                                  ?>
                                </div>
                                
                                 
                            </div>
                            
                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <?= $this->render('_search_form', ['text' => $text]) ?>
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
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>




