<?php

namespace app\controllers;

use yii;
use app\models\Businesses;

use app\models\User;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\AccessRule;

class BusinessesController extends \yii\web\Controller
{
    public function behaviors()
     {
            return [
                'access' => [
                    'class' => AccessControl::className(),
                    'ruleConfig' => [
                        'class' => AccessRule::className(),
                    ],
                    'only' => ['create','update','delete'],
                    'rules'=>[
                        [
                            'actions'=>['create','update'],
                            'allow' => true,
                            'roles' => ['@']
                        ],
                        [
                            'actions' => ['delete'],
                            'allow' => true,
                            'roles' => ['100']
                        ]
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],


            ];
        }

        public function actionCreate()
        {
            $model = new businesses();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]); 
            }
            
            return $this->render('create', compact('model'));
        
        }
        public function actionDelete($id)
        {
           $model = Businesses::findOne($id);

        Yii::$app->db->createCommand()
        ->delete('biz_categories','business_id=:id',[':id'=>$id])
        ->execute();

        $model->delete();
        
        return $this->redirect(['/businesses/index']);
        }

        public function actionIndex()
        {
            $model = businesses::find()->orderBy('id')->all();;

            return $this->render('index',compact('model'));
        }

        public function actionUpdate($id)
        {
            $model = businesses::findOne($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
            return $this->render('update', compact('model')); 
        }

        public function actionView($id)
        {
            $model = businesses::findOne($id);
            return $this->render('view', compact('model'));
        }

    }
