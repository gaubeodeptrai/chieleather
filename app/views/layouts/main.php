<?php
use yii\easyii\modules\shopcart\api\Shopcart;
use yii\easyii\modules\subscribe\api\Subscribe;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use yii\easyii\helpers\Image;
use yii\helpers\Html;
use dosamigos\google\maps\LatLng;
//use dosamigos\google\maps\services\DirectionsWayPoint;
//use dosamigos\google\maps\services\TravelMode;
use dosamigos\google\maps\overlays\PolylineOptions;
use dosamigos\google\maps\services\DirectionsRenderer;
//use dosamigos\google\maps\services\DirectionsService;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;
//use dosamigos\google\maps\services\DirectionsRequest;
use dosamigos\google\maps\overlays\Polygon;

$goodsCount = count(Shopcart::goods());
$base = Yii::$app->getUrlManager()->getBaseUrl();


?>
<?php $this->beginContent('@app/views/layouts/base.php'); ?>
  
  <header id="header-mobile" class="mobile-header header-mobile-2">
            <div class="header-mobile-before">
                <a href="<?=$base?>" title="Chie HandMade"> <img src="<?=$base?>/image/logo/logo_mobile.png" alt="Chie HandMade" /> </a>
            </div>
            <div class="header-container-wrapper menu-drop-fly header-mobile-sticky">
                <div class="container header-mobile-wrapper">
                    <div class="header-mobile-inner">
                        <div class="toggle-icon-wrapper toggle-mobile-menu" data-ref="nav-menu-mobile" data-drop-type="fly">
                            <div class="toggle-icon"> <span></span></div>
                        </div>
                        <div class="header-customize">
                            <div class="search-button-wrapper header-customize-item"> <a class="icon-search-menu" href="#" data-search-type="standard"><i class="wicon fa fa-search"></i></a></div>
                            <div class="shopping-cart-wrapper header-customize-item no-price style-default">
                                <div class="widget_shopping_cart_content">
                                    <div class="widget_shopping_cart_icon"> <i class="wicon fa fa-phone"></i> </div>
                                    <div class="sub-total-text"><span class="amount">&#36;0.00</span></div>
                                    <div class="cart_list_wrapper ">
                                        <ul class="cart_list product_list_widget ">
                                            <li class="empty">
                                                
                                                <h5> <?=  \yii\easyii\models\Setting::get('address')?></h5>
                                                <h5><a href="tel:<?=  \yii\easyii\models\Setting::get('tel')?>"><?=  \yii\easyii\models\Setting::get('tel')?></a></h5>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                                      $active_home = '';
                                      if (Yii::$app->controller->id == 'site'){
                                          $active_home = 'current-menu-ancestor current-menu-parent'; 
                                          $active_about = '';
                                          $active_product = '';
                                          $active_gallery = '';
                                          $active_blog = '';
                                          $active_contact = '';
                                          $active_payment = '';
                                      }
                                      else
                                         if (Yii::$app->controller->id == 'about'){
                                          $active_home = ''; 
                                          $active_about = 'current-menu-ancestor current-menu-parent';
                                          $active_product = '';
                                          $active_gallery = '';
                                          $active_blog = '';
                                          $active_contact = '';
                                          $active_payment = '';
                                      } 
                                      else
                                         if (Yii::$app->controller->id == 'shop'){
                                          $active_home = ''; 
                                          $active_about = '';
                                          $active_product = 'current-menu-ancestor current-menu-parent';
                                          $active_gallery = '';
                                          $active_blog = '';
                                          $active_contact = '';
                                          $active_payment = ''; 
                                         }  
                                      else
                                        if (Yii::$app->controller->id == 'shop'){
                                          $active_home = ''; 
                                          $active_about = '';
                                          $active_product = 'current-menu-ancestor current-menu-parent';
                                          $active_gallery = '';
                                          $active_blog = '';
                                          $active_contact = '';
                                          $active_payment = ''; 
                                         }   
                                      else
                                        if (Yii::$app->controller->id == 'gallery'){
                                          $active_home = ''; 
                                          $active_about = '';
                                          $active_product = '';
                                          $active_gallery = 'current-menu-ancestor current-menu-parent';
                                          $active_blog = '';
                                          $active_contact = '';
                                          $active_payment = ''; 
                                         }    
                                      else
                                        if (Yii::$app->controller->id == 'blog'){
                                          $active_home = ''; 
                                          $active_about = '';
                                          $active_product = '';
                                          $active_gallery = '';
                                          $active_blog = 'current-menu-ancestor current-menu-parent';
                                          $active_contact = '';
                                          $active_payment = ''; 
                                         }  
                                       else
                                        if (Yii::$app->controller->id == 'contact'){
                                          $active_home = ''; 
                                          $active_about = '';
                                          $active_product = '';
                                          $active_gallery = '';
                                          $active_blog = '';
                                          $active_contact = 'current-menu-ancestor current-menu-parent';
                                          $active_payment = ''; 
                                         }     
                                       else
                                          if (Yii::$app->controller->id == 'payment'){
                                          $active_home = ''; 
                                          $active_about = '';
                                          $active_product = '';
                                          $active_gallery = '';
                                          $active_blog = '';
                                          $active_contact = '';
                                          $active_payment = 'current-menu-ancestor current-menu-parent'; 
                                         }      
                                    ?>
                    <div id="nav-menu-mobile" class="header-mobile-nav menu-drop-fly">
                        <form class="search-form-menu-mobile" method="get" action="<?=$base?>/shop/search/"> 
                            <input type="text" name="text" placeholder="Tìm kiếm..."> 
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                        <ul id="menu-main-menu" class="nav-menu-mobile x-nav-menu x-nav-menu_main-menu x-animate-slide-up" data-breakpoint="991">
                            <li id="menu-item-mobile-2294" class="menu-item menu-item-type-custom menu-item-object-custom  menu-item-has-children x-menu-item x-sub-menu-standard <?=$active_home?>">
                                <a href="/" class="x-menu-a-text"><span class="x-menu-text">Trang chủ</span></a>
                                
                            </li>
                            <li id="menu-item-mobile-2295" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children x-menu-item x-sub-menu-standard <?=$active_product?>">
                                <a href="#" class="x-menu-a-text"><span class="x-menu-text">Sản phẩm</span><b class="x-caret"></b></a>
                                
                                <ul class="x-sub-menu x-sub-menu-standard x-list-style-none x-widget-area-wrapper">
                                    <?php
                                              $menu_cats_pro = \yii\easyii\modules\catalog\models\Category::find()
                                                                          ->where(['status'=>1])
                                                                          ->andWhere(['depth'=>0])
                                                                          ->all();
                                              foreach ($menu_cats_pro as $item):

                                 ?>
                                    <li id="menu-item-mobile-2496" class="menu-item menu-item-type-post_type menu-item-object-page x-menu-item x-sub-menu-standard">
                                        <a href="<?=$base?>/shop/cat/<?=$item->slug?>" class="x-menu-a-text"><span class="x-menu-text"><?=$item->title?></span></a></li>
                                 <?php endforeach;?>   
                                </ul>
                            </li>
                            <li id="menu-item-mobile-2497" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children x-menu-item x-sub-menu-standard <?=$active_about?>">
                                <a href="<?=$base?>/about/" class="x-menu-a-text"><span class="x-menu-text">Giới thiệu</span></a>
                              
                            </li>
                 
                            <li id="menu-item-mobile-2422" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children x-menu-item x-pos-full x-sub-menu-multi-column <?=$active_blog?>">
                                <a href="<?=$base?>/blog/" class="x-menu-a-text"><span class="x-menu-text">Chie Blogs</span></a>
                               
                            </li>
                            <li id="menu-item-mobile-2524" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children x-menu-item x-pos-full x-sub-menu-multi-column <?=$active_contact?>">
                                <a href="<?=$base?>/contact/" class="x-menu-a-text"><span class="x-menu-text">Liên hệ</span></a>
                            
                            </li>
                            <li id="menu-item-mobile-2478" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children x-menu-item x-pos-full x-item-image x-image-layout x-image-layout-above x-sub-menu-multi-column <?=$active_payment?>">
                                <a href="<?=$base?>/payment/" class="x-menu-a-text"><span class="x-menu-text">Thanh toán</span></a>
                             
                            </li>
                        </ul>
                    </div>
                    <div class="main-menu-overlay"></div>
                </div>
            </div>
        </header> 
  <header id="header" class="main-header header-2 header-desktop-wrapper">
      <div class="header-nav-above">
          <div class="container">
              <div class="fl">
                  <div class="header-customize header-customize-left">
                      <div class="custom-text-wrapper header-customize-item">
                          <ul class="custom-list" style="margin-bottom: 30px;margin-right: -15px">
                              <li style="color:#999">Follow us</li>
                              <li style="font-size: 22px">Socials</li>
                          </ul>
                      </div>
                          <ul class="header-customize-item header-social-profile-wrapper">
                              
                              <li><a href="<?=  \yii\easyii\models\Setting::get('facebook')?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                              <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                              <li><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                              <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="header-logo">
                        <a href="/" title="Chie Handmade"> 
                            <img src="<?=$base?>/image/logo/logo.png"  alt="Chie Handmade" /> 
                        </a>
                    </div>
                    <div class="fr">
                        <div class="header-customize header-customize-right header-customize-separate">
                            <div class="custom-text-wrapper header-customize-item">
                                <div class="contact-info"> <i class="fa fa-phone"></i> 
                                    <a href="tel: <?=  \yii\easyii\models\Setting::get('tel')?>" style="font-weight: bold">    
                                       <?=  \yii\easyii\models\Setting::get('tel')?>
                                    </a>   
                                </div>
                            </div>
                            <div class="shopping-cart-wrapper header-customize-item with-price">
                                <div class="widget_shopping_cart_content">
                                    <div > <i class="fa fa-map-marker"></i> <?=  \yii\easyii\models\Setting::get('address')?> </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-nav-wrapper header-sticky sticky-scheme-inherit nav-hover-primary">
                <div class="container">
                    <div class="header-wrapper">
                        <div class="header-left">
                            <div id="primary-menu" class="menu-wrapper">
                                <ul id="main-menu" class="main-menu x-nav-menu x-nav-menu_main-menu x-animate-slide-up" data-breakpoint="991">
                                    <li class="logo-sticky">
                                        <a href="/" title="Chie Handmade"> 
                                         <img src="<?=$base?>/image/logo/logo.png"  alt="Chie Handmade" /> 
                                        </a>
                                    </li>
                                    
                                    <li id="menu-item-2294" class="menu-item menu-item-type-custom menu-item-object-custom  menu-item-has-children x-menu-item x-sub-menu-standard <?=$active_home?>">
                                        <a href="/" class="x-menu-a-text">
                                            <span class="x-menu-text">Trang chủ</span>
                                        </a>
                                        
                                    </li>
                                  
                                    <li id="menu-item-2295" class="menu-item menu-item-type-custom menu-item-object-custom x-menu-item x-sub-menu-standard <?=$active_about?>">
                                        <a href="<?=$base?>/about/" class="x-menu-a-text">
                                            <span class="x-menu-text">Giới thiệu</span>
                                        </a>
                                    </li>
                                     <li id="menu-item-2295" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children x-menu-item x-sub-menu-standard <?=$active_product?>">
                                         <a href="#" class="x-menu-a-text">
                                             <span class="x-menu-text">Sản phẩm</span><b class="x-caret"></b>
                                         </a>
                                        <ul class="x-sub-menu x-sub-menu-standard x-list-style-none x-widget-area-wrapper">
                                            <?php
                                            $menu_cats_pro = \yii\easyii\modules\catalog\models\Category::find()
                                                                          ->where(['status'=>1])
                                                                          ->andWhere(['depth'=>0])
                                                                          ->orderBy(['order_num'=> SORT_DESC])
                                                                          ->all();
                                                 foreach ($menu_cats_pro as $item):
                                            ?>
                                            <li id="menu-item-2496" class="menu-item menu-item-type-post_type menu-item-object-page x-menu-item x-sub-menu-standard">
                                                <?php
                                                     $sub_cats = yii\easyii\modules\catalog\models\Category::find()
                                                             ->where(['tree'=>$item->category_id])
                                                             ->andWhere('depth > 0')
                                                             ->all();
                                                     if (count($sub_cats) > 0){
                                                       $has_sub = '<b class="x-caret"></b>';  
                                                     }else{
                                                       $has_sub = '';  
                                                     }
                                                   ?>  
                                                <a href="<?=$base?>/shop/cat/<?=$item->slug?>" class="x-menu-a-text">
                                                    <span class="x-menu-text"><?=$item->title?></span><?=$has_sub?>
                                                </a>
                                                <ul class="x-sub-menu x-sub-menu-standard x-list-style-none x-widget-area-wrapper">
                                                   
                                                   <?php foreach ($sub_cats as $item_sub):?> 
                                                   <li id="menu-item-mobile-2532" class="menu-item menu-item-type-post_type menu-item-object-page x-menu-item x-sub-menu-standard">
                                                      <a href="<?=$base?>/shop/cat/<?=$item_sub->slug?>" class="x-menu-a-text"><span class="x-menu-text"><?=$item_sub->title?></span></a>
                                                   </li>
                                                   <?php endforeach;?>
                                               </ul>
                                            </li>
                                            <?php endforeach;?>
                                        </ul>
                                    </li>
                                    <li id="menu-item-2295" class="menu-item menu-item-type-custom menu-item-object-custom x-menu-item x-sub-menu-standard <?=$active_blog?>">
                                        <a href="<?=$base?>/blog/" class="x-menu-a-text">
                                            <span class="x-menu-text">Chie Blog</span>
                                        </a>
                                    </li>
                                    <li id="menu-item-2295" class="menu-item menu-item-type-custom menu-item-object-custom x-menu-item x-sub-menu-standard <?=$active_contact?>">
                                        <a href="<?=$base?>/contact" class="x-menu-a-text">
                                            <span class="x-menu-text">Liên hệ</span>
                                        </a>
                                    </li>
                                    <li id="menu-item-2295" class="menu-item menu-item-type-custom menu-item-object-custom x-menu-item x-sub-menu-standard <?=$active_payment?>">
                                        <a href="<?=$base?>/payment/" class="x-menu-a-text">
                                            <span class="x-menu-text">Thanh toán</span>
                                        </a>
                                    </li>
                                   

                                </ul>
                            </div>
                        </div>
                        <div class="header-right">
                            <div class="header-customize header-customize-nav">
                                <div class="search-button-wrapper header-customize-item style-default"> 
                                    <a class="icon-search-menu" href="#" data-search-type="standard">
                                        <i class="wicon fa fa-search"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>     
        <div id="search_popup_wrapper" class="dialog">
            <div class="dialog__overlay"></div>
            <div class="dialog__content">
                <div class="morph-shape"> <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 520 280" preserveAspectRatio="none"> <rect x="3" y="3" fill="none" width="516" height="276"/> </svg></div>
                <div class="dialog-inner">
                    <h2>Tìm kiếm</h2>
                    <form method="get" action="<?=$base?>/shop/search" class="search-popup-inner"> 
                        <input type="text" name="text" placeholder="nhập từ khóa cần tìm..."> 
                        <button type="submit">Tìm kiếm</button></form>
                    <div><button class="action" data-dialog-close="close" type="button"><i class="fa fa-close"></i></button></div>
                </div>
            </div>
        </div> 
    <main>
        
        <?= $content ?>
        <div class="push"></div>
        
    </main>
 <footer class="main-footer-wrapper light">
            <div id="wrapper-footer">
                <div class="main-footer" style="margin-bottom: -60px">
                    <div class="footer_inner clearfix">
                        <div class="footer-top-bar-wrapper">
                            <div class="footer-top-bar-inner">
                               <?php
                                 if (Yii::$app->controller->id == 'site')
                                 {
                               ?>
                                 <div class="full">
                                    <div class=" sidebar">
                                        
                                        <aside id="handmade-map-scroll-up-3" class="widget widget-map-scroll-up">
                                            <div class="map-scroll-up">
                                                <div class="link-wrap">
                                                    <div class="map col-md-6 col-sm-6 col-xs-6">
                                                        <a href="javascript:;" class="a-map p-color-hover"> <i class="pe-7s-map-marker pe-lg pe-va"></i> <span>Đường đến Chie Shop</span> </a>
                                                    </div>
                                                    <div class="scroll-up col-md-6 col-sm-6 col-xs-6">
                                                        <a href="javascript:;" class="a-scroll-up p-color-hover"> <i class="pe-7s-up-arrow"></i> <span>Lên trên</span> </a>
                                                    </div>
                                                </div>
                                                <div class="handmade-map container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <!--<div class="handmade-google-map " data-location-x="21.013362" data-location-y="105.831874" data-marker-title="Google map" style="height:450px" data-map-zoom="12" data-map-style="none"></div>-->
                                                            <img src="<?=$base?>/image/map.jpg">
                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </aside>
                                    </div>
                                </div>
                               <?php
                                 }
                                 else{
                                   echo "<hr/>";  
                                 }
                               ?> 
                            </div>
                        </div>
                        <div class="footer_top_holder col-4">
                            <div class="container">
                                <div class="row footer-top-col-4 footer-1">
                                    <div class="sidebar footer-sidebar col-md-3 col-sm-6 col-1">
                                        <aside id="wolverine-footer-logo-2" class="widget widget-footer-logo">
                                            <div class="footer-logo">
                                                <a href="/" title="Chie Handmade"> 
                                                 <img src="<?=$base?>/image/logo/logo.png"  alt="Chie Handmade" /> 
                                                </a>
                                                <div class="sub-description">* Đồ thủ công * Trang trí nhà cửa * Nhận đặt các sản phẩm handmade theo yêu cầu</div>
                                            </div>
                                        </aside>
                                    </div>
                                    <div class="sidebar footer-sidebar col-md-2 col-sm-6 col-2">
                                        <aside id="nav_menu-3" class="widget widget_nav_menu">
                                            <h4 class="widget-title"><span>Danh mục</span></h4>
                                            <div class="menu-footer-information-container">
                                                <ul id="menu-footer-information" class="menu">
                                                    <li id="menu-item-2430" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2430">
                                                        <a href="<?=$base?>/about/">Giới thiệu</a></li>
                                                    <li id="menu-item-2431" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2431">
                                                        <a href="<?=$base?>/payment/#">Thanh toán</a></li>
                                                    <li id="menu-item-2432" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2432">
                                                        <a href="<?=$base?>/blog/">Chie Blog</a></li>
                                                    <li id="menu-item-2433" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2433">
                                                        <a href="<?=$base?>/contact">Liên hệ</a></li>
                                                    
                                                </ul>
                                            </div>
                                        </aside>
                                    </div>
                                    <div class="sidebar footer-sidebar col-md-4 col-sm-6 col-3">
                                        <aside id="nav_menu-4" class="widget widget_nav_menu">
                                            <h4 class="widget-title"><span>Facebook</span></h4>
                                            <div class="menu-footer-extras-container">
                                             <div id="fb-root"></div>
                                                <script>(function(d, s, id) {
                                                  var js, fjs = d.getElementsByTagName(s)[0];
                                                  if (d.getElementById(id)) return;
                                                  js = d.createElement(s); js.id = id;
                                                  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=1509462442706319";
                                                  fjs.parentNode.insertBefore(js, fjs);
                                                }(document, 'script', 'facebook-jssdk'));
                                                </script>   
                                              <div class="fb-like" data-href="https://www.facebook.com/Chiehandmadewithlove" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>   
                                            </div>
                                        </aside>
                                    </div>
                                    <div class="sidebar footer-sidebar col-md-3 col-sm-6 col-4">
                                        <aside id="text-2" class="widget-title-s-font widget widget_text">
                                            <h4 class="widget-title"><span>Liên hệ</span></h4>
                                            <div class="textwidget">
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
                                        </aside>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom-bar-wrapper">
                    <div class="bottom-bar-inner">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 sidebar text-center">
                                    <aside id="text-3" class="copyright margin-top-10 widget widget_text">
                                        <div class="textwidget">
                                            <div>© Copyright 2016 Chie Handmade.</div>
                                            
                                        </div>
                                    </aside>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
<a class="back-to-top" href="javascript:;"> <i class="fa fa-angle-up"></i> </a>

 




    <script type='text/javascript'>

        var g5plus_framework_constant = {
            "product_compare": "Compare",
            "product_wishList": "WishList"
        };
        //var g5plus_framework_ajax_url = "index.html\/\/themes.g5plus.net\/handmade\/wp-admin\/admin-ajax.php?activate-multi=true";
        var g5plus_framework_theme_url = "\/\/abc\/handmade\/app\/media\/handmade\/wp-content\/themes\/handmade\/";
        //var g5plus_framework_site_url = "index.html\/\/themes.g5plus.net\/handmade";

    </script>
    
    <script type='text/javascript'>
        /*  */
        var xmenu_meta = {
            "setting-responsive-breakpoint": "991"
        };
        var xmenu_meta_custom = [];
        /*  */
    </script>
<!--Add the following script at the bottom of the web page (immediately before the </body> tag)-->
<script type="text/javascript" async="async" defer="defer" data-cfasync="false" src="https://mylivechat.com/chatinline.aspx?hccid=29084443"></script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-87173112-1', 'auto');
    ga('send', 'pageview');

</script>
<?php $this->endContent(); ?>
