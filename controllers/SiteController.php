<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\News;
use app\models\Categories;
use app\models\Type;
use app\helpers\crawl\Crawl;
use app\helpers\rUrl;
use app\helpers\MyDefine as M;

class SiteController extends Controller
{
    public $layout = 'news.php';
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => false,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function paging($limit)
    {
        $limit = $limit;
        $page = 0;
        if(Yii::$app->request->get('page') == null) : $page = 0; else:
        $page = Yii::$app->request->get('page')-1;
        endif;
        return $pagesize = $page*$limit+8;
    }

    public function displayPage()
    {


    }

    public function actionIndex()
    {
        \Yii::$app->view->registerMetaTag(['name' => 'description','content' => 'Cập nhật tin tức khoa học, công nghệ mới nhất, nhanh nhất '],"index"); 
        \Yii::$app->view->registerMetaTag(['name' => 'keywords','content' => 'Khoa học, công nghệ, tin tức, khám phá, bí ẩn '],"index"); 
        $news = new News();
        /* paging */
         
         $limit = 20;

        return $this->render('index',[
           
            'nnews' => $news->news($limit,$this->paging($limit)),
            'news' => $news,
           
            ]);
    }

    public function actionCategory($id)
    {   
        $model = Categories::findOne($id);
        $category = $model->find()->where(['id'=>$id])->one();
        $news = new News();
        $data = $news->fromCategory($id,20,$this->paging(20));
        $datat1 = $news->fromCategory($id,5,0);
        $datat2 = $news->fromCategory($id,4,5);
        return $this->render('itemcategory',[
                'data' => $data,
                'datat1' => $datat1,
                'datat2'=> $datat2,
                'category' => $category,
                'model'=>$model,

            ]);
    }

    public function actionModel()
    {

            
                $crawler = new Crawl();
                $crawler->arr_att_clean  = array('script','.thumblock');

                $url = 'http://khoahoc.tv/quan-the-tu-vien-meteora-1882';
                $namepath = '/html/body/div[1]/div[3]/div[1]/h1';
                $contentpath = '/html/body/div[1]/div[3]/div[1]/div[3]';
                $type_path = '/html/body/div[1]/div[3]/div[1]/div[2]/span[3]/a';
                
                
                if(!@$name = $crawler->getTitle($url,$namepath)){
                    echo 'error_' . "\n";
                }else
                {


                    $name = $crawler->getTitle($url,$namepath);

                    echo $name = rUrl::utf8($name);

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
                        //'user_id' => 3,
                        //'hot' => 0,
                        'created_at' => time(),
                        'updated_at' => time(),

                    ];
                    //$model->save();

                    //echo "ok_" . $i . "\n";
                   // exit();
                    
                } 
    
             



    }





    public function actionType($id)
    {
        $type = Type::findOne($id);
        $news = new News();
        $popular = $news->popularfromType($id,10,0);
        $data = $news->find()->where(['status'=>M::status_enable])->andWhere(['type_id'=>$id])->orderBy(['id'=>SORT_DESC])->limit(20)->offset($this->paging(20))->all();
        return $this->render('itemtype',[
            'type' => $type,
            'data' => $data,
            'news' => $news->newsfromType($id,5),
            'news2'=> $news->newsfromType($id,4,5),
            'popular' => $popular,
            ]);
    }
    public function actionSearch()
    {
        $search = News::find()->andFilterWhere(['like', 'name', Yii::$app->request->get('keyword')])->limit(20)->all();
        return $this->render('search',[
            'search' => $search
            ]);
    }

    public function actionDetail($id)
    {
        $model = News::findOne($id);
        

        \Yii::$app->view->registerMetaTag(['name' => 'description','content' => $model->seo_title],"detail_description"); 
        \Yii::$app->view->registerMetaTag(['name' => 'keywords','content' => $model->seo_keywords,],"detail_keywords"); 
        \Yii::$app->view->registerMetaTag(['property' => 'og:image','content' => $model->images],"detail_image"); 

        return $this->render('detail',[
                'model'=>$model,
            ]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    
}
