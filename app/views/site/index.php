<?php
//use yii\easyii\modules\article\api\Article;
use yii\easyii\modules\carousel\api\Carousel;
use yii\easyii\modules\gallery\api\Gallery;
use yii\easyii\modules\guestbook\api\Guestbook;
//use yii\easyii\modules\news\api\News;
use yii\easyii\modules\page\api\Page;
use yii\easyii\modules\text\api\Text;
use yii\helpers\Html;
use yii\easyii\helpers\Image;
use yii\easyii\modules\catalog\models\Item;
use yii\easyii\modules\catalog\models\Category;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\models\AddToCartForm;

$addToCartForm = new AddToCartForm();

$page = Page::get('page-index');
$base = Yii::$app->getUrlManager()->getBaseUrl();
$this->title = $page->seo('title', $page->model->title);
$this->registerMetaTag(['name' => 'description', 'content' => $page->seo('description')]);
$this->registerMetaTag(['name' => 'keywords', 'content' => $page->seo('keywords')]);

function total_products($cat_id = 1){
 $count_sub = yii\easyii\modules\catalog\models\Category::find()
                     ->where(['tree'=>$cat_id])
                     ->andWhere('depth > 0')
                     ->count();  
 $dem = 0;
if ($count_sub > 0){ 
 $cat_item = yii\easyii\modules\catalog\models\Category::find()->where(['tree'=>$cat_id])->andWhere('status = 1')->all();
 
       foreach ($cat_item as $cat_item):
           //$dem++;
           $list_sp = \yii\easyii\modules\catalog\models\Item::find()->where(['category_id'=>$cat_item->category_id])->all();

            foreach ($list_sp as $item):
               $dem++;
               //echo $this->render('_item', ['item' => $item]);     
             endforeach;    
        endforeach;
}else{
    $list_sp = \yii\easyii\modules\catalog\models\Item::find()->where(['category_id'=>$cat_id])->all();

            foreach ($list_sp as $item):
               $dem++;
               //echo $this->render('_item', ['item' => $item]);     
             endforeach;    
}       
  return $dem;  
}
?>

<div id="wrapper-content" class="clearfix">
    <main class="site-content-page">
        <div class="site-content-page-inner ">
            <div class="page-content">
                <div id="post-30" class="post-30 page type-page status-publish hentry">
                    <div class="entry-content">
                        <div class="container">
                            <div class="vc_row wpb_row vc_row-fluid vc_custom_1443867642165">
                                <div class="col-md-9 col-sm-12 sm-margin-bottom-30 wpb_column vc_column_container vc_col-sm-9">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="handmade-banner custom   bot-left">
                                                <div id="wowslider-container1" >
                                                <div class="ws_images">
                                                    <ul>
                                                       <?php
                                                       $slider = yii\easyii\modules\carousel\models\Carousel::find()
                                                               ->orderBy(['order_num'=> SORT_ASC])
                                                               ->all();
                                                       foreach ($slider as $item):
                                                       ?> 
                                                      <li><img src="<?=$base?><?=$item->image?>"   alt="Responsive Photo Gallery"  id="wows1_0"/></li>
                                                      <?php
                                                     endforeach;
                                                      ?>
                                                    
                                                    </ul>
                                                </div>
                                                <div class="ws_bullets">
                                                    <div>
                                                      <?php
                                                       $slider = yii\easyii\modules\carousel\models\Carousel::find()
                                                               ->all();
                                                       foreach ($slider as $item):
                                                       ?>   
                                                        <a href="#" title="Bell Pepper"><span>
                                                                 <?= Html::img(Image::thumb($item->image, 92, 48,true)) ?></span></a>
                                                       <?php endforeach;?>
                                                    </div>
                                                </div>
                                                <div class="ws_shadow"></div>
                                                </div>	
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12 wpb_column vc_column_container vc_col-sm-3">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div data-height="390" class="sc-product-categories-home-wrap p-color-bg style-02  ">
                                                <ul class="product-categories-home">
                                                     <?php
                                                      $menu_cats_pro = \yii\easyii\modules\catalog\models\Category::find()
                                                                  ->where(['status'=>1])
                                                                  ->andWhere(['depth'=>0])
                                                                  ->orderBy(['order_num'=> SORT_DESC])
                                                                  ->all();
                                                       foreach ($menu_cats_pro as $item):
                                                       $total_products = total_products($item->category_id);

                                                     ?>

                                                    <li><h1 style="margin-top:-20px"><a href="<?=$base?>/shop/cat/<?=$item->slug?>" title="<?=$item->title?>"><?=$item->title?> (<?=$total_products;?>)</a></h1></li>
                                                    <?php
                                                      endforeach;
                                                    ?>
                                                </ul> <a class="show-more"><i class="fa fa-angle-down"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container" style="margin-top: 20px">
                            <div class="vc_row wpb_row vc_row-fluid">
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div id="5805cd8b81d81" data-columns="3" class="woocommerce sc-product-wrap   product-creative">
                                                <h3 class="sc-title s-font"><span>Sản phẩm mới</span></h3> 
                                                  <a href="javascript:;" class="iso-filter" data-section-id="5805cd8b81d81" data-page="1" data-total-product="12" data-total-pages="2" data-navigation="prev">
                                                      <span class="prev"><i class='fa fa-angle-left'></i></span></a> 
                                                      <a href="javascript:;" class="iso-filter" data-section-id="5805cd8b81d81" data-page="1" data-total-product="12" data-total-pages="2" data-navigation="next">
                                                          <span class="next"><i class='fa fa-angle-right'></i></span>
                                                      </a>
                                                <div class="product-listing woocommerce clearfix">
                                                    <?php
                                                      $new_products = Item::find()
                                                              ->where('status = 1')
                                                              ->limit(18)
                                                              ->orderBy(['time'=> SORT_DESC])
                                                              
                                                              ->all();
                                                      $dem = 0;
                                                      foreach ($new_products as $item):
                                                          $dem++;
                                                          $i = $dem+3;
                                                      if ($dem==1 || $dem==4 || $dem==7|| $dem==10 || $dem==13 || $dem==16 || $dem==19 || $dem==22 || $dem==25 || $dem==28 || $dem==31){
                                                         $col =  '';
                                                         $site = 'double-size';
                                                         $font = 'style="font-size: 18px"';
                                                      }else{
                                                         $col = 'col-md-3';
                                                         $site = '';
                                                         $font = '';
                                                      }
                                                    ?>
                                                    <div class="product-item-wrap rating-visible <?=$col?> col-md-6 col-sm-6 col-xs-6">
                                                        <div class="product-item-inner <?=$site?>">
                                                            <div class="product-thumb">
                                                                <a href="<?=$base?>/shop/view/<?=$item->slug?>">
                                                                    <div class="product-thumb-primary">
                                                                        <?= Html::img(Image::thumb($item->image, 600, 600,true)) ?>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="product-info"  style="background-color: rgba(255, 255, 255, 0.7);">
                                                                <h2 class="product-name p-font">
                                                                    <a href="<?=$base?>/shop/view/<?=$item->slug?>" <?=$font?> >
                                                                        <?=$item->title?>
                                                                    </a>
                                                                </h2>
                                                            </div>
                                                        </div>
                                                    </div>

                                                   <?php endforeach;?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="vc_row wpb_row vc_row-fluid">
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="vc_tta-container" data-vc-action="collapse">
                                                <h3></h3>
                                              
                                            </div>
                                              <div class="vc_general vc_tta vc_tta-tabs vc_tta-color-grey vc_tta-style-tab_style1 vc_tta-shape-square vc_tta-o-shape-group vc_tta-gap-20 vc_tta-o-no-fill vc_tta-tabs-position-top vc_tta-controls-align-right">
                                                    <div class="vc_tta-tabs-container">
                                                        <ul class="vc_tta-tabs-list">
                                                            <?php
                                                            $hang_mau = Category::find()
                                                                    ->where('status = 1')
                                                                    ->andWhere('depth = 0')
                                                                    ->all();
                                                            $mau = 0;
                                                            foreach ($hang_mau as $item):
                                                                $mau++;
                                                            if ($mau==1)
                                                            {
                                                               $active = 'vc_active'; 
                                                            }else{
                                                               $active = ''; 
                                                            }
                                                          
                                                                          //echo $count_sub;
                                                            
                                                          ?>  
                                                            <li class="vc_tta-tab <?=$active?>" data-vc-tab><a href="#<?=$item->slug?>" data-vc-tabs data-vc-container=".vc_tta"><span class="vc_tta-title-text"><?=$item->title?></span></a></li>
                                                          <?php
                                                            
                                                           endforeach;
                                                          ?>  
                                                        </ul>
                                                    </div>
                                                    <div class="vc_tta-panels-container">
                                                        <div class="vc_tta-panels">
                                                            <?php
                                                              $sp_mau = Category::find()
                                                                    ->where('status = 1')
                                                                    ->all();
                                                            $mau_sp = 0;  
                                                            
                                                            foreach ($sp_mau as $item):
                                                                $mau_sp++;
                                                             $count_sub = Category::find()->where('depth > 0')->andWhere(['tree'=>$item->category_id])->count();
                                                             //echo $count_sub;
                                                            if ($mau_sp==1)
                                                            {
                                                               $active_sp = 'vc_active'; 
                                                            }else{
                                                               $active_sp = ''; 
                                                            }
                                                            
                                                            
                                                            ?>
                                                            <div class="vc_tta-panel <?=$active_sp?>" id="<?=$item->slug?>" data-vc-content=".vc_tta-panel-body">
                                                                <div class="vc_tta-panel-heading">
                                                                    <h4 class="vc_tta-panel-title"><a href="#<?=$item->slug?>" data-vc-accordion data-vc-container=".vc_tta-container">
                                                                            <span class="vc_tta-title-text"><?=$item->title?></span></a>
                                                                    </h4>
                                                                </div>
                                                                <div class="vc_tta-panel-body">
                                                                    <div class="woocommerce sc-product-wrap   no-title">
                                                                        <div class="product-listing woocommerce clearfix columns-4">
                                                                          <?php
                                                                          $count = 0;
                                                                          
                                                                          if ($count_sub == 0){
                                                                                  $list_sp = Item::find()
                                                                                          ->where(['category_id'=>$item->category_id])
                                                                                          ->orderBy(['time'=> SORT_DESC])
                                                                                          
                                                                                          ->all();
                                                                                  foreach ($list_sp as $item):
                                                                               $count++;
                                                                         
                                                                            if ($count > 8)
                                                                            {
                                                                              echo "";  
                                                                            }
                                                                            else{
                                                                            ?> 
                                                                            <div class="product-item-wrap rating-visible post-2239 product type-product status-publish has-post-thumbnail product_cat-birthday-gifts sale shipping-taxable product-type-grouped product-cat-birthday-gifts instock">
                                                                                <div class="product-item-inner">
                                                                                    <div class="product-thumb">
                                                                                        <div class="product-flash-wrap"></div>
                                                                                        <div class="product-thumb-primary"> 
                                                                                          <a href="<?=$base?><?=$item->image?>" itemprop="image" class="woocommerce-main-image" title="" data-rel="prettyPhoto[product-gallery]" data-index="0">
                                                                                            <?= Html::img(Image::thumb($item->image, 300, 300,true)) ?>
                                                                                           </a>    
                                                                                            
                                                                                        </div>
                                                                                      
                                                                                     
                                                                                    </div>
                                                                                    <div class="product-info">
                                                                                        <h3 class="product-name p-font"><a href="<?=$base?>/shop/view/<?=$item->slug?>"><?=$item->title?></a></h3>
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                          <?php
                                                                            }
                                                                          endforeach;
                                                                          ?>
                                                                          <?php  
                                                                          }
                                                                          else{
                                                                             $cat_item = yii\easyii\modules\catalog\models\Category::find()->where(['tree'=>$item->tree])->andWhere('status = 1')->all();
                                                                              foreach ($cat_item as $cat_item):
                                                                                
                                                                                  $list_sp_has_sub = Item::find()->where(['category_id'=>$cat_item->category_id])->limit(3)->orderBy(['time'=> SORT_DESC])->all();
                                                                                  //$list_sp = array_push($list_sp,$list);
                                                                              
                                                                             
                                                                          
                                                                           foreach ($list_sp_has_sub as $photo):
                                                                               $count++;
                                                                          ?>  
                                                                           <?php
                                                                            if ($count > 8)
                                                                            {
                                                                              echo "";  
                                                                            }
                                                                            else{
                                                                            ?> 
                                                                            <div class="product-item-wrap rating-visible post-2239 product type-product status-publish has-post-thumbnail product_cat-birthday-gifts sale shipping-taxable product-type-grouped product-cat-birthday-gifts instock">
                                                                                <div class="product-item-inner">
                                                                                    <div class="product-thumb">
                                                                                        <div class="product-flash-wrap"></div>
                                                                                        <div class="product-thumb-primary"> 
                                                                                          <a href="<?=$base?><?=$photo->image?>" itemprop="image" class="woocommerce-main-image" title="" data-rel="prettyPhoto[product-gallery]" data-index="0">
                                                                                            <?= Html::img(Image::thumb($photo->image, 300, 300,true)) ?>
                                                                                           </a>    
                                                                                            
                                                                                        </div>
                                                                                      
                                                                                     
                                                                                    </div>
                                                                                    <div class="product-info">
                                                                                        <h3 class="product-name p-font"><a href="<?=$base?>/shop/view/<?=$photo->slug?>"><?=$photo->title?></a></h3>
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                          <?php
                                                                            }
                                                                          endforeach;
                                                                         endforeach;
                                                                          }
                                                                          ?>
                                                                            
                                                                        </div>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                           <?php
                                                           
                                                        endforeach;
                                                           ?>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                      <div class="container">
                            <div class="vc_row wpb_row vc_row-fluid margin-bottom-80 vc_custom_1444636519242">
                                <div class="col-md-6 col-sm-6 sm-margin-bottom-30 wpb_column vc_column_container vc_col-sm-3">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="handmade-banner custom-button  ">
                                                <div class="bg-img" style="height:269px; background-image: url(<?=$base?>/image/dathang.png);"></div>
                                                <div class="overlay-banner">
                                                    <a class='link-banner' title="Giftcards" target="_self" href="#">
                                                        <div class="content-middle">
                                                            <div class="content-middle-inner"> <span class="handmade-button style1 button-1x"> Đặt hàng online <i class="pe-7s-right-arrow"></i> </span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6 sm-margin-bottom-30 wpb_column vc_column_container vc_col-sm-3">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="handmade-banner custom-button  ">
                                                <div class="bg-img" style="height:269px; background-image: url(<?=$base?>/image/phukien.jpg);"></div>
                                                <div class="overlay-banner">
                                                    <a class='link-banner' title="Accessories" target="_self" href="#">
                                                        <div class="content-middle">
                                                            <div class="content-middle-inner"> <span class="handmade-button style1 button-1x"> Phụ kiện handmade <i class="pe-7s-right-arrow"></i> </span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>



                        <div class="container">
                            <div class="vc_row wpb_row vc_row-fluid margin-bottom-40">
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="handmade-post ">
                                                <h2>Chie videos</h2>
                                                <div class="handmade-line"></div>
                                                <div class="row">
                                                    <div data-plugin-options='{&quot;autoPlay&quot;: true, &quot;items&quot;:3,&quot;itemsDesktop&quot;:[1199, 3],&quot;itemsDesktopSmall&quot;:[980, 3],&quot;itemsTablet&quot;:[768, 1], &quot;pagination&quot;:false, &quot;navigation&quot;:true}' class="owl-carousel">
                                                        <?php
                                                         $news = app\modules\blog\models\News::find()
                                                                 ->where('status = 1')
																 ->orderBy('time desc')
                                                                 ->all();
                                                         foreach ($news as $item):
                                                          if ($item->youtube_key <> ''){
                                                        ?>
                                                        <div class="handmade-post-item">
                                                            <div class="handmade-post-image" style="text-align: center; padding-top: 90px; background-image: url('https://img.youtube.com/vi/<?=$item->youtube_key?>/hqdefault.jpg'); height: 220px">


                                                               <a data-rel="prettyPhoto" href="https://www.youtube.com/watch?v=<?=$item->youtube_key?>" class="prettyPhoto"><i class="fa fa-play-circle-o fa-5x"></i></a>

                                                            </div>

                                                            <div class="handmade-post-content">
                                                                <h3><a href="<?=$base?>/blog/view/<?=$item->slug?>" rel="bookmark" title="Video Post"><?=$item->title?> </a></h3>

                                                                <p><?=$item->short?></p>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        }
                                                        else{
                                                        ?>
                                                          <div class="handmade-post-item">
                                                            <div class="handmade-post-image" >
                                                                <a href="<?=$base?>/blog/view/<?=$item->slug?>">
                                                                    <?= Html::img(Image::thumb($item->image, 350,220,true)) ?>
                                                                </a> 
                                                            </div>

                                                            <div class="handmade-post-content">
                                                                <h3><a href="<?=$base?>/blog/view/<?=$item->slug?>" title="<?=$item->title?>"><?=$item->title?></a></h3>

                                                                <p><?=$item->short?></p>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        }
                                                        endforeach;?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fullwidth">
                            <div class="vc_row wpb_row vc_row-fluid">
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_100 vc_sep_pos_align_center vc_separator_no_text"><span class="vc_sep_holder vc_sep_holder_l"><span  style="border-color:#eeeeee;" class="vc_sep_line"></span></span><span class="vc_sep_holder vc_sep_holder_r"><span  style="border-color:#eeeeee;" class="vc_sep_line"></span></span>
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