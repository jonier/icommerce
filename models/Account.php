<?php
	namespace app\models;

	use yii\db\ActiveRecord;

	class Account extends ActiveRecord
	{
		public static function tableName(){
			return "accounts";
		}
	}

	