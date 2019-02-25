<?php 
  use yii\helpers\Html; 
  use yii\easyii\helpers\Image;
  $base = Yii::$app->getUrlManager()->getBaseUrl();
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
