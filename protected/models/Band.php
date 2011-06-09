<?php

/**
 * This is the model class for table "tbl_band".
 *
 * The followings are the available columns in table 'tbl_band':
 * @property integer $id
 * @property integer $user_id
 * @property integer $genre_id
 * @property string $name
 * @property string $rating
 * @property string $description
 * @property integer $activeSince
 * @property string $website
 * @property string $fb_url
 * @property string $mp_url
 * @property string $yt_url
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
			array('name, genre_id, description', 'required'),
			//array('user_id, genre_id, name, description, activeSince, website, email', 'required'),
			array('user_id, genre_id, activeSince', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			array('website, email', 'length', 'max'=>255),
			array('website, fb_url, yt_url, mp_url', 'url'),
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
                        'albums' => array(self::HAS_MANY, 'Albums', 'band_id'),

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
			'genre_id' => 'Zanr',
			'name' => 'Nimi',
                        'rating' => 'Rating',
			'description' => 'Lühikirjeldus',
			'activeSince' => 'Active Since',
			'website' => 'Veebileht',
			'fb_url' => 'Facebook\'i aadress',
			'mp_url' => 'My Space\'i aadress',
			'yt_url' => 'Youtube\'i aadress',
			'email' => 'Email',
			'pics' => 'Pildid',
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
                $criteria->compare('rating',$this->rating,true);
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
        
        
        /*
         * 
         * 
         */
        public function listBands($q = false){
            
            Yii::import('application.extensions.alphapager.ApPagination');
            
            $criteria = new CDbCriteria();
            $alphaPages = new ApPagination('name');
            $alphaPages->setCharSet(array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','Õ','Ä','Ö','Ü','X','Y'));
            $alphaPages->activeNumbers = Band::model()->count("SUBSTRING(`name` FROM 1 FOR 1) BETWEEN '0' AND '9'") > 0;
            //teeb automaatselt instantsi CPaginationist
            $pages = $alphaPages->pagination;
            $activeCharCriteria=new CDbCriteria;
            
            // Select only the first letter of the attribute used for AlphaPager
            $activeCharCriteria->select='DISTINCT(LEFT(UPPER(`name`),1)) AS `name`'; 
            $chars = Band::model()->findAll($activeCharCriteria);

            // Add those characters to an array and assign them to activeCharSet
            foreach($chars as $char)
                $activeChars[]=$char->name;
            $alphaPages->activeCharSet=$activeChars;

            $alphaPages->applyCondition($criteria);
            
            if($q){        
               
                $criteria->condition='name LIKE :name';
                $criteria->params=array(':name'=>"%$q%");
            }
            
            $pages->setItemCount(Band::model()->count($criteria));
            $pages->applyLimit($criteria);
            
            // results per page
            $pages->pageSize=Yii::app()->params['bandPageSize'];
            $pages->applyLimit($criteria);
            
            $data->alphaPages = $alphaPages;
            $data->pages = $pages;
            $data->bands = Band::model()->findAll($criteria);
            
            return $data;
            
        }
}