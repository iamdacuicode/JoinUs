<?php
/**
 * 登录页面以及登录验证
 * @authon jack.achan
 */
namespace app\modules\blogadmin\controllers;
use yii\web\Controller;
use yii\web\Session;
use Yii;
use app\modules\blogadmin\models\LoginForm;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
//use app\models\LoginForm;
//use app\models\ContactForm;
class LoginController extends Controller
{   
    public $enableCsrfValidation = false;//yii默认表单csrf验证，如果post不带改参数会报错！
    public $layout  = 'layout';
    public $verifyCode;
    public function actionIndex()
    {
        //$content = $this->layout='@app/modules/blogadmin/views/layouts/main.php';
        //\Yii::$app = $this;
//        $sql = "select * from {{admin_user}}";
//        $data = $this->db->createCommand($sql)->queryAll();
//        if(!isset($this->session['m_user']))
//        {
//                $this->redirect("/blogadmin");
//        }
        return $this->render('index');

    }
    
    /**
     * username 用户名
     * password 密码
     * captcha  验证码
     */
    function actionAuth()
    {
        $session = Yii::$app->session;
        $username = !empty($_POST['username'])?trim($_POST['username']):NULL;
        $password = !empty($_POST['password'])?trim($_POST['password']):NULL;
        $captcha = !empty($_POST['captcha'])?strtolower($_POST['captcha']):NULL;
        //获取Yii验证码
        $cap = $this->createAction('captcha')->getVerifyCode();
        if($username != "cheng" || $password != '123')
        {
                return 1;
        }
        if($captcha != $cap)
        {
            return 2;
        }
        $session->set('m_user', $username);//session['m_user'] = $username;
        $session->set('m_logintime',time());//['m_logintime'] = time();
    }
    
    /**
     * @验证码独立操作
     */
    public function actions()
    {		
        return  [	
//                    'captcha' => 
//                    [
//                        'class' => 'yii\captcha\CaptchaAction',
//                        'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
//                    ],
                        'captcha' => [
                                    'class' => 'yii\captcha\CaptchaAction',
                                    'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                                    'backColor'=>0xffffff,
                                    'maxLength' => 6,
                                    'minLength' => 6,
                                    'padding' => 5,
                                    'height'=>38,
                                    'width' => 130,
                                    //'backColor'=>'',      //背景颜色
                                    'foreColor'=>0x00cccc,     //字体颜色
                                    'offset'=>8,        //设置字符偏移量 有效果
                                    //'controller'=>'login',        //拥有这个动作的controller
                            ],

            
		];
	}
    /**
     * 调用验证码类
     */
//    public function actions()
//    {
//        return array(
//                'captcha'=>array(
//                        'class'=>'system.web.widgets.captcha.CCaptchaAction',
//                        'width'=>'90',
//                        'height'=>'35',
//                        'maxLength'=>'4',
//                        'minLength'=>'4',
//                        'padding' =>'-1',
//                        'offset' =>'3',
//                        ),
//                );
//    }
    /**
     * 登录首页
     */
    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        } else {
            return $this->render('login', ['model' => $model,]);
           // ]);
        }
    }

    /**
     * 框架管理
     */
    public function actionLeft()
    {
        return $this->render('left');
    }
    /**
     * 
     */
    public function actionTop()
    {
        return $this->render('top');
    }

    public function actionCentre()
    {
        return $this->render('centre');
    }

    public function actionBottom()
    {
        return $this->render('bottom');
    }

    public function actionRepasswd()
    {
        return $this->render('repasswd');
    }

    public function actionPwdsave()
    {
        $newPass = !empty($_POST['newPass'])?$_POST['newPass']:null;
        if($newPass!=null)
        {
            echo "修改密码成功！";
        }
                //$this->render('pwdsave');
                //$data = admin_user->model()->fun();
                //$res = Yii::app()->db->createCommand("select * from qi_cell order by id desc limit 1")->queryRow();  
    }


    public function actionLogout()
    {
        //Yii::$app->user->logout();
        return $this->redirect('/index.php?r=blogadmin/login/login');
    }
    
    /**
     * @用户授权规则
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup','login'],
                'rules' => [
                    [
                        'actions' => ['login','captcha'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout','edit','add','del','index','users','thumb','upload','cutpic','follow','nofollow'],
                        'allow' => true,
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
}
    
    
 
