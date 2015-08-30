<?php
namespace tiagocardosos\isloading;

use yii\base\Widget;

class IsLoading extends Widget{

    public $text       		= 'O sistema está processando...';
    public $position       	= 'overlay'; // right | inside | overlay
    public $class       	= 'icon-refresh';
    public $tpl       		= '<span class="isloading-wrapper %wrapper%">%text% <i class="%class% fa-spin"></i></span>';
    public $disableSource   = true;
    public $disableOthers = [];

    /**
     * @inheritdoc
     */
    public function run()
    {
    	
    	$options = Json::encode($this->disableOthers);
    	 
    	$js = '$(document).ajaxStart(function() {
    	counter++;    	    	
    	if(!$(".isloading-overlay").is(":hidden")){
	    		$.isLoading({
	    			"class": "fa fa-refresh", 
	    			"text": "O sistema está processando...",
					"position": "overlay",        // right | inside | overlay
				    "tpl": "<span class=\"isloading-wrapper %wrapper%\">%text% <i class=\"%class% fa-spin\"></i></span>",
				    "disableSource": true,      // true | false
				    "disableOthers": []    				
	    		});
	    	}
	    })
	    .ajaxStop(function() {
	    	counter--;
	    	if($(".isloading-overlay").is(":visible") && counter == 0){
	    		setTimeout(function(){
	    			$.isLoading("hide");
	    			$(".isloading-overlay").remove();
	    		}, 500);
	    	}
	    });';
    						
    	$this->view->registerJs($js, \yii\web\View::POS_HEAD);    	
    	
        $bundle = IsLoadingAsset::register($this->view);
    }
}