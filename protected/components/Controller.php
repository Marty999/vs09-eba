<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column2';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
        
//        public function render($view, $data = null, $return = false, $options = null)
//        {
//            $output = parent::render($view, $data, true);
//
//            $compactor = Yii::app()->contentCompactor;
//            if($compactor == null)
//                throw new CHttpException(500, Yii::t('messages', 'Missing component ContentCompactor in configuration.'));
//
//            $output = $compactor->compact($output, $options);
//
//            if($return)
//                return $output;
//            else
//                echo $output;
//        }
}