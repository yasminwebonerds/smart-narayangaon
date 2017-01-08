<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vendor_categories".
 *
 * @property integer $id
 * @property integer $vendor_id
 * @property integer $category_id
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $created_at
 * @property string $updated_at
 * @property integer $is_deleted
 */
class VendorCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vendor_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vendor_id', 'category_id'], 'required'],
            [['vendor_id', 'category_id'], 'integer'],
        ];
    }

    // public function getVendorCategories(){
    //     return $this->hasOne(Categories::className(),['id'=>'id']);
    // }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vendor_id' => 'Vendor ID',
            'category_id' => 'Category ID',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_deleted' => 'Is Deleted',
        ];
    }
}
