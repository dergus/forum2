<?php

namespace app\controllers;

use Yii;
use app\models\Category;
use app\models\Forum;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
      
    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex($id)
    {   $category=Category::findOne($id);
        $dataProvider = new ActiveDataProvider([
            'query' => Forum::find()->where(['category_id'=>$id])->with(['category'])->orderBy('position ASC')
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'category'=>$category
        ]);
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
