<?php

namespace app\views\widget;

/**
* 
*/
class Onlytext extends \yii\base\widget
{
	public $title;
	public $data;

	public function run()
	{
		return $this->render('postsonlytext',['title'=>$this->title,'data'=>$this->data]);
	}
	
}



