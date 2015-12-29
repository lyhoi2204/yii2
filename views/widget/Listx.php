<?php

namespace app\views\widget;

/**
* 
*/
class Listx extends \yii\base\widget
{
	public $title;
	public $data;

	public function run()
	{
		return $this->render('list',['title'=>$this->title,'data'=>$this->data]);
	}
	
}



