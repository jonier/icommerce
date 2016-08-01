<?php

namespace app\controllers;

use yii\web\Session;
use yii\web\Controller;
use app\models\Category;

class CategoryController extends Controller
{
	public function init()
	{
		$session = new Session();
		$session->open();

		if(empty($session['account_id'])){
			return $this->redirect('/backend/index');
		}

		parent::init();
	}

	public function actionIndex(){
		$categories = Category::find()
			->orderBy('id Desc')
			->all();

		return $this->render('/Category/Index', ['categories' => $categories, 'n' => 1]);
	}

	public function actionForm()
	{
		$session = new Session();
		$session->open();

		$category = new Category();

		if(!empty($_POST))
		{
			if(!empty($_POST['Category']['id']))
			{
				$id = $_POST['Category']['id'];
				$category = Category::findOne($id);
			}	


			$category->code = $_POST['Category']['code'];
			$category->name = $_POST['Category']['name'];
			$category->remark = $_POST['Category']['remark'];

			if($category->save())
			{
				$session->setFlash('message', 'Saved.');
				return $this->redirect(['index']);
			}
		}

		return $this->render('/Category/Form', [
				'category' => $category,
				'icon' => 'glyphicon glyphicon-plus',
				'title' => 'New Category'
			]);
	}

	public function actionDelete($id){
		
		Category::findOne($id)->delete();

		$session = new Session();
		$session->open();

		$session->setFlash('message', 'Delete.');

		
		
		return $this->redirect(['index']);
	}

	public function actionEdit($id)
	{
		$category = Category::findOne($id);

		return $this->render('/Category/Form', [
				'category' => $category,
				'icon' => 'glyphicon glyphicon-pencil',
				'title' => 'Edit Category'
			]);
	}
}