<?php
/**
 * Utils.php
 * 
 * Abifunktsioonid yii kasutamiseks
 * 
 * @author Martin Ojaste
 * @version 1.0
 * @package sample
 */

class Utils {
    
    /*
     * Kasutajatele teadete saatmiseks
     * @param string $type annab klassi ja välimuse. valikud: success warning error tip secure info message download purchase print
     * @param string $title teatekasti tiitel
     * @param string $message teatekasti sisu
     */
    public static function setFlash($type, $title, $message, $autoclose = false,$id = false) {
        if($id == 0)
            $id = rand(1, 999999);
        if($autoclose)
            $autoclose = 'autoclose';
        Yii::app()->user->setflash($id, array('type' => $type, 'title' => $title, 'content' => $message, 'autoclose' => $autoclose) );
    }
}
?>
