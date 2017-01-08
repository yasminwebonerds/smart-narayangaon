<?php

namespace backend\controllers;

use Yii;
use common\models\Categories;
use common\models\CategoriesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;

/**
 * CategoriesController implements the CRUD actions for Categories model.
 */
class CategoriesController extends Controller
{
    /**
     * @inheritdoc
     */
       public function behaviors()
{
    return [
        'access' => [
            'class' => \yii\filters\AccessControl::className(),
            'only' => ['view','index','update','delete','create'],
            'rules' => [
            
                // allow authenticated users
                [
                    'allow' => true,
                    'roles' => ['@'],
                ],
                // everything else is denied
            ],
        ],
    ];
}

    /**
     * Lists all Categories models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategoriesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Categories model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Categories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Categories();
        if ($model->load(Yii::$app->request->post()) ) {            
            if(empty($model->parent_id))
            {    $model->parent_id=0;
                 $model->parent_id;
            }else{
                $model->parent_id;
            }
          //echo $model->logo_image;exit;
            
               $model->file = UploadedFile::getInstance($model, 'file');
               if(empty($model->file)){               
         	$model->logo_image = "default.png" ;      
               
               }else{
		                
                $imagename= 'categoriesicon/category_icon_'.rand(). '.' . $model->file->extension; 
                $model->file->saveAs(Yii::$app->params['imagePath'] . $imagename);
                $model->logo_image =  $imagename ;               
               //$model->save(false);
               }

               if($model->save()){                
                    return $this->redirect(['view', 'id' => $model->id]);
                }else{
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }                    
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Categories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save() ){
            
                $model->file = UploadedFile::getInstance($model, 'file');
                
                $imagename= 'categoriesicon/category_icon_'.rand(). '.' . $model->file->extension; 
                $model->file->saveAs(Yii::$app->params['imagePath'] . $imagename);
                $model->logo_image =  $imagename ;
                $model->save(false);                


            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Categories model.
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
     * Finds the Categories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Categories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Categories::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
