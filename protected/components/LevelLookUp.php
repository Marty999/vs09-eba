<?php

class LevelLookUp{
      const BAND = 0;
      const MEMBER = 1;
      const ADMIN  = 2;
      // For CGridView, CListView Purposes
      public static function getLabel( $level ){
          if($level == self::BAND)
             return 'Band';
          if($level == self::MODERATOR)
             return 'Moderaator';
          if($level == self::ADMIN)
             return 'Administraator';
          return false;
      }
      // for dropdown lists purposes
      public static function getLevelList(){
          return array(
                 self::BAND=>'Band',
                 self::MODERATOR=>'Moderaator',
                 self::ADMIN=>'Admin');
    }
}