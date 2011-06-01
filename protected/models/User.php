<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property integer $level
 *
 * The followings are the available model relations:
 * @property Band[] $bands
 */
class User extends CActiveRecord
{
    public $password2;
    public $verifyCode;
    public $bandname;
    public $description;
	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, password2, verifyCode, email, level, bandname, description', 'required'),
			array('username', 'validateUsername'),
			array('username, password, password2, email', 'length', 'max'=>128),
                        array('email', 'email'),
                        array('password', 'length','min'=>6),
                        array('password2', 'matchPasswords'),
                        array('verifyCode', 'captcha', 'allowEmpty'=>!Yii::app()->user->isGuest),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, email, level', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'bands' => array(self::HAS_ONE, 'Band', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Kasutajanimi',
			'password' => 'Parool',
			'password2' => 'Parooli kordus',
			'email' => 'E-posti aadress',
			'bandname' => 'Bändi nimi',
                        'verifyCode' => 'Kontrollkood',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('level',$this->level);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

                
         /**
	 * Kontrollib kas sisestatud parool võrdub 
	 * @return bool 
         * @todo parooli crypt andmebaasis
	 */
        final function validatePassword($password){
            
             return $password===$this->password;
        }
        
        
         /**
	 * Kontrollib kas kasutajanimi on olemas juba
	 * validaator rules() meetodis!
	 */
	public function validateUsername($attribute,$params)
	{
		if(!$this->hasErrors())
		{
                        if($this->model()->exists(array(
                            'select'=>'username',
                            'condition'=>'username=:username',
                            'params'=>array(':username'=>$this->username),
                        )))
                            $this->addError('username','Selline kasutajanimi on juba olemas.');
		}
	}
         /**
	 * Kontrollib kas paroolid klapivad
	 * validaator rules() meetodis!
	 */
	public function matchPasswords($attribute,$params)
	{
		if(!$this->hasErrors())
		{

			if($this->password != $this->password2){
				$this->addError('password',''   );
				$this->addError('password2','Paroolid ei kattu.');
                        }
		}
	}
        
        
        /*
         * Uue kasutaja registreerimine
         * 
         */
        public function register(){
            
            Yii::log($this->attributes);
            if($this->save()){
                $band = new Band;
                $band->user_id = $this->id;
                $band->genre_id = 1;
                $band->activeSince = 1999;
                $band->name = $this->bandname;
                $band->description = $this->description;
                if($band->save(false)){
                        return true;
                        
                }
                else{
                    $this->deleteByPk($this->id);
                
                }                  
                                
            }
        }
        
        public function getBand(){
          if(!$this->id)
                  return false;
          
          $userband = Band::model()->find('user_id=:user_id', array(':user_id'=>$this->id));
                  return $userband;
          
      } 
}