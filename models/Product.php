<?php 

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Category;


class Product extends ActiveRecord
{
	public static function tableName()
	{
		return "products";
	}

	public function getCategory()
	{
		return $this->hasOne(Category::className(), ['id' => 'category_id']);
	}

	public function rules()
	{
		return [
			[['code', 'name', 'price', 'cost', 'qty'], 'required'],
			[['code'], 'unique']
		];
	}
}