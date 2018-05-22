<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Users;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class RegisterForm extends Model
{
    public $username;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username'], 'required'],
            [['username'], 'validateUnique'],
        ];
    }
    public function validateUnique($attribute, $params)
    {
        $user = Users::find()->where(['name'=>$this->username])->one();
        if($user) {
            $this->addError($attribute, 'Username is already occupied.');
        }
    }
}
