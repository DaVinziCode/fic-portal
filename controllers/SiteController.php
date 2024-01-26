<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Equipment;
use app\models\Fic;
use app\models\FicProduct;
use app\models\FicTechService;
use app\models\Inquiry;
use app\models\Product;
use app\models\Province;
use app\models\TechService;
use dominus77\sweetalert2\Alert;
use Exception;
use yii\data\Pagination;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $inquire = new Inquiry();
        // $ficListing = FIC::getFics();
        $tech_category = TechService::find()->all();
        $product_category = Product::find()->all();
        $ficProduct = FicProduct::find()->all();

        $query = FicTechService::find();
        $count = $query->count();
        $pages = new Pagination(
            [
                'totalCount' => $count,
                'pageSize' => 6
            ]
        );

        $techservices = FicTechService::find()
            ->where(['is_public' => 1]) // Filter by is_public status
            ->orderBy(['id' => SORT_DESC])
            ->limit(4) // Limit the number of results to 4
            ->all();

        $submittedSuccessfully = false;

        if ($inquire->load(Yii::$app->request->post())) {


            // foreach ($ficListing as $ficList) {
            //     $inquire->fic_id = $ficList->id;
            // }

            $result = Yii::$app->mailer->compose()
                ->setTo($inquire->email)
                ->setSubject($inquire->subject)
                ->setHtmlBody('Good day Mr/Ms. ' . '<b>' . $inquire->name . '</b>' .
                    ' We have received your inquiry regarding to our products/services.' .
                    '  Our customer support will update you soon.<br><br>Regards,<br>Industrial Technology Development Institute')
                ->send();


            if (true) {

                $submittedSuccessfully = true;
                $inquire->type = 3;
                $inquire->save();
                $inquire = new Inquiry();
            }
        }

        return $this->render(
            'index',
            [
                'inquire' => $inquire,
                // 'ficListing' => $ficListing,
                'product_category' => $product_category,
                'ficProduct' => $ficProduct,
                'techservices' => $techservices,
                'pages' => $pages,
                'tech_category' => $tech_category,
                'submittedSuccessfully' => $submittedSuccessfully,
            ]

        );
    }

    public function actionServices()
    {
        $tech_category = TechService::find()->all();
        $tech_public = FicTechService::find()->all();

        return $this->render('_services', [
            'tech_category' => $tech_category,
            'tech_public' => $tech_public,
        ]);
    }




    public function actionEquipment()
    {
        $tech_categories = TechService::find()->all();
        $renderedViews = [];

        foreach ($tech_categories as $tech) {
            $id = $tech->id;

            if ($id) {
                $tech_category = TechService::find()->where(['id' => $id])->one();
                $technologies = FicTechService::find()->where(['tech_service_id' => $id])->andWhere(['is_public' => 1])->orderBy(['id' => SORT_DESC])->limit(6)->all();

                $renderedView = $this->renderAjax('ajax/equipment', [
                    'tech_category' => $tech_category,
                    'technologies' => $technologies,
                ]);

                $renderedViews[] = $renderedView;
            } else {
                return $this->render('error', [
                    'name' => '404',
                    'message' => 'Invalid request',
                ]);
            }
        }

        // Assuming you want to return an array of rendered views
        return $renderedViews;
    }



    public function actionTechnology($id)
    {

        if ($id) {

            $tech_category = TechService::find()->where(['id' => $id])->one();
            $technologies = FicTechService::find()->where(['tech_service_id' => $id])->orderBy(['id' => SORT_DESC])->limit(6)->all();

            $model = FicTechService::find()
                ->where(['tech_service_id' => $id])
                ->all();

            return $this->renderAjax('ajax/techservice', [
                'model' => $model,
                'tech_category' => $tech_category,
                'technologies' => $technologies,

            ]);
        } else {
            return $this->render('error', [
                'name' => '404',
                'message' => 'Invalid request',
            ]);
        }
    }

    public function actionDetails($id)
    {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            $product = Product::find()->where(['id' => $id])->one();
            $equip = Equipment::getEquipments();
            return $this->renderAjax('ajax/details-modal', [
                'product' => $product,
                'equip' => $equip,
            ]);
        }
    }

    public function actionContact()
    {

        return $this->render(
            'index'
        );
    }

    public function actionInquiry()
    {

        $inquire = new Inquiry();
        $ficListing = FIC::getFics();
        if ($inquire->load(Yii::$app->request->post())) {
        }
        return $this->render(
            'inquiry',
            [
                'inquire' => $inquire,
                'ficListing' => $ficListing
            ]
        );
    }


    /**
     * Creates a new TblCategory model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateInquiry()
    {
        $request = Yii::$app->request;
        $model = new Inquiry();
        $techServiceId = $request->get('techServiceId');

        $techService = TechService::findOne($techServiceId);


        if ($request->isAjax) {
            /*x`
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Inquiry",
                    'content' => $this->renderAjax('create-inquiry', [
                        'model' => $model,

                    ]),

                ];
            }
        }
        return $this->render('create-inquiry', [
            'model' => $model,

        ]);
    }

    public function actionProductInquiry()
    {
        $request = Yii::$app->request;
        $model = new Inquiry();
        $productId = $request->get('productId');
        $product = Product::findOne($productId);


        if ($request->isAjax) {
            /*x`
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Product Inquiry",
                    'content' => $this->renderAjax('product-inquiry', [
                        'model' => $model,

                    ]),

                ];
            }
        }
        return $this->render('product-inquiry', [
            'model' => $model,

        ]);
    }

    public function actionInquire()
    {
        $model = new Inquiry();

        if ($model->load(Yii::$app->request->post())) {
            $techService = Yii::$app->request->post('techServiceId');

            $service = FicTechService::findOne($techService);

            if ($techService !== null) {
                $ficEmail = $service->fic->email; // Set an initial value

                $fictech = TechService::findOne(['id' => $service->tech_service_id]);


                if ($service->equipment_id == null) { // IF EQUIPMENT ID IS EQUAL TO NULL
                    $emailSent = Yii::$app->mailer->compose()
                        // ->setFrom('DOST-FIC')
                        ->setTo($model->email) //send to CUSTOMER
                        ->setCc($ficEmail) // Add CC recipient(s) here
                        ->setSubject($model->subject)
                        ->setHtmlBody('Dear ' . '<b>' . $model->name . '</b>' . ',' . '<br><br>' .
                            ' Good day! We wanted to inform you that we have received your inquiry regarding our technology services.<br>' .
                            ' Your interest in our offerings is greatly appreciated, and we are excited to assist you.<br>' .
                            'Here are the following details for your reference:<br><br>' .
                            ' <table style = "border: 1px solid black; border-collapse:collapse;"> 

                            <tr>
                            <th style = "border: 1px solid black; border-collapse:collapse;"><b>Technology Title </b></th>
                            <th style = "border: 1px solid black; border-collapse:collapse;"><b>Equipment </th> 
                            <th style = "border: 1px solid black; border-collapse:collapse;"><b>Charging Type</b></th>
                            <th style = "border: 1px solid black; border-collapse:collapse;"><b>Charging Fee</b></th>
                             <th style = "border: 1px solid black; border-collapse:collapse;"><b>Description</b></th>
                            </tr>
                            
                            <tr>
                            <td style = "border: 1px solid black; border-collapse:collapse;  text-align: center;">' . $fictech['name'] . '</td>
                            <td style = "border: 1px solid black; border-collapse:collapse;   text-align: center;">' . 'N/A' . '</td>
                            <td style = "border: 1px solid black; border-collapse:collapse;   text-align: center;">' . $service['charging_type'] . '</td>
                            <td style = "border: 1px solid black; border-collapse:collapse;   text-align: center;">' . $service['charging_fee'] . '</td>
                            <td style = "border: 1px solid black; border-collapse:collapse;   text-align: center;">' . $service['description'] . '</td>
                            </tr>

                            </table>' .

                            '  <br>Our dedicated customer support team is already reviewing your inquiry and will provide you with the necessary <br> information and updates as soon as possible.
                            <br><br><b>Best Regards,</b><br>Technological Services Division<br>' .
                            'DOST-ITDI' . '<br>' .
                            '(02) 8683-7750 to 69 local 2269' . '<br>' .
                            '09178979308' . '<br><br>' .
                            '<b>Please Note:' . '</b>' . 'This email is automatically generated. Replies to this email will not be received or processed. <br> If you have any questions or need assistance, please contact our customer support team through the appropriate channels.')
                        ->send();
                } else {
                    // IF EQUIPMENT ID IS NOT EQUAL TO NULL
                    $emailSent = Yii::$app->mailer->compose() //send to customer
                        // ->setFrom('DOST-FIC')
                        ->setTo($model->email)
                        ->setCc($ficEmail) // Add CC recipient(s) here
                        ->setSubject($model->subject)
                        ->setHtmlBody('Dear ' . '<b>' . $model->name . '</b>' . ',' . '<br><br>' .
                            ' Good day! We wanted to inform you that we have received your inquiry regarding our technology services.<br>' .
                            ' Your interest in our offerings is greatly appreciated, and we are excited to assist you.<br>' .
                            'Here are the following details for your reference:<br><br>' .
                            ' <table style = "border: 1px solid black; border-collapse:collapse;"> 

                            <tr>
                            <th style = "border: 1px solid black; border-collapse:collapse;"><b>Technology Title </b></th>
                            <th style = "border: 1px solid black; border-collapse:collapse;"><b>Equipment </th> 
                            <th style = "border: 1px solid black; border-collapse:collapse;"><b>Charging Type</b></th>
                            <th style = "border: 1px solid black; border-collapse:collapse;"><b>Charging Fee</b></th>
                             <th style = "border: 1px solid black; border-collapse:collapse;"><b>Description</b></th>
                            </tr>
                            
                            <tr>
                            <td style = "border: 1px solid black; border-collapse:collapse;  text-align: center;">' . $fictech['name'] . '</td>
                            <td style = "border: 1px solid black; border-collapse:collapse;   text-align: center;">' . $service->equipment['model'] . '</td>
                            <td style = "border: 1px solid black; border-collapse:collapse;   text-align: center;">' . $service['charging_type'] . '</td>
                            <td style = "border: 1px solid black; border-collapse:collapse;   text-align: center;">' . $service['charging_fee'] . '</td>
                            <td style = "border: 1px solid black; border-collapse:collapse;   text-align: center;">' . $service['description'] . '</td>
                            </tr>

                            </table>' . '  <br>Our dedicated customer support team is already reviewing your inquiry and will provide you with the necessary <br> information and updates as soon as possible.
                            <br><br><b>Best Regards,</b><br>Technological Services Division<br>' .
                            'DOST-ITDI' . '<br>' .
                            '(02) 8683-7750 to 69 local 2269' . '<br>' .
                            '09178979308' . '<br><br>' .
                            '<b>Please Note:' . '</b>' . 'This email is automatically generated. Replies to this email will not be received or processed. <br> If you have any questions or need assistance, please contact our customer support team through the appropriate channels.')
                        ->send();
                    //send email to customer end
                }

                if ($emailSent) {

                    $model->fic_tech_id = $service->id;
                    $model->fic_id = $service->fic_id;
                    $model->type = 1;
                    $model->save();
                    return '<b><br>' . '<center>' . 'Inquiry submitted successfully. Please check your email for further instructions. Thank you!
                            ' . '</center>' . '<br></b>';
                }
            }
        }

        return $this->render(
            'index',
            [
                'model' => $model,
            ]
        );
    }

    public function actionInquireProduct()
    {
        $model = new Inquiry();

        if ($model->load(Yii::$app->request->post())) {
            $product = Yii::$app->request->post('productId');
            $ficProduct = FicProduct::findOne($product);

            if ($product !== null) {
                $ficEmail = $ficProduct->fic->email; // Set an initial value

                $prod = Product::findOne(['id' => $ficProduct->product_id]);

                // IF EQUIPMENT ID IS NOT EQUAL TO NULL
                $emailSent = Yii::$app->mailer->compose() //send to customer
                    // ->setFrom('DOST-FIC')
                    ->setTo($model->email)
                    ->setCc($ficEmail) // Add CC recipient(s) here
                    ->setSubject($model->subject)
                    ->setHtmlBody('Dear ' . '<b>' . $model->name . '</b>' . ',' . '<br><br>' .
                        ' Good day! We wanted to inform you that we have received your inquiry regarding our product.<br>' .
                        ' Your interest in our offerings is greatly appreciated, and we are excited to assist you.<br>' .
                        'Here are the following details for your reference:<br><br>' .
                        ' <table style = "border: 1px solid black; border-collapse:collapse;"> 

                            <tr>
                            <th style = "border: 1px solid black; border-collapse:collapse;"><b>Product Name </b></th>
                            <th style = "border: 1px solid black; border-collapse:collapse;"><b>Category </th> 
                            <th style = "border: 1px solid black; border-collapse:collapse;"><b>Equipment </b></th>
                             <th style = "border: 1px solid black; border-collapse:collapse;"><b>Description </b></th>
                            </tr>
                            
                            <tr>
                            <td style = "border: 1px solid black; border-collapse:collapse;  text-align: center;">' . $prod['name'] . '</td>
                            <td style = "border: 1px solid black; border-collapse:collapse;   text-align: center;">' . $ficProduct['name'] . '</td>
                             <td style = "border: 1px solid black; border-collapse:collapse;   text-align: center;">' . $prod->productEquipments[0]->equipment['model'] . '</td>
                            <td style = "border: 1px solid black; border-collapse:collapse;   text-align: center;">' . $ficProduct['description'] . '</td>
                            </tr>

                            </table>' . '  <br>Our dedicated customer support team is already reviewing your inquiry and will provide you with the necessary <br> information and updates as soon as possible.
                            <br><br><b>Best Regards,</b><br>Technological Services Division<br>' .
                        'DOST-ITDI' . '<br>' .
                        '(02) 8683-7750 to 69 local 2269' . '<br>' .
                        '09178979308' . '<br><br>' .
                        '<b>Please Note:' . '</b>' . 'This email is automatically generated. Replies to this email will not be received or processed. <br> If you have any questions or need assistance, please contact our customer support team through the appropriate channels.')
                    ->send();
                //send email to customer end
            }

            if ($emailSent) {

                $model->fic_product_id =  $product;
                $model->fic_id = $ficProduct->fic_id;
                $model->type = 2;
                $model->save();
                return '<b><br>' . '<center>' . 'Inquiry submitted successfully. Please check your email for further instructions. Thank you!
                            ' . '</center>' . '<br></b>';
            }
        }

        return $this->render(
            'index',
            [
                'model' => $model,
            ]
        );
    }







    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionGetProvince()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $id = end($_POST['depdrop_parents']);
            $provinces = Province::findAll(['region_id' => $id]);
            $selected = null;

            if ($id != null && count($provinces) > 0) {
                $selected = '';
                foreach ($provinces as $i => $province) {
                    $out[] = ['id' => $province['id'], 'name' => $province['name']];

                    // if ($i == 0) {selects-regions
                    //     $selected = $province['id'];
                    // }
                }


                return ['output' => $out, 'selected' => $selected];
            }
        }

        return ['output' => '', 'selected' => ''];
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionEmail()
    {
        if ($this->request->isPost) {
            $post = Yii::$app->request->post();
            $name = $post['name'];
            $userEmail = $post['email'];
            $subject = $post['subject'];
            $selectedEmail = FIC::findOne($post['state_11'])->email;
            $message = $post['message'];

            $email = Yii::$app->mailer->compose('@app/views/site/email', [
                'message' => $message,
                'mail' => $userEmail,
                'name' => $name
            ])
                ->setFrom(['itdi_dev@ficphil.com' => $name])
                ->setTo($userEmail)
                ->setSubject($subject)
                ->send();

            Yii::$app->session->setFlash(Alert::TYPE_SUCCESS, [
                'title' => 'Email has been sent',
                'text' => "Please wait for the reply",
            ]);
        } else {
            Yii::$app->session->setFlash(Alert::TYPE_ERROR, [
                'title' => 'Email not sent: Error',
                'text' => "Try resending",
            ]);
        }
        return $this->redirect('index');
    }
    public function actionEmailComputation()
    {
        if ($this->request->isPost) {
            $post = YII::$app->request->post();
            $name = $post['name'];
            $userEmail = $post['email'];
            $message = $post['message'];
            $ficEmail = Fic::findOne($post['state_7'])->email;
            $contact = $post['contact'];
            $equipment = Equipment::findOne($post['FicTechService']['equipment_id'])->model;
            $email = Yii::$app->mailer->compose('@app/views/site/email', [
                'message' => $message,
                'mail' => $userEmail,
                'name' => $name,
                'equipment' => $equipment
            ])
                ->setFrom(['itdi_dev@ficphil.com' => $name])
                ->setTo('maechael108@gmail.com')
                ->setSubject($equipment)
                ->send();

            Yii::$app->session->setFlash(Alert::TYPE_SUCCESS, [
                'title' => 'Email has been sent',
                'text' => "Please wait for the reply",
            ]);
        } else {
            Yii::$app->session->setFlash(Alert::TYPE_ERROR, [
                'title' => 'Email not sent: Error',
                'text' => "Try resending",
            ]);
        }
        return $this->redirect('index');
    }
}
