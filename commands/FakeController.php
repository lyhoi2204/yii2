<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use app\models\Categories;
use app\models\News;
use app\models\Type;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FakeController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";
    }
    public function actionNews()
    {
    	
    	for($i=1;$i<=10;$i++)
    	{
    		$model = new News();
    		$model->attributes = [
    			'name' => 'Bài viết số ' . $i,
    			'title' => 'Title cua bai viet so '. $i,
    			'slug' => 'bai-viet-so-'.$i,
    			'images' => '3.png',
    			'type_id' => rand(1,100),
    			'user_id' => '1',
    			'created_at' => time(),
    			'updated_at' => time(),
    		];

    		$model->save();

    	}

    }

    public function actionCategory()
    {
    	
    	for($i=1;$i<=10;$i++)
    	{
    		$model = new Categories();
    		$model->attributes = [
    			'name' => 'Danh Mục Số ' . $i,
    			'title' => 'Title cua danh muc so '. $i,
    			'slug' => 'danh-muc-so-'.$i,
    			'images' => '3.png',
    			'created_at' => time(),
    			'updated_at' => time(),
    		];

    		$model->save();

    	}

    }

    public function actionType()
    {
    	
    	for($i=1;$i<=90;$i++)
    	{
    		$model = new Type();
    		$model->attributes = [
    			'name' => 'Type Số ' . $i,
    			'title' => 'Title cua Type so '. $i,
    			'categories_id' => rand(1,10),
    			'slug' => 'type-so-'.$i,
    			'images' => '3.png',
    			'created_at' => time(),
    			'updated_at' => time(),
    		];

    		$model->save();

    	}

    }
}
