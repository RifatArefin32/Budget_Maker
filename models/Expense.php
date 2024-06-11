<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "expense".
 *
 * @property int $id
 * @property string $title
 * @property int $amount
 * @property int $spent
 * @property int $remianing
 * @property int $created_at
 * @property int $updated_at
 */
class Expense extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'expense';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'amount'], 'required'],
            [['amount', 'spent', 'remianing', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    public function behaviors(){
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'amount' => 'Amount',
            'spent' => 'Spent',
            'remianing' => 'Remianing',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created At',
            'updated_by' => 'Updated At',
        ];
    }

    public function remainingAmount(){
        $this->remianing = $this->amount - $this->spent;
    }
}
