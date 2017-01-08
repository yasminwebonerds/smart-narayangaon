<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sliders".
 *
 * @property integer $id
 * @property string $caption
 * @property string $image
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $created_at
 * @property string $updated_at
 * @property integer $is_deleted
 */
class Sliders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $sliderimage;
    public static function tableName()
    {
        return 'sliders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['caption'], 'required'],
            // [['created_by', 'updated_by', 'is_deleted'], 'integer'],
            [['caption', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'caption' => 'Caption',
            'image' => 'Image',
            // 'created_by' => 'Created By',
            // 'updated_by' => 'Updated By',
            // 'created_at' => 'Created At',
            // 'updated_at' => 'Updated At',
            // 'is_deleted' => 'Is Deleted',
        ];
    }
    public function getCreatedBy(){
        return $this->hasOne(User::className(),['id'=>'created_by']);
    }

    public function getUpdatedBy(){
       return $this->hasOne(User::className(),['id'=>'updated_by']);
    }
}
