<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chat_sessions".
 *
 * @property string $id
 * @property int $user_id
 * @property int $chat_id
 * @property int $is_active
 *
 * @property Users $user
 */
class ChatSessions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chat_sessions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'chat_id', 'is_active'], 'required'],
            [['user_id', 'chat_id', 'is_active'], 'integer'],
            [['id'], 'string', 'max' => 32],
            [['id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'chat_id' => 'Chat ID',
            'is_active' => 'Is Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
