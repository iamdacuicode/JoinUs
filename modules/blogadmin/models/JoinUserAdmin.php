<?php

namespace app\modules\blogadmin\models;

use Yii;

/**
 * This is the model class for table "{{%join_user_admin}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $nickname
 * @property string $authkey
 * @property string $accesstoken
 * @property string $lasttime
 * @property string $updatetime
 * @property integer $loginnum
 * @property string $thumb
 * @property string $lastip
 * @property string $email
 */
class JoinUserAdmin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%join_user_admin}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'authkey', 'accesstoken', 'lasttime', 'updatetime'], 'required'],
            [['lasttime', 'updatetime'], 'safe'],
            [['loginnum'], 'integer'],
            [['username', 'password', 'authkey', 'accesstoken', 'thumb'], 'string', 'max' => 255],
            [['nickname'], 'string', 'max' => 50],
            [['lastip', 'email'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'nickname' => 'Nickname',
            'authkey' => 'Authkey',
            'accesstoken' => 'Accesstoken',
            'lasttime' => 'Lasttime',
            'updatetime' => 'Updatetime',
            'loginnum' => 'Loginnum',
            'thumb' => 'Thumb',
            'lastip' => 'Lastip',
            'email' => 'Email',
        ];
    }
}
