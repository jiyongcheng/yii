<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;


class SearchController extends AbstractController
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
        //http://10.100.22.212:8080/MBgoSearchSrv/search/qf/


        //$this->productClsCommonSearchFilter();

        $this->getProductbySearchKey();

        return '';
    }

    /*********************************************************************/
    //这边是获得所有筛选那边的结果接口，比如品牌 颜色  尺码 价格
    //screenProductListByBG

    public function pcGetSearchKey()
    {
        $url = "local.mb.com/index.php";
        $para['m'] = 'PcSearch';
        $para['a'] = 'getSearchKey';
        $para['keyword'] = '';
        $para['sortType'] = 1;
        $para['sortField'] = 3;
        $para['sizeCode'] = '';
        $para['priceRange'] = '1-1000';
        $para['discountRange'] = '3-6';
        $para['color'] = '';
        $para['cid'] = '';
        $para['brand'] = 'adidas';
        $para['productId'] = '';

        $result = $this->http($url,$para);
//        $resultArr = json_decode($result,true);

        return $result;
    }


    //_platform=1&_soa=1&a=getSearchKey&cid=332&m=Search&token=39b2adc20053a5bcfec376c8a950385b
    public function getSearchKey()
    {
        $url = "local.mb.com/index.php";
        $url = 'http://10.100.28.2/mbfun_server_new/index.php';
        $para['m'] = 'Search';
        $para['a'] = 'getSearchKeyNew';
        $para['_platform'] = '1';
        $para['_soa'] = '1';
        $para['keyword'] = '亲子';
        $para['token'] = '39b2adc20053a5bcfec376c8a950385b';
        $para['token'] = 'd20b2a62cb167b226c4e80ef856cec97';
//        $para['sortType'] = 1;
//        $para['sortField'] = 3;
//        $para['sizeCode'] = '';
//        $para['priceRange'] = '1-1000';
//        $para['discountRange'] = '3-6';
//        $para['color'] = '';
//
//        $para['brand'] = 'adidas';
//        $para['productId'] = '';

        $result = $this->http($url,$para);
//        $resultArr = json_decode($result,true);
        print_r($result);
        return $result;
    }

    /*********************************************************************/

    /*information

    productId, productCode, productName, marketPrice,brandName, brandCode, stock, salesPrice, imgUrl,updateTime,salesPrice
    */
    public function getProductbySearchKey()
    {
        //$url = 'http://10.100.28.205/mbfun_server_new/index.php';
        $url = "local.mb.com/index.php";
        $para['m'] = 'Search';
        $para['a'] = '';
        $para['brand'] = 'getProductListByKeys';
        $para['token'] = '28b39828fe0ea078cd1a603676f74b0e';
        $para['sortType'] = 1;
        $para['page'] = 0;
        $para['keyword'] = '';
        $para['sortField'] = '';
        $para['sizeCode'] = '';
        $para['priceRange'] = '';
        $para['discountRange'] = '';
        $para['color'] = '';
        $para['cid'] = '';
        $para['productId'] = '';
        $para['searchType'] = 2;
        $para['useNewSearchEngine'] = 1;


        $result = $this->http($url,$para);
//        $resultArr = json_decode($result,true);
        print_r($result);
    }



    public function productClsCommonSearchFilter()
    {
        //$url = 'http://10.100.28.205/mbfun_server_new/index.php';
        $url = "local.mb.com/index.php";
        $para['m'] = 'Product';
        $para['a'] = 'ProductClsCommonSearchFilter';
        $para['brandCode'] = 'adidas';
        $para['pageSize'] = 2;
        $para['pageIndex'] = 1;
        $para['sortInfo'] = array(
            'desc' => '-1',
            'sortField' => 3
        );
        $para['token'] = 'a16c0ed8edc1b835909df76afa60171b';
        $para['sortType'] = 1;
        $para['page'] = 0;
        $para['keyword'] = '';
        $para['sortField'] = '';
        $para['sizeCode'] = '';
        $para['priceRange'] = '';
        $para['discountRange'] = '';
        $para['color'] = '';
        $para['CategoryId'] = '';
        $para['productId'] = '';


        $result = $this->http($url,$para);
        $resultArr = json_decode($result,true);
print_r($result);
        return $result;
    }

    public function getUserProductDetailsById()
    {
        $url = "local.mb.com/index.php";
        $para['m'] = 'Product';
        $para['a'] = 'getUserProductDetailsById';

        $para['color_code'] = '';
        $para['cate_id'] = '';
        $para['brand_code'] = '';


        $result = $this->http($url,$para);
//        $resultArr = json_decode($result,true);
        print_r($result);
    }

    public function searchProductListByUpload()
    {
        $url = "local.mb.com/index.php";
        $para['m'] = 'Product';
        $para['a'] = 'searchProductListByUpload';

        $para['pageSize'] = 20;

        $para['brandCode'] = 'adidas';
        $para['pageNo'] = 1;
        $para['sortType'] = 1;
        $para['sortField'] = 3;
        $para['color'] = '';
        $para['brand'] = '';
        $para['cid'] = 0;
        $para['word'] = '鞋';

        $result = $this->http($url,$para);
        print_r($result);
    }

    public function getBrandDetails()
    {
        $url = "local.mb.com/index.php";
        $para['m'] = 'Search';
        $para['a'] = 'getBrandDetails';
        $para['brandCode'] = 0;


        $result = $this->http($url,$para);
        print_r($result);
    }

    public function pcProductClsCommonSearchFilter()
    {
        $url = "local.mb.com/index.php";
        $para['m'] = 'PcSearch';
        $para['a'] = 'ProductClsCommonSearchFilter';
        $para['pageIndex'] = 1;
        $para['keyword'] = '';
        $para['token'] = 'a16c0ed8edc1b835909df76afa60171b';
        $para['pageSize'] = 20;
        $para['sortType'] = 1;
        $para['sortField'] = 3;
        $para['sizeCode'] = '';
        $para['priceRange'] = '1-1000';
        $para['discountRange'] = '3-6';
        $para['color'] = '';
        $para['cid'] = '';
        $para['brand'] = 'adidas';
        $para['productId'] = '';
        $para['searchType'] = '';

        $result = $this->http($url,$para);
//        $resultArr = json_decode($result,true);

        return $result;
    }

    public function pcGetProductListByKey()
    {
        $url = "local.mb.com/index.php";
        $para['m'] = 'Search';
        $para['a'] = 'getProductListByKey';
        $para['pageIndex'] = 0;
        $para['keyword'] = '鞋';
        $para['pageSize'] = 20;
        $para['token'] = 'a16c0ed8edc1b835909df76afa60171b';
        $para['sortType'] = 1;
        $para['sortField'] = 'price';
        $para['sizeCode'] = '';
        $para['priceRange'] = '1-1000';
        $para['discountRange'] = '3-6';
        $para['color'] = '';
        $para['cid'] = '';
        $para['brand'] = '';
        $para['productId'] = '';
        $para['searchType'] = 1;


        $result = $this->http($url,$para);
//        $resultArr = json_decode($result,true);
        print_r($result);
    }




    //still has another interface getSameProductList in commonAction use the search engine function



    public function testNewSearchEngine()
    {
        $url = "http://10.100.22.229:18088/es-search-sys/commonQuery.json";
        $para['m'] = 'Search';
        $para['a'] = 'getSearchKey';
        $para['keyword'] = '';
        $para['sortType'] = 1;
        $para['sortField'] = 3;
        $para['sizeCode'] = '';
        $para['priceRange'] = '1-1000';
        $para['discountRange'] = '3-6';
        $para['color'] = '';
        $para['cid'] = '';
        $para['brand'] = 'adidas';
        $para['productId'] = '';

        $result = $this->http($url,$para);
//        $resultArr = json_decode($result,true);
        print_r($result);
        return $result;
    }

}
