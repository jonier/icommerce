<?php

	namespace app\controllers;

	use yii\web\Controller;
	use yii\web\Session;
	use app\models\Account;


	class AccountController extends Controller
	{
		public function actionEdit()
		{
			$session = new Session();
			$session->open();

			$pf = $session['account_id'];

			$account = Account::find()
				->where (['id' => $pf])
				->one();

			if(!empty($_POST))
			{
				$account->name = $_POST['Account']['name'];
				$account->username = $_POST['Account']['username'];
				$account->password = $_POST['Account']['password'];
				$account->email = $_POST['Account']['email'];

				if($account->save())
				{
					$session->setFlash('message', 'Save Completed.');
					$session['account_name'] = $account->name;
					return $this->redirect('edit');
				}
			}

			return $this->render('/Account/edit', ['account' => $account]);
		}
	}