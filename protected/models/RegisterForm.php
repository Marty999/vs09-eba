<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class RegisterForm extends CFormModel
{
	public $username;
	public $password;
	public $password2;


	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password password2', 'required'),
			array('password', 'matchPasswords'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'username'=>'Kasutajanimi',
			'password'=>'Parool',
			'password2'=>'Parooli kordus',
		);
	}

	/**
	 * Kontrollib kas paroolid klapivad
	 * validaator rules() meetodis!
	 */
	public function matchPasswords($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			if($this->password != $this->password2)
				$this->addError('password','Paroolid ei kattu.');
		}
	}

	/**
	 * Adds new user to database.
	 * @return boolean if is successful
	 */
	public function register()
	{
            Yii::trace(print_r($this->attributes),'register');
            
            $user = new User;
            $user->attributes = $this->attributes;
            if($user->save())
                return true;
	}
}
