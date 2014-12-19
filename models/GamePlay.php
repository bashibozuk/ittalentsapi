<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "game_play".
 *
 * @property integer $id
 * @property integer $game_id
 * @property integer $user_id
 * @property string $start_time
 * @property string $end_time
 * @property integer $score
 */
class GamePlay extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'game_play';
    }

    public  function scenarios()
    {
        return array_merge(parent::scenarios(), [
            'start' => ['game_id', 'user_id', 'start_time'],
            'end' => ['game_id', 'score', 'end_time'],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['game_id', 'user_id'], 'required'],
            [['game_id', 'user_id', 'score'], 'integer'],
            [['score'], 'required', 'on' => 'end'],
            [['user_id'], 'exist', 'targetClass' => User::className(), 'targetAttribute' => 'id'],
            [['start_time', 'end_time'], 'safe'],
            [['end_time'], 'required', 'on' => 'end'],
            [['start_time'], 'required', 'on' => 'start'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'game_id' => 'Game ID',
            'user_id' => 'User ID',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'score' => 'Score',
        ];
    }

    public function isHighScore()
    {
        return self::find()->where('game_id = :game_id AND score > :score', [':game_id' => $this->game_id, ':score' => $this->score])->count() <= 99;
    }
}
