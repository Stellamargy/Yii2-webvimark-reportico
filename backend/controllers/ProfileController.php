<?php

namespace backend\controllers;
use Yii;
use backend\models\Profile;
use backend\models\ProfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class ProfileController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Profile models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProfileSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Profile model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

       
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Profile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
//     public function actionCreate()
// {
//     $model = new Profile();

//     // Assuming you want to assign the logged-in user to the profile
//     // For example, setting the `user_id` to the current logged-in user's ID
//     $model->user_id = Yii::$app->user->id; // Assign user_id from the logged-in user

//     if ($this->request->isPost) {
//         if ($model->load($this->request->post())) {
//             // Manually populate the related 'user' relation after loading data
//             $model->populateRelation('user_id', Yii::$app->user->identity->id); // Populating the 'user' relation

//             // Save the profile
//             if ($model->save()) {
//                 return $this->redirect(['view', 'id' => $model->id]);
//             }
//         }
//     } else {
//         $model->loadDefaultValues();
//     }

//     return $this->render('create', [
//         'model' => $model,
//     ]);
// }

public function actionCreate()
{
    $model = new Profile();

    // Assign the logged-in user's ID to the profile
    $model->user_id = Yii::$app->user->id;

    if ($this->request->isPost) {
        if ($model->load($this->request->post()) && $model->validate()) {
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                Yii::$app->session->setFlash('error', 'Profile creation failed.');
            }
        } else {
            // Log validation errors to Yii logs
            Yii::error($model->errors, 'profile-validation');

            // Display validation errors in session flash messages
            Yii::$app->session->setFlash('error', 'Please fix the validation errors.');
        }
    } else {
        $model->loadDefaultValues();
    }

    return $this->render('create', [
        'model' => $model,
    ]);
}





    /**
     * Updates an existing Profile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Profile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Profile::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
