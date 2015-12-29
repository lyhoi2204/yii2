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
use app\helpers\crawl\Crawl;
use app\helpers\rUrl;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class CrawleController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    
    public function actionKhoahoctv(){
        for($i=16655;$i<=70000;$i++){

                $crawler = new Crawl();
                $crawler->arr_att_clean  = array('script','.thumblock');

                $url = 'http://khoahoc.tv/quan-the-tu-vien-meteora-'.$i;
                $namepath = '/html/body/div[1]/div[3]/div[1]/h1';
                $contentpath = '/html/body/div[1]/div[3]/div[1]/div[3]';
                $type_path = '/html/body/div[1]/div[3]/div[1]/div[2]/span[3]/a';
                
                
                if(!@$name = $crawler->getTitle($url,$namepath)){
                    echo 'error_' . $i . "\n";
                }else
                {
                    $name = rUrl::utf8($crawler->getTitle($url,$namepath));
                    $content = $crawler->getTitle($url,$contentpath);
                    $type = $crawler->getTitle($url,$type_path);
                    $content = $crawler->removeLink($content);
                    $images = $crawler->getImagesFromMeta($url);
                    $keywords = $crawler->getKeywords($url);
                    $descriptionmeta = $crawler->getDescriptionmeta($url);
                    $type_slug = rUrl::slug($type);
                    $mType = Type::find()->Where(['LIKE', 'slug',$type_slug])->one();
                    $id_type = $mType['id'];
                    $slug = rUrl::slug($name);

                    if($id_type!==null)
                    {
                        $id_type = $mType['id'];
                    }else{
                        $id_type = 22;
                    }



                    $model = new News();
                    $model->attributes = [
                        'name' => $name,
                        'slug' => $slug,
                        'images' => $images,
                        'description' => $content,
                        'seo_keywords' => $keywords,
                        'view_count' => rand(1000,10000),
                        'source' => 'kh',
                        'seo_title' => $descriptionmeta,
                        'type_id' => $id_type,
                        'user_id' => 1,
                        'hot' => 0,
                        'post_final' => $i,
                        'created_at' => time(),
                        'updated_at' => time(),

                    ];
                    $model->save();

                    echo "ok_" . $i . "\n";
                   // exit();
                    
                } 
    
            }  
        
    }

    
    

    

    
}
