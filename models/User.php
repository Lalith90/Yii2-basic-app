<?php

namespace app\models;
//use \yii\base\BaseObject; this is first come with default login array
use yii\db\ActiveRecord;
use \yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    /*Default login details come with project
    /*   public $id;
    public $username;
     public $password;
     public $authKey;
     public $accessToken;



      *
      * private static $users = [
         '100' => [
             'id' => '100',
             'username' => 'admin',
             'password' => 'admin',
             'authKey' => 'test100key',
             'accessToken' => '100-token',
         ],
         '101' => [
             'id' => '101',
             'username' => 'demo',
             'password' => 'demo',
             'authKey' => 'test101key',
             'accessToken' => '101-token',
         ],
     ];*/
    /**
     * {@inheritdoc}
     */
    public $password_repeat;
//above variable is created because of need to other filed in form
    public function rules()
    {
        // create rules to create form
        return[
            ['username','required'],
            ['username','unique','targetClass'=>'\app\models\User','message'=>'This User Name Is Already Exists'],
            ['username','string','max'=>255,'min'=>3],
            ['username','filter','filter'=>'trim'],

            ['password','required'],
            ['password','string','max'=>255,'min'=>3],
            ['password','filter','filter'=>'trim'],
            ['password','compare','compareAttribute'=>'password_repeat'],//-> this create to need match with repeat psd filed

            ['password_repeat','required'],
            ['password_repeat','string','max'=>255,'min'=>3],
            ['password_repeat','filter','filter'=>'trim'],           //use trim to remove space in password
            ['password_repeat','compare','compareAttribute'=>'password'],//-> this create to need match with  psd filed
        ];
    }

    /*
    this attributeLabels() -> can be used change form display field

    public function attributeLabels()
      {
        return [
            'username'=>'Name',
            'password'=>'Password J',
            'password_repeat'=>'Password R'

        ];
      }*/

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
       /* return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;*/
       return static::findOne(['id'=>$id]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        /*foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;*/
        return static::findOne(['accessToken'=>$token]);

    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        /*foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;*/
       return static::findOne(['username'=>$username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
