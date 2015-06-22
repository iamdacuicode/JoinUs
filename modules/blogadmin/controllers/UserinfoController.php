<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    class UserinfoController extends CController{
        public function actionShow(){
            $this->renderPartial('show');
        }
        
        public function actionUserAdd(){
            $this->renderPartial("userAdd");
        }
        
    }

