<?php
use app\models\AddToCartForm;
//use yii\easyii\modules\catalog\api\Catalog;
//use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
 use yii\easyii\helpers\Image;
//use ijackua\sharelinks\ShareLinks ;
use kartik\social\FacebookPlugin; 
 
$this->title = $item->seo('title', $item->model->title);
//$this->params['breadcrumbs'][] = ['label' => 'Shop', 'url' => ['shop/index']];
//$this->params['breadcrumbs'][] = ['label' => $item->cat->title, 'url' => ['shop/cat', 'slug' => $item->cat->slug]];
//$this->params['breadcrumbs'][] = $item->model->title;
$image = 'http://chiehandmade.com';
$image .= $item->image;
$this->title = $item->seo('title', $item->model->title);
$this->registerMetaTag(['name' => 'description', 'content' => $item->seo('description')]);
$this->registerMetaTag(['name' => 'keywords', 'content' => $item->seo('keywords')]);
$this->registerMetaTag(['property' => 'og:image', 'content' => $image]);
$this->registerMetaTag(['property' => 'og:title', 'content' => $item->title]);
$base = Yii::$app->getUrlManager()->getBaseUrl();
$colors = [];
if(!empty($item->data->color) && is_array($item->data->color)) {
    foreach ($item->data->color as $color) {
        $colors[$color] = $color;
    }
}
?>

<div id="wrapper-content" class="clearfix">
            <div class="section-page-title single-product-title-margin container">
                <section class="page-title-wrap single-product-title-height page-title-wrap-bg page-title-center" style="background-image: url(<?=$base?>/wp-content/uploads/2015/08/news-03-870x580.jpg)">
                    <div class="page-title-overlay"></div>
                    <div class="container">
                        <div class="page-title-inner block-center">
                            <div class="block-center-inner">
                                <h1><?=$item->title?></h1>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="breadcrumb-wrap s-color">
                    <div class="container">
                        <ul class="breadcrumbs">
                            <li><a rel="v:url" href="/" class="home">Trang chủ</a>
                            </li>
                            <li><a rel="v:url" href="#">Shop</a>
                            </li>
                            <li><a rel="v:url" href="/shop/cat/<?=$item->cat->slug?>"><?=$item->cat->title?></a>
                            </li>
                            <li><span><?=$item->title?></span>
                            </li>
                        </ul>
                    </div>
                </section>
            </div>
            <main class="single-product-wrap">
                <div class="container clearfix">
                    <div class="row clearfix">
                        <div class="site-content-single-product col-md-12">
                            <div class="single-product-inner">
                                <div itemscope itemtype="http://schema.org/Product" id="<?=$item->slug?>" class="post-2239 product type-product status-publish has-post-thumbnail product_cat-birthday-gifts sale shipping-taxable product-type-grouped product-cat-birthday-gifts instock">
                                    <div class="single-product-info clearfix">
                                        <div class="single-product-image-wrap">
                                            <div class="single-product-image">
                                                <div class="product-flash-wrap"></div>
                                                <div class="single-product-image-inner">
                                                    <div id="sync1" class="owl-carousel manual">
                                                        <div>
                                                           
                                                            <a href="<?=$base?><?=$item->image?>" itemprop="image" class="woocommerce-main-image" title="" data-rel="prettyPhoto[product-gallery]" data-index="0">
                                                                <?= Html::img(Image::thumb($item->image, 500, 400,true)) ?>
                                                            </a>
                                                        </div>
                                                        <?php foreach($item->photos as $photo) : ?>
                                                        <div>
                                                            <a href="<?=$base?><?=$photo->image?>" itemprop="image" class="woocommerce-main-image" title="" data-rel="prettyPhoto[product-gallery]" data-index="1">
                                                                <?= Html::img(Image::thumb($photo->image, 500, 400,true)) ?>
                                                            </a>
                                                        </div>
                                                        <?php endforeach;?>
                                                    </div>
                                                    <div class="product-thumb-wrap product-image-total-4">
                                                        <div id="sync2" class="owl-carousel manual">
                                                            <div class="thumbnail-image">
                                                                <a href="<?=$base?><?=$item->image?>" itemprop="image" class="woocommerce-thumbnail-image" title="" data-index="0">
                                                                    <?= Html::img(Image::thumb($item->image, 180, 180,true)) ?>
                                                                </a>
                                                            </div>
                                                            <?php foreach($item->photos as $photo) : ?>
                                                            <div class="thumbnail-image">
                                                                <a href="<?=$base?><?=$photo->image?>" itemprop="image" class="woocommerce-thumbnail-image" title="" data-index="1">
                                                                    <?= Html::img(Image::thumb($photo->image, 180, 180,true)) ?>
                                                                </a>
                                                            </div>
                                                            <?php endforeach;?>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                            </div>
                                        </div>
                                        <div class="summary-product-wrap">
                                            <div class="summary-product entry-summary">
                                                <h1 itemprop="name" class="product_title entry-title p-font"><?=$item->title?></h1>
                                                <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                    <p class="price">
                                                        Giá bán : <span class="amount">Liên hệ - hotline : <?=  \yii\easyii\models\Setting::get('tel')?> </span>
                                                    </p>
                                                    
                                                </div>
                                                <div class="product-single-short-description" itemprop="description">
                                                    <p><?=$item->description?></p>
                                                </div>
                                              
                                                <div class="product_meta"> <span class="product-stock-status-wrapper"><label>Tình trạng:</label>
                                                        <?php
                                                          if ($item->available > 0){
                                                              $stock = "Còn hàng";
                                                          }else{
                                                              $stock = "Còn hàng";
                                                          }
                                                        ?>
                                                        <span class="product-stock-status in-stock"><?=$stock?></span></span> 
                                                        <span class="posted_in"><label>Thuộc danh mục :</label> 
                                                            <a href="<?=$base?>/shop/cat/<?=$item->cat->slug?>" rel="tag">
                                                                <?=$item->cat->title?>
                                                            </a>.
                                                        </span>
                                                </div>
                                                
                                                    <label>Chia sẻ:</label>
                                                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                                     <div class="addthis_sharing_toolbox"></div>
                                                    <?php
                                                     $this->registerJsFile('//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f06d29a7949b788');
                                                    ?>
                                                      <!-- Go to www.addthis.com/dashboard to customize your tools -->


                                               
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="related products">
                                        <h4 class="widget-title" style="font-size:25px; font-family: serif"><span >Sản phẩm cùng chuyên mục</span></h4>
                                        <div class="product-listing woocommerce clearfix product-slider">
                                            <div class="owl-carousel" data-plugin-options='{"items" :4,"pagination" : false, "navigation" : true,"itemsDesktop" : [1199,4], "itemsDesktopSmall" : [980,3], "itemsTablet" : [768, 3], "itemsTabletSmall": [600, 2]}'>
                                               <?php
                                                 $products_lienquan = \yii\easyii\modules\catalog\models\Item::find()
                                                         ->where(['status'=>1])
                                                         ->andWhere('category_id = '.$item->cat->category_id.'')
                                                         ->andWhere('item_id <> '.$item->id.'')
                                                         ->all();
                                                 foreach ($products_lienquan as $item):
                                               ?> 
                                                <div class="product-item-wrap rating-visible post-1546 product type-product status-publish has-post-thumbnail product_cat-birthday-gifts product_cat-greeting-cards product_cat-illumination product_tag-birthday product_tag-greeting-cards sale shipping-taxable purchasable product-type-simple product-cat-birthday-gifts product-cat-greeting-cards product-cat-illumination product-tag-birthday product-tag-greeting-cards instock">
                                                    <div class="product-item-inner">
                                                        <div class="product-thumb">
                                                            
                                                            <div class="product-thumb-primary"> 
                                                                
                                                                 <?= Html::img(Image::thumb($item->image, 300, 300,true)) ?>
                                                            </div>
                                                              <?php
                                                             if (count($item->photos)){
                                                               foreach($item->photos as $photo) : 
                                                              ?>
                                                            <div class="product-thumb-secondary"> 
                                                                <?= Html::img(Image::thumb($photo->image, 300, 300,true)) ?> 
                                                            </div>
                                                            <?php
                                                             endforeach;
                                                             }
                                          
                                                            ?>
                                                            <a class="product-link" href="<?=$base?>/shop/view/<?=$item->slug?>"></a>
                                                           
                                                        </div>
                                                        <div class="product-info">
                                                            <div class="star-rating" title="Rated 4.33 out of 5"><span style="width:86.6%"><strong class="rating">4.33</strong> out of 5</span>
                                                            </div>
                                                            <h3 class="product-name p-font"><a href="<?=$base?>/shop/view/<?=$item->slug?>"><?=$item->title?></a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                
                                               <?php endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                    <meta itemprop="url" content="<?=$base?>/shop/view/<?=$item->slug?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>






