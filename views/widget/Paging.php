<?php

namespace app\views\widget;

/**
* 
*/
class Paging extends \yii\base\widget
{
	public $maxpage;

    public function run()
    {
        return $this->render('pagin',['maxpage'=>$this->maxpage]);
    }
    
}



