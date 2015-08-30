<?php

namespace tiagocardosos\isloading;

use yii\web\AssetBundle;

class IsLoadingAsset extends AssetBundle{
	
    public $sourcePath = '@bower/is-loading';
    public $css = [
    ];
    public $js = [
        'jquery.isloading.min.js',
    ];
    public $depends = [
    	'yii\web\JqueryAsset',
    ];    
    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD,
    ];	
	
}