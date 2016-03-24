<?php

namespace app\controllers;

use app\models\CustomProductForm;
use app\models\CustomRichTextForm;
use app\models\CustomShopHeaderForm;
use app\models\ShopForm;
use app\models\ShopHeaderForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;


class ProductController extends AbstractController
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

    public function actionDetail()
    {
        $code = Yii::$app->request->get('IDS');
        //$url = 'http://10.100.28.2/mbfun_server_new/index.php';
        $url = 'local.mb.com/index.php';
        $para['m'] = 'Product';
        $para['a'] = 'getProductDetails';
        $para['code'] = '521694';
        $para['deviceCode'] = '99DFBAED-81E9-41C1-9465-B1F6D0063F63';
        $para['token'] = 'd4bb2c7e5aed2a3a6a4ac6fdcf18bb52';
        $para['_platform'] = '1';
        $para['cid'] = '1';

        $result = $this->http($url,$para);

        $productDetailsInfo = json_decode($result,true);
        $productDetails = $productDetailsInfo['data'];
        print_r($productDetails);die;

        $this->getRecommendProductList();
        $this->getCommentList($code);
        return $this->render('detail',['productDetails' => $productDetails]);
    }

    public function getRecommendProductList()
    {
        //$url = 'http://10.100.28.205/mbfun_server_new/index.php';
        $url = 'local.mb.com/index.php';
        $para['m'] = 'Product';
        $para['a'] = 'getRecommedProductList';
        $para['type'] = '1';
        $para['num'] = '20';
        $para['page'] = '1';
        $result = $this->http($url,$para);
        $recommendProductList = json_decode($result,true);
        //print_r($recommendProductList);

    }

    public function getCommentList($code)
    {
        //$url = 'http://10.100.28.205/mbfun_server_new/index.php';
        $url = 'local.mb.com/index.php';
        $para['m'] = 'Comment';
        $para['a'] = 'getCommentList';
        $para['type'] = '2';
        $para['num'] = '20';
        $para['page'] = '0';
        $para['tid'] = $code;
        $result = $this->http($url,$para);
        $commentList = json_decode($result,true);
        //print_r($commentList);
    }

    public function actionPromotion()
    {
        $url = 'http://10.100.28.205/mbfun_server_new/index.php';
        $url = 'local.mb.com/index.php';
        $para['m'] = 'Promotion';
        $para['a'] = 'PlatFormDisAmount';
        $para['aid'] = 334;
        //$para['cartList'] = '[{"cid":"0","num":"1","aid":"334","barcode":"51502430146"},{"cid":"0","num":"1","aid":"334","barcode":"51712962146"}]';
        $para['cartList'] = '[{"cid":"0","num":"1","aid":"334","barcode":"20200533139"},{"cid":"0","num":"2","aid":"334","barcode":"20150692135"}]';
        $para['cid'] = 1;
        $para['token'] = 'f535cfe94d63fb8659e0ccebbc94d95c';
        $para['userId'] = 'c6072492-7289-4788-a150-411f28723c38';


        $result = $this->http($url,$para);

        $info = json_decode($result,true);
        print_r($info);

    }

    public function actionBrand()
    {
        $url = 'http://10.100.28.205/mbfun_server_new/index.php';
        $url = 'local.mb.com/index.php';
        $para['m'] = 'Common';
        $para['a'] = 'getBrandCodeByProductCode';
        $para['productCode'] = '515024';

        $result = $this->http($url,$para);

        $info = json_decode($result,true);
        print_r($info);
    }

    public function actionOrder()
    {
        $url = 'local.mb.com/index.php';
        $para['m'] = 'Order';
        $para['a'] = 'OrderCreate';
        $para['address'] = '北京东路240';
        $para['cartList'] = '[{"cid":"0","num":"1","cartId":"12105","aid":"334","barcode":"51712962146"},{"cid":"0","num":"1","cartId":"12019","aid":"334","barcode":"51502430146"}]';
        $para['cid'] = 2;
        $para['token'] = 'fbfbec60bfea74fbb08b442105e12a76';
        $para['userId'] = '8e5f2dc0-0990-dae9-9354-6a7c6f69aede';
        $para['city'] = '上海市';
        $para['country'] = '中国';
        $para['county'] = '黄浦区';
        $para['invoicE_TITLE'] = '不开发票';
        $para['memo'] = '';
        $para['paymentAry'] = '[{"payment":"ON_LINE","paY_TYPE":"ZFB","makE_AMOUNT":"0.00"}]';
        $para['posT_CODE'] = '200002';
        $para['province'] = '上海';
        $para['receiver'] = '测试';
        $para['senD_REQUIRE'] = '';
        $para['source'] = 'IOS';
        $para['teL_PHONE'] = '13918245670';
        $para['type'] = '5';
        $para['uniquesessionid'] = 'E279E8AF-1B20-4DE2-A146-98FD278CA8422016-02-25 15:10:24:963Q7QSR4KFW3ZX';
        $para['vouchers'] = '';
        $para['vouchersId'] = '';

        $result = $this->http($url,$para);

        $info = json_decode($result,true);
        print_r($info);
    }

    public function actionDelivery()
    {
        // orderno=15081413074310381646&expno=V112233&expcode=ems&splitflag=0&skulist=28914200130,22618100146
        $url = 'local.mb.com/index.php';
        $para['m'] = 'Order';
        $para['a'] = 'deliveryOrder';
        $para['orderno'] = '14563041141000411011';
        $para['expno'] = 'V112233';
        $para['expcode'] = 'ems';
        $para['splitflag'] = '0';
        $para['skulist'] = '51712962146';

        $result = $this->http($url,$para);

        $info = json_decode($result,true);
        print_r($info);
    }

    public function actionRule()
    {
        // orderno=15081413074310381646&expno=V112233&expcode=ems&splitflag=0&skulist=28914200130,22618100146
        $url = 'local.mb.com/index.php';
        $para['m'] = 'Common';
        $para['a'] = 'getMatchConditionGiftTips';
        //$para['criteria'] = '{"200":"1","300":"2","500":"3"}';
        $para['criteria'] = array('200'=>1,'300'=>2,'500'=>3);
        $para['paidPrice'] = '269';

        $result = $this->http($url,$para);

        print_r($result);
    }

    public function actionConfirm()
    {
        // orderno=15081413074310381646&expno=V112233&expcode=ems&splitflag=0&skulist=28914200130,22618100146
        $url = 'local.mb.com/index.php';
        $para['m'] = 'Order';
        $para['a'] = 'OrderConfirm';
        $para['orderno'] = '14569073001000411120';
        $para['token'] = '623511f8e165e4b20179c3f370373dd3';
        $para['orderId'] = '411120';
        $para['cid'] = 1;

        $result = $this->http($url,$para);

        print_r($result);
    }

    public function actionToken()
    {
        // orderno=15081413074310381646&expno=V112233&expcode=ems&splitflag=0&skulist=28914200130,22618100146
        $url = 'local.mb.com/index.php';
        $para['m'] = 'Message';
        $para['a'] = 'getMessageDetaisV2';
        $para['token'] = '4cb4dfa69bc28f08b9e072892eadbfd3';
        $para['cid'] = 2;

        $result = $this->http($url,$para,'GET');

        print_r($result);
    }

    public function actionHome()
    {
        //根据user_id 找到layout

        $data = array(
            'dataSource' => '',
            'showNumber' => '6',
            'listTypeUsed' => 0,
            'listType' => array()
        );
        echo json_encode($data);
        die;
        $layout = array(
            'shopHeader'=>array(
                'avatar'=>'https://dn-kdt-img.qbox.me/upload_files/shop2.png?imageView2/2/w/200/h/200/q/75/format/webp',
                'shopName' => 'ceshi',
                'css' => array(
                    'backgroundColor' => '#8ce83d',
                    'backgroundImage' => 'https://dn-kdt-img.qbox.me/upload_files/2014/12/05/bb3503203766425965b7517336df979d.png'
                ),
                'shopContent'=>array(
                    'allGoods' => '2'
                )
            ),
            'customNav' => array(
                array(
                    'title' => 'aa',
                    'link' => 'www.baidu.com'
                ),
                array(
                    'title' => 'bb',
                    'link' => 'www.baidu.com'
                ),
                array(
                    'title' => 'cc',
                    'link' => 'www.baidu.com'
                ),
                array(
                    'title' => 'dd',
                    'link' => 'www.baidu.com'
                )
            ),
            'customImageSwiper' => array(
                array(
                    'link' => 'www.baidu.com',
                    'image' => 'https://dn-kdt-img.qbox.me/upload_files/2014/12/05/eab0fe2b458472eb103e5b5927b319ad.png?imageView2/2/w/730/h/0/q/75/format/webp'
                ),
                array(
                    'link' => 'www.sina.com',
                    'image' => 'https://dn-kdt-img.qbox.me/upload_files/2014/12/05/eab0fe2b458472eb103e5b5927b319ad.png?imageView2/2/w/730/h/0/q/75/format/webp'
                )
            ),
            'customImageAd' => array(
                'title'=>'hello',
                'link' => 'www.baidu.com',
                'image' => 'https://dn-kdt-img.qbox.me/upload_files/2014/12/05/eab0fe2b458472eb103e5b5927b319ad.png?imageView2/2/w/730/h/0/q/75/format/webp'
            ),
            'customSearch' => array(
                'action' => 'https://wap.koudaitong.com/v2/search',
                'method' => 'GET',
                'placeholder' => '商品搜索：请输入商品关键字'
            ),
            'customTitle' => array(
                'backgroundColor'=>'#f1fb2d',
                'title' => 'hello world',
                'subTitle' => 'abc'
            ),
            'customProductList' => array(
                'dataSource' => '',
                'showNumber' => '6',
                'listTypeUsed' => 0,
                //0=大图 1=小图 2=一大两小 3=详细列表
                'listType' => array(
                    0=>array(
                        'name' => '大图',
                        'sizeType' => array(
                            0=>array(
                                'name' => '卡片样式 ',
                                'buyBtn' => array(0,1,2,3),
                                'showName' => 0,
                                'showDescription' => 0,
                                'showPrice' => 0,
                            ),
                            1=>array(
                                'name' => '极简样式 ',
                                'showName' => 0,
                                'showDescription' => 0,
                                'showPrice' => 0,
                            )
                        )
                    ),
                    1=>array(
                        'sizeType' => 0
                    ),
                    2=>array(
                        'sizeType' => 0
                    ),
                    3=>array(
                        'sizeType' => 0
                    )

                ),
                'showShoppingButton' => 0,
                'showShoppingButtonStyle' => array(
                ),
                array(
                    'image' => 'https://dn-kdt-img.qbox.me/upload_files/2015/05/14/Fh1ZR74CpUm0s85svgQuU-MQ3oQd.png?imageView2/2/w/600/h/600/q/75/format/webp',
                    'id'=>'22222',
                    'title' => 'title',
                    'description' => 'description',
                    'price' => 'price',
                    'url' => 'www.baidu.com',
                    'type'=>2
                ),
                array(
                    'image' => 'https://dn-kdt-img.qbox.me/upload_files/2015/05/14/Fh1ZR74CpUm0s85svgQuU-MQ3oQd.png?imageView2/2/w/600/h/600/q/75/format/webp',
                    'id'=>'22222',
                    'title' => 'title',
                    'description' => 'description',
                    'price' => 'price',
                    'url' => 'www.baidu.com',
                    'type'=>2
                )
            ),
        );
        return $this->render('home',['layout' => $layout]);
    }

    public function actionTest()
    {
        return $this->render('test.twig', ['test' => 'hello,yii']);
    }
    public function actionPage()
    {
        $userId = '023dd6e5-0570-472b-be14-7ecb957e787f';
        $connection = Yii::$app->db;
        $sql = "SELECT * FROM `mbfun_user_page` where user_id="."'$userId'";
        $command = $connection->createCommand($sql);
        $pages = $command->queryAll();
        return $this->render('page', ['pages' => $pages]);
        //return $this->render('page',['layout' => '']);
    }

    public function actionShopPageEdit()
    {

        $pageId = Yii::$app->request->get('page_id');
        $connection = Yii::$app->db;
        $sql = "SELECT * FROM `mbfun_user_page_category`";
        $command = $connection->createCommand($sql);
        $pageCategory = $command->queryAll();


        foreach($pageCategory as $item) {
            $category[$item['id']] = $item['name'];
        }

        //1.get user page plugin

        $sql = "SELECT * FROM `mbfun_user_page_plugin` where page_id=".$pageId;
        $command = $connection->createCommand($sql);
        $pagePlugins = $command->queryAll();
        $models = array();
        foreach($pagePlugins as $plugin) {
            $attr = json_decode($plugin['attr'],true);

            if($plugin['name'] == 'CustomShopHeader') {
                $customShopHeader = new CustomShopHeaderForm();
                $customShopHeader->setTitle($attr['title']);
                $customShopHeader->setDescription($attr['description']);
                $customShopHeader->setCategory($attr['category']);
                $customShopHeader->setBackgroundColor($attr['backgroundColor']);
                $customShopHeader->setId($plugin['id']);
                $models[$plugin['name']] = $customShopHeader;
            }elseif($plugin['name'] == 'CustomRichText') {
                $customRichText = new CustomRichTextForm();
                $customRichText->setBackgroundColor($attr['backgroundColor']);
                $customRichText->setFullScreen($attr['fullScreen']);
                $customRichText->setContent($attr['content']);
                $customRichText->setId($plugin['id']);
                $models[$plugin['name']] = $customRichText;
            }
        }


//        $customRichText = new CustomRichTextForm();
//        $models['CustomRichText'] = $customRichText;

        $customProduct = new CustomProductForm();
        $models['CustomProduct'] = $customProduct;

        if(Yii::$app->request->isPost) {
            $postData = Yii::$app->request->post();
            foreach($models as $pluginName => $model) {
                $modelData = $postData[ucfirst($pluginName).'Form'];
                $sql = "SELECT * FROM `mbfun_plugin` where name="."'$pluginName'";
                $command = $connection->createCommand($sql);
                $pluginInfo = $command->queryAll();
                $pluginId = $pluginInfo[0]['id'];
                $pluginType = $pluginInfo[0]['type'];
                $pluginAttr = json_encode($modelData);
                if(isset($modelData['id']) && $modelData['id']) {
                    //if there is id , we update it
                    $connection->createCommand()->update('mbfun_user_page_plugin', [
                        'attr' => $pluginAttr
                    ])->execute();
                }else {
                    $connection->createCommand()->insert('mbfun_user_page_plugin', [
                        'page_id'=>$pageId,
                        'plugin_id'=>$pluginId,
                        'name'=>$pluginName,
                        'type'=>$pluginType,
                        'attr' => $pluginAttr,
                        'create_time'=>date('Y-m-d H:i:s'),
                        'update_time'=>date('Y-m-d H:i:s')
                    ])->execute();
                }
            }
            $this->redirect(array('product/shop-page-edit','page_id'=>$pageId));
        }


        $products = array('code1','code2');
        return $this->render('pageEdit.php', ['models' => $models,'category'=>$category,'products'=>$products]);
    }

    public function actionShopPageTemplate()
    {
        //select template
        $connection = Yii::$app->db;
        $sql = "SELECT * FROM `mbfun_user_page_template`";
        $command = $connection->createCommand($sql);
        $templates = $command->queryAll();
        $shopPageNewForm = '';
        return $this->render('pageTemplate.php', ['model' => $shopPageNewForm,'templates'=>$templates]);

    }

    public function actionShopPageNew()
    {
        $templateId = Yii::$app->request->get('template_id');
        $connection = Yii::$app->db;
        //1.create a new page
        $connection->createCommand()->insert('mbfun_user_page', [
            'user_id' => '023dd6e5-0570-472b-be14-7ecb957e787f',
            'category_id' => 0,
            'title' => 'default',
            'template_id' => $templateId,
            'create_time' => '0000-00-00 00:00:00',
            'update_time' => '0000-00-00 00:00:00',
            'is_homepage' => 0,
            'is_draft' => 1
        ])->execute();
        $pageId = Yii::$app->db->getLastInsertID();

        //2.copy template plugin to user plugin
        $sql = "SELECT * FROM `mbfun_user_page_template_plugin` where template_id=".$templateId;
        $command = $connection->createCommand($sql);
        $templatePlugins = $command->queryAll();
        $datas = array();
        foreach($templatePlugins as $plugin) {
            $pluginId = $plugin['plugin_id'];

            $sql = "SELECT * FROM `mbfun_plugin` where id=".$pluginId;
            $command = $connection->createCommand($sql);
            $pluginInfo = $command->queryAll();

            $pluginName = $pluginInfo[0]['name'];
            $pluginType = $pluginInfo[0]['type'];

            $data = array(
                'page_id' => $pageId,
                'plugin_id' => $pluginId,
                'name' => $pluginName,
                'type' => $pluginType,
                'attr' => $plugin['attr'],
                'create_time' => date('Y-m-d H:i:s'),
                'update_time' => date('Y-m-d H:i:s'),
            );
            $datas[] = $data;
        }

        if(!empty($datas)) {
            $command->batchInsert('mbfun_user_page_plugin',array('page_id','plugin_id','name','type','attr','create_time','update_time'),$datas)->execute();
        }

        //redirect to user page edit
        $this->redirect(array('product/shop-page-edit','page_id'=>$pageId));

    }



}
