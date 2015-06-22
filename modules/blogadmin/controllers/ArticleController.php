<?php

    /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    class ArticleController extends CController{
        public function actionShow(){
        $htmlData = '';
		if (! empty ( $_POST ['content'] )) 
		{
			if (get_magic_quotes_gpc ()) {
				$htmlData = stripslashes ( $_POST ['content'] );
				
			} else {
				$htmlData = $_POST ['content'];
			}
		}
			echo $htmlData;
            $this->renderPartial("show");
        }
        
        public function actionArtAdd(){
            $this->renderPartial("artAdd");
        }
        
        public function actionReply(){
            $this->renderPartial("artReply");
        }


/**
 * UBB 解析
 * @return string
 */
        
    }

