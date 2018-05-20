<?php

namespace app\controllers;

use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ChatController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex($id = null)
    {
        if($id) {
            if(intval($id) != $id) throw new NotFoundHttpException();
            return $this->render('chat', ['chat_id'=>'id']);
        } else {
            return $this->render('index');
        }
    }
}
