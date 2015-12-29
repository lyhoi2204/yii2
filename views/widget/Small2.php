<?php

namespace app\views\widget;

/**
* 
*/
class Small2 extends \yii\base\widget
{
	public $title;
	public $data;

	public function run()
	{
		return $this->render('small2',['title'=>$this->title,'data'=>$this->data]);
	}
	
}



