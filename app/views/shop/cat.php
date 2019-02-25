<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\easyii\modules\catalog\api\Catalog;
 use yii\easyii\helpers\Image;
 
 
$this->title = $cat->seo('title', $cat->model->title);
$base = Yii::$app->getUrlManager()->getBaseUrl();
$this->registerMetaTag(['name' => 'description', 'content' => $cat->seo('description')]);
$this->registerMetaTag(['name' => 'keywords', 'content' => $cat->seo('keywords')]);
function renderNode($node){
   if (Yii::$app->request->get('slug')==$node->slug)
                      {
                        $color='#ED2F59';
                        $active = 'active';
                       }
                     else
                     {
                        $color=''; 
                        $active = '';
                     }
    if ($node->depth ==0)
         {
            $font = 'font-weight: bold'; 
         }else{
            $font = 'font-weight: normal';  
         }                 
     if(!count($node->children)){
         
        $html = '<li>'.Html::a($node->title, ['/shop/cat', 'slug' => $node->slug],['style'=>'color:'.$color.'']).'</li>';
    } else {
         
             
         $space = ($node->depth +15);
         $html = '<li class="'.$active.'">'.Html::a($node->title, ['/shop/cat', 'slug' => $node->slug],['style'=>'color:'.$color.'']).'';
           
         $html .= '<ul style="padding-left:'.$space.'px ">';
       
        foreach($node->children as $child): 
           
            $html .= renderNode($child);
        endforeach;
            $html .= '</ul>';
             $html .= '</li>';
    }
    return $html;
}

$this->registerCss("
.tree { 
    
   //background-color:#fff; 
   //color:#000;
}
.tree li,
.tree li > a,
.tree li > span {
    font-size: 15px;
    padding: 3pt;
    border-radius: 4px;
}
.tree li > ul > li {
    font-size: 16px;
    padding: 3pt;
    border-radius: 4px;
}
.tree li a {
   
    text-decoration: none;
    line-height: 20pt;
    border-radius: 4px;
}





.active {
    //background-color: #34495E;
    color: #green;
}

.tree li active {
    color: #green;
}

.tree li a.active:hover {
    //background-color: #34BC9D;
}");

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


<div id="wrapper-content" class="clearfix" style="margin-bottom: 20px">
            <div class="section-page-title archive-product-title-margin container">
                <section class="page-title-wrap archive-product-title-height page-title-wrap-bg page-title-center" style="background-image: url(<?=$base?>/image/banner/banner_cat.png);">
                    
                    <div class="container">
                        <div class="page-title-inner block-center">
                            <div class="block-center-inner">
                                <h1><?=$cat->title?></h1>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="breadcrumb-wrap breadcrumb-archive-product-wrap">
                    <div class="container">
                        <ul class="breadcrumbs">
                           
                            <li><a rel="v:url" href="/" class="home">Trang chủ</a>
                            </li>
                            <li><a rel="v:url" href="#">Shop</a></li>
                            <li><?=$cat->model->title?>
                            </li>
                            
                        </ul>
                        <div class="catalog-filter clearfix">
                            <p class="woocommerce-result-count"> Đang có <?=  total_products($cat->model->category_id)?> sản phẩm</p>
                            
                        </div>
                    </div>
                </section>
            </div>
            <main class="site-content-archive-product">
                <div class="container clearfix">
                    <div class="row clearfix">
                        <div class="sidebar woocommerce-sidebar col-md-3 hidden-sm hidden-xs sidebar-small">
                            
                          
                            <aside id="woocommerce_product_categories-2" class="widget woocommerce widget_product_categories">
                                <h4 class="widget-title"><span>Danh mục sản phẩm</span></h4>
                                <ul class="tree">
                                  
                                    <?php foreach(Catalog::tree() as $node) echo renderNode($node); ?>
                                </ul>
                            </aside>
                            
                            <aside id="woocommerce_top_rated_products-2" class="widget woocommerce widget_top_rated_products">
                                <h4 class="widget-title"><span>Top Rated</span></h4>
                                <ul class="product_list_widget">
                                   <?php foreach(Catalog::last(3) as $item) : ?> 
                                    <li>
                                        <a href="<?=$base?>/shop/view/<?=$item->slug?>" title="Yellow Pillow"> 
                                             <?= Html::img(Image::thumb($item->image, 500, 400,true)) ?>
                                            <span class="product-title"><?=$item->title?></span> 
                                        </a>
                                        <div class="star-rating" title="Rated 5 out of 5"><span style="width:100%"><strong class="rating">5</strong> out of 5</span>
                                        </div> 
                                    </li>
                                  <?php endforeach;?>
                                </ul>
                            </aside>
                          
                        </div>
                        <div class="col-md-9">
                            <div class="archive-product-wrap clearfix layout-container">
                                <div class="product-listing woocommerce clearfix columns-3">
                                    <?php
                                    $count_sub = yii\easyii\modules\catalog\models\Category::find()
                                                         ->where(['tree'=>$cat->model->category_id])
                                                         ->andWhere('depth > 0')
                                                         ->count();
                                    //echo $count_sub;
                                    if ($count_sub == 0){
                                       foreach ($items as $item):
                                         echo $this->render('_item', ['item' => $item]);   
                                       endforeach;
                                    }
                                    else
                                     if ($count_sub > 0){
                                       $cat_item = yii\easyii\modules\catalog\models\Category::find()->where(['tree'=>$cat->model->tree])->andWhere('status = 1')->all();
                                      
                                       foreach ($cat_item as $cat_item):
                                           
                                           $list_sp = \yii\easyii\modules\catalog\models\Item::find()->where(['category_id'=>$cat_item->category_id])->all();
                                           
                                            foreach ($list_sp as $item):
                                              
                                               echo $this->render('_item', ['item' => $item]);     
                                             endforeach;    
                                        endforeach;  
                                        
                                    }   
                                  ?>
                                </div>
                            </div>
                            <div style="text-align: right"><?= $cat->pages() ?></div>
                        </div>
                    </div>
                </div>
                <div class="shop-page-content-wrapper shop-page-content-after"></div>
            </main>
        </div>
<?php
              $this->registerJs('
              $(function(){
              $("ul.tree").treemenu({delay:300}).openActive();
              });
           ');
           ?>      


