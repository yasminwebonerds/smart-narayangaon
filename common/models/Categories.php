<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property string $category_name
 * @property integer $parent_id
 * @property string $description
 * @property string $logo_image
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $created_at
 * @property string $updated_at
 * @property integer $is_deleted
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;

    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_name', 'description'], 'required'],
            [['parent_id'], 'integer'],
            [['file'], 'file', 'extensions' => 'png, jpg'],
            [['description'], 'string'],
            [['category_name','file'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'category_name' => 'Category Name',
            'parent_id' => 'Parent ID',
            'description' => 'Description',
            'file' => 'Logo Image',
            // 'created_by' => 'Created By',
            // 'updated_by' => 'Updated By',
            // 'created_at' => 'Created At',
            // 'updated_at' => 'Updated At',
            // 'is_deleted' => 'Is Deleted',
        ];
    }
}
