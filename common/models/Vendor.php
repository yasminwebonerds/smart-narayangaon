<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vendor".
 *
 * @property integer $id
 * @property string $date
 * @property string $shop_name
 * @property string $shop_address
 * @property string $time_from
 * @property string $time_to
 * @property string $shop_owner
 * @property string $description
 * @property string $mobile
 * @property string $opt_mobileno
 * @property string $email
 * @property string $opt_email
 * @property double $map_location
 * @property string $collected_by
 * @property string $webingeer_coupon
 */
class Vendor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'vendor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'shop_name', 'shop_address', 'time_from', 'time_to', 'shop_owner', 'description', 'mobile', 'opt_mobileno', 'email', 'opt_email', 'map_location', 'collected_by', 'webingeer_coupon','weekly_off'], 'required'],
            [['date', 'time_from', 'time_to'], 'safe'],
            [['mobile', 'opt_mobileno'], 'integer'],
            [['map_location'], 'number'],
            [['webingeer_coupon'], 'string'],
            [['shop_name', 'shop_address','shop_image', 'shop_owner', 'description', 'email', 'opt_email', 'collected_by'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'shop_name' => 'Shop Name',
            'category_id' => 'Category Id',
            'subcategory_id' => 'Subcategory Id',
            'shop_address' => 'Shop Address',
            'shop_image' => 'Shop Image',
            'time_from' => 'Time From',
            'time_to' => 'Time To',
            'shop_owner' => 'Shop Owner',
            'description' => 'Description',
            'mobile' => 'Mobile',
            'opt_mobileno' => 'Opt Mobileno',
            'email' => 'Email',
            'opt_email' => 'Opt Email',
            'map_location' => 'Map Location',
            'collected_by' => 'Collected By',
            'webingeer_coupon' => 'Webingeer Coupon',
            'weekly_off' => 'Weekly Off'
        ];
    }
}
