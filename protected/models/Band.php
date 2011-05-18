<?php

/**
 * This is the model class for table "tbl_band".
 *
 * The followings are the available columns in table 'tbl_band':
 * @property integer $id
 * @property integer $user_id
 * @property integer $genre_id
 * @property string $name
 * @property string $description
 * @property integer $activeSince
 * @property string $website
 * @property string $email
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Genre $genre
 */
class Band extends CActiveRecord
{
        /**
	 * Returns the static model of the specified AR class.
	 * @return Band the static model class
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
		return 'tbl_band';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, genre_id, name, description, activeSince, website, email', 'required'),
			array('user_id, genre_id, activeSince', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			array('website, email', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, genre_id, name, description, activeSince, website, email', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'genre' => array(self::BELONGS_TO, 'Genre', 'genre_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'genre_id' => 'Genre',
			'name' => 'Name',
			'description' => 'Description',
			'activeSince' => 'Active Since',
			'website' => 'Website',
			'email' => 'Email',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('genre_id',$this->genre_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('activeSince',$this->activeSince);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
        
        /*
         * Kasutaja nimi
         */ 
        public function getUsername(){
            
            $user = User::model()->findByPk($this->user_id);
            Yii::trace($this->user_id,'getusername');
            return $user->username;
            
        }
}