<?php
	class SysteminfoController extends CController{
		public function actionInfo(){
			$this->renderPartial('info');
		}
	}