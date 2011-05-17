<?php

/**
 * This is the model class for table "tbl_band".
 *
 * The followings are the available columns in table 'tbl_band':
 * @property integer $id
 * @property integer $user_id
 * @property integer $genre_id
 * @property string $name
 * @property string $description_short
 * @property string $description_long
 * @property integer $active_since
 * @property string $epost
 * @property string $webpage
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
			array('user_id, genre_id, name, description_short, description_long, active_since, epost, webpage', 'required'),
			array('user_id, genre_id, active_since', 'numerical', 'integerOnly'=>true),
			array('name, epost, webpage', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, genre_id, name, description_short, description_long, active_since, epost, webpage', 'safe', 'on'=>'search'),
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
			'description_short' => 'Description Short',
			'description_long' => 'Description Long',
			'active_since' => 'Active Since',
			'epost' => 'Epost',
			'webpage' => 'Webpage',
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
		$criteria->compare('description_short',$this->description_short,true);
		$criteria->compare('description_long',$this->description_long,true);
		$criteria->compare('active_since',$this->active_since);
		$criteria->compare('epost',$this->epost,true);
		$criteria->compare('webpage',$this->webpage,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}