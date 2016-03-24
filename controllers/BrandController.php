<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;


class BrandController extends AbstractController
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
        $token = '3314d583b497160fcb350b566a52ff46';
        $url = 'http://10.100.28.205/mbfun_server_new/index.php';
        $para['m'] = 'BrandMb';
        $para['a'] = 'getBrandDetailsForItem';
        $para['brandCode'] = 'adidas';
        $para['token'] = '3314d583b497160fcb350b566a52ff46';

        $result = $this->http($url,$para);
        $resultArr = json_decode($result,true);
        $data = $resultArr['data'];
        //print_r($data);

        $productsInfo = $this->getProducts($token);
        $products = $productsInfo['results'];
        $totalProductsNumber = $productsInfo['total'];
        return $this->render('index',['data' => $data,'products'=>$products]);
    }

    public function getProducts($token)
    {
        $url = 'http://10.100.28.205/mbfun_server_new/index.php';
        $para['m'] = 'Product';
        $para['a'] = 'ProductClsCommonSearchFilter';
        $para['brandCode'] = 'adidas';
        $para['keyWord'] = '';
        $para['pageSize'] = 20;
        $para['pageIndex'] = 1;
        $para['sortInfo'] = array(
            'desc' => '-1',
            'sortField' => 3
        );
        $para['token'] = $token;

        $result = $this->http($url,$para);
        $resultArr = json_decode($result,true);

        return $resultArr;
    }
}
