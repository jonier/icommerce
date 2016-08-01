<?php 

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Post;

/**
* 
*/
class PostsController extends Controller
{
	public function actionIndex()
	{
		$model = new Post();
		
		
		if($model->load(Yii::$app->request->post()) && $model->validate()){
			$model->save();
		}else{
			return $this->render("add", ["model" => $model]);
		}

		
	}
	
}
