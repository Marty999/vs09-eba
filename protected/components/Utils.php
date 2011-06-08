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
    function show_youtube($text)
    {
            $VID_WID = 320;
            $VID_HEI = 240;

            for ($k=0; $k<9; $k++)
            {
                    $text .= ' ';
                    $find = 'youtube.com/watch?v=';
                    $pos = strpos($text, $find);
                    if ($pos === false)
                    {
                            break;
                    }
                    $len = strlen($text);
                    for ($i=$pos; $i>=0; $i--)
                    {
                            if (substr($text, $i, 6) == 'http:/')
                            {
                                    $pos1 = $i;
                                    break;
                            }
                    }
                    for ($i=$pos; $i<$len; $i++)
                    {
                            if (in_array($text[$i], array('&', ' ', "\r", "\n", ',', "\t")))
                            {
                                    $pos2 = $i;
                                    break;
                            }
                    }
                    $link1 = substr($text, $pos1, $pos2 - $pos1);
                    $link2 = str_replace('/watch?v=', '/v/', $link1);

                    $embed =	'<object width="' . $VID_WID . '" height="' . $VID_HEI . '">'.
                                            '<param name="movie" value="' . $link2 . '"></param>'.
                                            '<param name="allowFullScreen" value="true"></param>'.
                                            '<param name="allowscriptaccess" value="always"></param>'.
                                            '<embed src="' . $link2 . '" type="application/x-shockwave-flash" '.
                                            'allowscriptaccess="always" allowfullscreen="true" '.
                                            'width="' . $VID_WID . '" height="' . $VID_HEI . '"></embed></object>';

                    $text = str_replace($link1, $embed, $text);
            }
            return $text;
    }

}
?>
