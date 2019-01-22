<?php

namespace app\controllers;

use app\models\Designation;
use app\models\Employee;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * 
 */
class EmployeeController extends Controller
{
	
	 public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
               
                'rules' => [
                    [
                        'actions' => ['view','create','update','delete'], // those are needed to do need to login to the system
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index'], // login or not login
                        'allow' => true,
                        'roles' => ['@','?'],
                    ],
                ],
            ]
        ];
    }

     public function actionIndex(){
       $data = [];
       $data['employee'] = Employee::find()->all();
       return $this->render('table', $data);
    }
     public function actionView($id){
         $model = Employee::findOne($id);

         $data = [];
         $data['model'] = $model;
         return $this->render('view', $data);

    }
     public function actionCreate(){
       $model = new Employee();

       $data = [];
       $data['model'] = $model;
       $data['designation'] = Designation::find()->all();
       $data['btnText'] = 'Add';
       $data['title'] = 'Employee Creat Form';

       if ($model->load(\Yii::$app->request->post())){
                $model->date = date('Y-m-d H:i:s');
                if ($model->validate()){
                    $model->save();
                    return $this->redirect(['employee/index']);
                }else{
                    return $this->render('form',$data);
                }
       }else{
        return $this->render('form',$data);
       }
    }
    public function actionUpdate($id){
        $model = Employee::findOne($id);

        $data = [];
        $data['model'] = $model;
        $data['designation'] = Designation::find()->all();
        $data['btnText'] = 'Update';
        $data['title'] = 'Update '.$model->name.' Details';

        if ($model->load(\Yii::$app->request->post())){

            if ($model->validate()){
                $model->update();
                return $this->redirect(['employee/index']);
            }else{
                return $this->render('form',$data);
            }
        }else{
            return $this->render('form',$data);
        }

    }
    public function actionDelete($id){
	     /*$model = Employee::findOne($id);
         $model->delete();   */
	     Employee::findOne($id)->delete();

        return $this->redirect(['employee/index']);
    }
}

