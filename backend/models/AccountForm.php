<?php
namespace backend\models;

use yii\base\Model;
use Yii;

/**
 * Account form
 */
class AccountForm extends Model
{
    public $username;
    public $password;
    public $passwordConfirm;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [ 'username', 'filter', 'filter' => 'trim' ],
            [ 'username', 'required' ],
            [
                'username',
                'unique',
                'targetClass' => '\common\models\User',
                'message' => Yii::t('frontend', 'This username has already been taken.'),
                'filter' => function ($query) {
                    $query->andWhere([ 'not', [ 'id' => Yii::$app->user->id ] ]);
                }
            ],
            [ 'username', 'string', 'min' => 1, 'max' => 255 ],
            [ 'password', 'string' ],
            [ [ 'passwordConfirm' ], 'compare', 'compareAttribute' => 'password' ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('backend', 'Username'),
            'password' => Yii::t('backend', 'Password'),
            'passwordConfirm' => Yii::t('backend', 'Password Confirm')
        ];
    }
}
