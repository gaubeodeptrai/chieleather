<?php
namespace app\assets;

class AppAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@app/media/handmade';
    public $css = [
      "wp-content/cache/min/1/d3736476df6fb7f460497f90e14ba54e.css",
      "wp-content/plugins/woocommerce/assets/css/woocommerce-smallscreen0875.css" ,
      //"wp-content/cache/min/1/4fc2e6fa976f5cbabb8d5ba58908b056.css",
      'http://fonts.googleapis.com/css?family=Varela+Round%3A400%7CPlayfair+Display%3A400%2C700%2C900%2C400italic%2C700italic%2C900italic&amp;ver=1466421800' ,
      "style.css",  
      "body.css",  
      "gallery.css",  
      "tree/jquery.treemenu.css"  ,
      "slider/style.css"  
    ];
    public $js = [
      "wp-content/cache/min/1/81da69b309c270e5bdbb1b6095e0fdde.js",
      "wp-content/cache/min/1/4629b96d9691f71267399075a4869c26.js", 
      "view_product.js",
      
      'http://maps.googleapis.com/maps/api/js',
      "tree/jquery.treemenu.js"  ,
      
      //"slider/jquery.js",
      "slider/wowslider.js",    
      "slider/script.js",  
      

    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
