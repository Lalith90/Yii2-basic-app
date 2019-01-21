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
     public function actionView(){
        return " ";
    }
     public function actionCreate(){
       $model = new Employee();

       $data = [];
       $data['model'] = $model;
       $data['designation'] = Designation::find()->all();

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
    public function actionUpdate(){
        return " ";
    }
    public function actionDelete(){
        return " ";
    }
}

