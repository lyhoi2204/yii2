<?php

namespace app\views\widget;

/**
* 
*/
class Block2 extends \yii\base\widget
{
    public $title;
    public $data;

    public function run()
    {
        return $this->render('block2',['title'=>$this->title,'data'=>$this->data]);
    }
    
}



