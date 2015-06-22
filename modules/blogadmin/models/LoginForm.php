<?php
namespace app\modules\blogadmin\models;
use Yii;
use yii\base\Model;
use yii\captcha\Captcha;
/**
 * ContactForm is the model behind the contact form.
 */
class LoginForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha', 'message'=>'ÑéÖ¤Âë´íÎó'],
            //array('verifyCode', 'captcha', 'allowEmpty'=>!Captcha::checkRequirements()),
        ];

//        return [
//                    ['verifyCode', 'required'],
//                    ['verifyCode', 'captcha'],
//        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => '',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param  string  $email the target email address
     * @return boolean whether the model passes validation
     */
//    public function contact($email)
//    {
//        if ($this->validate()) {
//            Yii::$app->mailer->compose()
//                ->setTo($email)
//                ->setFrom([$this->email => $this->name])
//                ->setSubject($this->subject)
//                ->setTextBody($this->body)
//                ->send();
//
//            return true;
//        } else {
//            return false;
//        }
//    }
}

