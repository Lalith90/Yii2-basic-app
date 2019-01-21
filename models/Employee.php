<?php
namespace app\models;

use yii\db\ActiveRecord;



class Employee extends ActiveRecord{

    public function rules()
    {
        return [
            ['name','required'],
            ['name','string','min'=>3],

            ['birthday','required'],

            ['nic','required'],
            ['nic','unique','targetClass'=>'\app\models\Employee','message'=>'This NIC Is Already Exists'],
            ['nic','string','min'=>10,'max'=>12],

            ['mobile','required'],
            ['mobile','unique','targetClass'=>'\app\models\Employee','message'=>'This Mobile Number Is Already Exists'],
            ['mobile','string','min'=>10,'max'=>10],

            ['land','string','min'=>10,'max'=>10],

            ['designation_id','required','message' => 'You should have to select designation'],
            ['designation_id','exist','targetClass' => Designation::className(),'targetAttribute'=>['designation_id'=>'id']],

            ['description','safe'],
            //100% need to validation criteria but if safe is good for unavailable validation
        ];
    }

    public function attributeLabels()
    {
        return[
                'name'=>'Name',
                'birthday'=>'Birth date',
                'nic'=>'NIC Number',
                'mobile'=>'Mobile',
                'land'=>'Land',
                'designation_id'=>'Designation',
                'description'=>'Description'

        ];

    }

    public function getDesignation(){
        return $this->hasOne(Designation::className(),['id'=>'designation_id']);
    }
}