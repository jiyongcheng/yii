<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class UserController extends AbstractController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
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

    public function actionIndex()
    {
        $url = 'http://10.100.28.2/mbfun_server_new/index.php';
        $para['m'] = 'Home';
        $para['a'] = 'getAppLayoutInfoV2';
        $para['id'] = 1;
        $para['cid'] = 0;
        $para['deviceCode'] = '333333';
        $result = $this->http($url,$para);
        $resultArr = json_decode($result,true);

        $data = $resultArr['data'];
        $info = $resultArr['info'];
        $status = $resultArr['status'];

        $configList = $data['configList'];
        $updateNum = $data['updateNum'];
        //print_r($configList);
        foreach($configList as $key=> $item) {
            //top
            if($item['type'] ==7) {
                $tops = $item['config'];
            }


        }

        return $this->render('index',['configList' => $configList,'tops'=>$tops]);
    }

    public function actionLogin()
    {

        $method = Yii::$app->request->method;

        if($method == 'GET') {
            return $this->render('login');
        }else {
            $userName = Yii::$app->request->post('username');
            $password = Yii::$app->request->post('password');
            $url = 'http://10.100.28.2/mbfun_server_new/index.php?m=User&a=logincheck';
            $params['login_account'] = $userName;
            $params['password'] = $password;
            $params['version_name'] = '1.0';
            $params['sign'] = '';
            $result = $this->http($url,$params,'POST');
            $data = json_decode($result,true);
            $returnCode = intval($data['returncode']);

            if($returnCode > 0) {
                Yii::$app->getSession()->setFlash('error', '用户登录失败');
                $this->refresh();
                $url = Yii::$app->urlManager->createUrl('user/login');
                return $this->redirect($url);
            }else {
                //success
                Yii::$app->getSession()->setFlash('success', '用户登录成功');
                Yii::$app->getSession()->set('user_id',$data['openid']);
                return $this->goHome();
            }
        }

    }

    public function actionRegister()
    {

        $method = Yii::$app->request->method;

        if($method == 'GET') {
            return $this->render('register');
        }else {
            $mobile = Yii::$app->request->post('mobile');
            $nickname = Yii::$app->request->post('nickname');
            $code = Yii::$app->request->post('code');
            $inviteCode = Yii::$app->request->post('invite_code');
            $password = Yii::$app->request->post('password');
            $versionName = '';
            $url = 'http://10.100.28.2/mbfun_server_new/index.php?m=User&a=mobilenumactive';
            $params['invitation_code'] = $inviteCode;
            $params['nick_name'] = $nickname;
            $params['active_code'] = $code;
            $params['mobile_num'] = $mobile;
            $params['mobile_pwd'] = $password;
            $params['version_name'] = $versionName;
            $params['_platform'] = 4;
            $result = $this->http($url,$params,'POST');
            $data = json_decode($result,true);
            $returnCode = intval($data['returncode']);
            $message = $data['msg'];
            if($returnCode > 0) {

                Yii::$app->getSession()->setFlash('error', $message);
                $this->refresh();
                $url = Yii::$app->urlManager->createUrl('user/register');
                return $this->redirect($url);
            }else {
                //success
                Yii::$app->getSession()->setFlash('success', $message);
                return $this->goHome();
            }
        }

    }

    public function actionFindpassword()
    {

        $method = Yii::$app->request->method;

        if($method == 'GET') {
            return $this->render('findpassword');
        }else {
            $account = Yii::$app->request->post('account');
            $code = Yii::$app->request->post('code');
            $url = 'http://10.100.28.2/mbfun_server_new/index.php?m=User&a=findpassword';
            $params['account'] = $account;
            $params['code'] = $code;
            $result = $this->http($url,$params,'POST');
            $data = json_decode($result,true);
            $returnCode = intval($data['returncode']);
            $message = $data['msg'];
            if($returnCode > 0) {

                Yii::$app->getSession()->setFlash('error', $message);
                $this->refresh();
                $url = Yii::$app->urlManager->createUrl('user/findpassword');
                return $this->redirect($url);
            }else {
                //success
                Yii::$app->getSession()->setFlash('success', $message);
                return $this->goHome();
            }
        }

    }

    public function actionResetPassword()
    {

        $method = Yii::$app->request->method;

        if($method == 'GET') {
            return $this->render('resetPassword');
        }else {
            $oldPasswordHash = Yii::$app->request->post('oldPasswordHash');
            $passwordHash = Yii::$app->request->post('passwordHash');
            $token = Yii::$app->request->post('token');
            $repeatPassword = Yii::$app->request->post('repeatPasswordHash');
            $userId = Yii::$app->request->post('id');
            $url = 'http://10.100.28.2/mbfun_server_new/index.php?m=User&a=UserPasswordReset';
            $params['token'] = $token;
            $params['oldPasswordHash'] = $oldPasswordHash;
            $params['passwordHash'] = $passwordHash;
            $params['repeatPasswordHash'] = $repeatPassword;
            $params['id'] = $userId;
            $result = $this->http($url,$params,'POST');
            $data = json_decode($result,true);
            $returnCode = intval($data['returncode']);
            $message = $data['msg'];
            if($returnCode > 0) {

                Yii::$app->getSession()->setFlash('error', $message);
                $this->refresh();
                $url = Yii::$app->urlManager->createUrl('user/resetPassword');
                return $this->redirect($url);
            }else {
                //success
                Yii::$app->getSession()->setFlash('success', $message);
                return $this->goHome();
            }
        }

    }

    public function actionUpdate()
    {

        $method = Yii::$app->request->method;

        if($method == 'GET') {
            return $this->render('update');
        }else {
            $device = Yii::$app->request->post('device');
            $token = Yii::$app->request->post('token');
            $NickName = Yii::$app->request->post('nickname');
            $UserSignature = Yii::$app->request->post('signature');
            $HeadPortrait = Yii::$app->request->post('head_portrait');
            $Birthday = Yii::$app->request->post('birthday');
            $Gender = Yii::$app->request->post('gender');
            $url = 'http://10.100.28.2/mbfun_server_new/index.php?m=User&a=UserUpdateProfile';
            $params['device'] = $device;
            $params['token'] = $token;
            $params['NickName'] = $NickName;
            $params['UserSignature'] = $UserSignature;
            $params['HeadPortrait'] = $HeadPortrait;
            $params['Birthday'] = $Birthday;
            $params['Gender'] = $Gender;
            $result = $this->http($url,$params,'POST');
            $data = json_decode($result,true);
            $returnCode = intval($data['returncode']);
            $message = $data['msg'];
            if($returnCode > 0) {

                Yii::$app->getSession()->setFlash('error', $message);
                $this->refresh();
                $url = Yii::$app->urlManager->createUrl('user/update');
                return $this->redirect($url);
            }else {
                //success
                Yii::$app->getSession()->setFlash('success', $message);
                return $this->goHome();
            }
        }

    }

    public function actionLoginThirdParty()
    {

        $method = Yii::$app->request->method;

        if($method == 'GET') {
            return $this->render('update');
        }else {
            $openid= Yii::$app->request->post('openid');
            $nickname = Yii::$app->request->post('nickname');
            $LoginProviderName = Yii::$app->request->post('LoginProviderName');
            $_platform = Yii::$app->request->post('_platform');
            $headimgurl = Yii::$app->request->post('headimgurl');

            $url = 'http://10.100.28.2/mbfun_server_new/index.php?m=User&a=LoginWithRegisterExternal';
            $params['_platform'] = $_platform;
            $params['openid'] = $openid;
            $params['nickname'] = $nickname;
            $params['LoginProviderName'] = $LoginProviderName;
            $params['headimgurl'] = $headimgurl;
            $result = $this->http($url,$params,'POST');
            $data = json_decode($result,true);
            $returnCode = intval($data['returncode']);
            $message = $data['msg'];
            if($returnCode > 0) {

                Yii::$app->getSession()->setFlash('error', $message);
                $this->refresh();
                $url = Yii::$app->urlManager->createUrl('user/loginThirdParty');
                return $this->redirect($url);
            }else {
                //success
                Yii::$app->getSession()->setFlash('success', $message);
                return $this->goHome();
            }
        }

    }

    public function actionGetcode()
    {

        $method = Yii::$app->request->method;

        if($method == 'GET') {
            $result = array('status'=>0,'message'=>'it cannot be get');
        }else {
            $account = Yii::$app->request->post('account');
            $from = Yii::$app->request->post('from');
            $url = 'http://10.100.28.2/mbfun_server_new/index.php?m=User&a=getcode';
            $params['account'] = $account;
            $params['from'] = $from;
            $result = $this->http($url,$params,'POST');
            $data = json_decode($result,true);
            $returnCode = intval($data['returncode']);
            $message = $data['msg'];
            if($returnCode > 0) {
                $result = json_encode(array('status'=>0,'message'=>$message));
            }else {
                $result = json_encode(array('status'=>1,'message'=>'success'));
            }

        }
        $response=Yii::$app->response;
        $response->format=$response::FORMAT_JSON;
        $response->data=$result;
        return $response->send();

    }
}
