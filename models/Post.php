<?php 

namespace app\models;
use yii\db\ActiveRecord;

/**
* 
*/
class Post extends ActiveRecord
{
	
	public static function tableName()
	{
		return "posts";
	}

	public function rules()
	{
		return [
			[["title, content"], "required"],
			[["content"], "string"],
			[["title"], "string", "max" => 255]
		];
	}

	public function attributeLabels()
	{
		return [
			'id' => 'Id',
			'title' => 'Titulo',
			'content' => 'Contenido',
		];
	}
}