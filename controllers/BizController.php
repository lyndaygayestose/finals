<?php

namespace app\controllers;
use app\models\Biz_categories;
use app\models\Categories;
use yii;

class BizController extends \yii\web\Controller
{
    public function actionCreate()
    {
        $model = new Biz_categories;

        if($model->load(Yii::$app->request->post()) && $model->save()){
            $this->redirect(['biz/index']);
        }

        return $this->render('create', compact('model'));
    }

    public function actionDelete($id)
    {
        $model = Biz_categories::findOne($id);

        Yii::$app->db->createCommand()
        ->delete('biz_categories','id=:id',[':id'=>$id])
        ->execute();

        $model->delete();
        
        return $this->redirect(['/biz/index']);
    }

    public function actionIndex()
    {
        $biz = Biz_categories::find()->orderBy('id')->all();
        
        return $this->render('index',['biz'=>$biz]);
    }

    public function actionUpdate($id)
    {
        $model = Biz_categories::findOne($id);

            if($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->redirect(['/biz/view', 'id'=>$id]);
        }

        return $this->render('update', compact('model'));
    }

    public function actionView($id)
    {
        $model = Biz_categories::findOne($id);

        return $this->render('view',compact('model'));
    }

}
