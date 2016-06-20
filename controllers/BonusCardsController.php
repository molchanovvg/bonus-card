<?php

namespace app\controllers;

use app\models\Sales;
use Yii;
use app\models\BonusCards;
use app\models\BonusCardsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * BonusCardsController implements the CRUD actions for BonusCards model.
 */
class BonusCardsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all BonusCards models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BonusCardsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BonusCards model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $sales_list = new ActiveDataProvider([
            'query' => \app\models\Sales::find()->where(array('bonus_cards_id' => $id))
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'sales_list' => $sales_list,
        ]);
    }

    /**
     * Creates a new BonusCards model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BonusCards();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BonusCards model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing BonusCards model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BonusCards model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BonusCards the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BonusCards::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionGenerate()
    {
        // Определяем последний номер в заданной серии
        $last_number = \app\models\BonusCards::find()->where(['serial' => Yii::$app->request->post('series') ])->max('number');

        for ($i=$last_number+1; $i<Yii::$app->request->post('count')+$last_number+1; $i++) {
            $model = new BonusCards();
            $model->serial = Yii::$app->request->post('series');
            $model->number = $i;
            $model->date_release = date("Y-m-d H:i:s");
            switch (Yii::$app->request->post('limit')) {
                case '1':
                    $future_date = strtotime("+1 year");
                    break;
                case '2':
                    $future_date = strtotime("+6 month");
                    break;
                case '3':
                    $future_date = strtotime("+1 month");
                    break;
            }
            $model->date_expiration=date("Y-m-d H:i:s", $future_date);
            $model->sum = rand(100, 10000);
            $model->status = 'not_activate';
            if (!$model->save()) {
                echo "Error model save: ";
                var_export($model->errors);
                return -1;
            }
        }

        return $this->render('generate', [
            'count' => Yii::$app->request->post('count'),
            'limit' => Yii::$app->request->post('limit'),
            'series' => Yii::$app->request->post('series'),
        ]);


    }
}
