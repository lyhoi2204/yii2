<?php

namespace app\modules\admin;

class Admin extends \yii\base\Module
{
	public $layout = 'admin.php';
    public $controllerNamespace = 'app\modules\admin\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
