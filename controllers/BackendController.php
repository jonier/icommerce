<?php
	namespace app\controllers;

	use yii\web\Controller;
	use yii\web\Session;
	use app\models\Account;
	

	class BackendController extends Controller
	{
		public function actionIndex(){

			$account = new Account();

			if(!empty($_POST)){
				$account = Account::find()
					->where ('username = :username AND password = :password', [
						':username' => $_POST['Account']['username'],
						':password' => $_POST['Account']['password']
						])
					->one();

				if(!empty($account)){
					$session = new Session();
					$session->open();
					$session['account_id'] = $account->id;
					$session['account_name'] = $account->name;

					return $this->redirect(['/backend/home']);

				}else{
					$account = new Account();
					$account->username = $_POST['Account']['username'];
					$account->password = $_POST['Account']['password'];
				}
			}

			$session = new Session();
			$session->open(); 

			if(!empty($session['account_id'])){
				return $this->redirect(['/backend/home']);
			}

			return $this->render('/Backend/Index', ['account' => $account]);
		}

		public function actionHome(){
			return $this->render('/Backend/Home');
		}

		public function actionLogout(){
			$session = new Session();
			$session->open();

/*
			echo "<pre>";			
			var_dump($session);
			echo "</pre>";
			exit;
*/
			unset($session['account_id']);
			unset($session['account_name']);
			unset($session['member_id']);

			return $this->redirect('/backend/index');
		}
	}