<?php

class EbaWebUser extends CWebUser{
 
    protected $_model;
 
    function isAdmin(){
        $user = $this->loadUser();
        if ($user)
           
           return $user->level==LevelLookUp::ADMIN;
        return false;
    }
     
      public function getBand(){
          if(!$this->id)
                  return false;
          
          $userband = Band::model()->find('user_id=:user_id', array(':user_id'=>$this->id));
                  return $userband;
          
      }  
    // Load user model.
    protected function loadUser()
    {
        if ( $this->_model === null ) {
                $this->_model = User::model()->findByPk( $this->id );
        }
        return $this->_model;
    }
}