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
    
    public static function getRelativePath( $path, $compareTo ) {
            // clean arguments by removing trailing and prefixing slashes
            if ( substr( $path, -1 ) == '/' ) {
                $path = substr( $path, 0, -1 );
            }
            if ( substr( $path, 0, 1 ) == '/' ) {
                $path = substr( $path, 1 );
            }

            if ( substr( $compareTo, -1 ) == '/' ) {
                $compareTo = substr( $compareTo, 0, -1 );
            }
            if ( substr( $compareTo, 0, 1 ) == '/' ) {
                $compareTo = substr( $compareTo, 1 );
            }

            // simple case: $compareTo is in $path
            if ( strpos( $path, $compareTo ) === 0 ) {
                $offset = strlen( $compareTo ) + 1;
                return substr( $path, $offset );
            }

            $relative  = array(  );
            $pathParts = explode( '/', $path );
            $compareToParts = explode( '/', $compareTo );

            foreach( $compareToParts as $index => $part ) {
                if ( isset( $pathParts[$index] ) && $pathParts[$index] == $part ) {
                    continue;
                }

                $relative[] = '..';
            }

            foreach( $pathParts as $index => $part ) {
                if ( isset( $compareToParts[$index] ) && $compareToParts[$index] == $part ) {
                    continue;
                }

                $relative[] = $part;
            }

            return implode( '/', $relative );
        }
}
?>
