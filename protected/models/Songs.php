<?php

/**
 * This is the model class for table "tbl_songs".
 *
 * The followings are the available columns in table 'tbl_songs':
 * @property integer $id
 * @property integer $album_id
 * @property string $name
 * @property string $yt_url
 *
 * The followings are the available model relations:
 * @property Albums $album
 */
class Songs extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Songs the static model class
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
		return 'tbl_songs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('album_id, name', 'required'),
			array('album_id', 'numerical', 'integerOnly'=>true),
			array('name, yt_url', 'length', 'max'=>255),
			array('yt_url', 'url'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, album_id, name, yt_url', 'safe', 'on'=>'search'),
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
			'album' => array(self::BELONGS_TO, 'Albums', 'album_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'album_id' => 'Album',
			'name' => 'Nimi',
			'yt_url' => 'Youtube video link',
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
		$criteria->compare('album_id',$this->album_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('yt_url',$this->yt_url,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}