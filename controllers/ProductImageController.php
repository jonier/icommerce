<?php 

namespace app\controllers;

use app\models\ProductImage;
use app\models\Product;
use yii\web\Session;
use yii\web\Controller;


class ProductImageController extends controller{

	public function init()
	{
		$session = new Session();
		$session->open();

		if(!empty($session['account_id']))
		{
			return $this->redirect('index.php?r=backend/index');
		}
		parent::init();
	}

	public function actionIndex($product_id)
	{
		$product = Product::findOne($product_id);
		$productImages = ProductImage::find()
			->where(['product_id' => $product_id]) 
			->orderBy('id DESC')
			->all();

		return $this->render('//ProductImage/index',[
				'product' => $productImages,
				'productImages' => $productImages,
				'n' => 1
			]);
	}

	public function actionForm($product_id)
	{
		$product = Product::findOne($product_id);
		$productImage = new ProductImage();

		if(!empty($_FILES['ProductImage']))
		{
			$img = $_FILES['ProductImage']['name']['url'];
			$ext = end((explode(".", $img)));

			$name = microtime();
			$name = str_replace(' ', '', $name);
			$name = str_replace('.', '', $name);

			$name = $name.'.'.$ext;
			$tmp = $_FILES['ProductImage']['tmp_name']['url'];
			$productImage->url = $name;

			move_uploaded_file($tmp, '../uploads'.$name);
		}

		if(!empty($_POST))
		{
			$ProductImage->name = $_POST['ProductImage']['nage'];
			$productImage->product_id = $product_id;

			if($productImage->save())
			{
				$session = new Session();
				$session->open();
				$session->setFlash('message', 'Data Save');

				return $this->redirect(['index', 'product_id' => $product_id]);
			}
		}

		return $this->render('//ProductImage/Form', [
				'product' => $product_id,
				'productImage' => $productImage
			]);
	}

	public function actionDelete($id)
	{
		$productImage = ProductImage::findOne($id);
		$product = $productImage->product;
		$imagen_url = $productImage->url;

		if($productImage->delete())
		{
			$session = new Session();
			$session->open();

			$session->setFlash('message', 'Data deleted');

			unlink('../uploads/'.$image_url);

			return $this->redirect(['index', 'product_id' => $product_id]);
		}
	}
}