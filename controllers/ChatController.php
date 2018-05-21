<?php

namespace app\controllers;

use app\models\Messages;
use Yii;
use app\models\ChatSessions;
use app\models\Users;
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
        if ($id) {
            if (intval($id) != $id) throw new NotFoundHttpException();
            return $this->render('chat', ['chatId' => $id]);
        } else {
            return $this->render('index');
        }
    }

    public function actionMessages($id) {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $messages = Messages::find()->where(['chat_id'=>$id])->all();
        return $messages;
    }

    public function actionCreateChatSession()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $token = Yii::$app->request->get('token');
        $chatId = Yii::$app->request->get('chat_id');
        $user = Users::getUserByToken($token);
        if ($user) {
            $hash = Yii::$app->getSecurity()->generateRandomString(32);

            $session = new ChatSessions();
            $session->id = $hash;
            $session->chat_id = $chatId;
            $session->user_id = $user->id;
            $session->is_active = 1;
            if ($session->save()) {
                return (['success' => true, 'token' => $hash]);
            }
        } else {
            // TODO : error handler
        }
    }
}
