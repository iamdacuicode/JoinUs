<?php

class BlogadminModule extends CWebModule 
{   
    public function init() 
    {
        $this->setImport(
                            array( 
                                    'blogadmin.models.*', 
                                    'blogadmin.components.*', 
                            )
                    ); 
    } 
    public function beforeControllerAction($controller, $action) 
    {
        if(parent::beforeControllerAction($controller, $action)) 
            return true; 
        else 
            return false; 
    } 
                            
}
