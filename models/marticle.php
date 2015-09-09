<?php
   class Marticle extends Models
   {
      function __construct() {
         parent::__construct();
      }

      public function getAll(){

         $this->dbsql->inner_join( array(
            'table' => array(
               array('name' => "article") ,
               array('name' => "admin" , 'on' => "article.arAuthor = admin.amId")
            ) ,
            'select' => "arId, arTitle, arDateStart, arDateEnd, amName"
         ));

         return $this->dbsql->result();
      }

      public function getById($id){
         $this->dbsql->select( array(
            'table' => "article" ,
            'where' => "arId = '" . $id . "'"
         ));

         $data = $this->dbsql->result();

         if ($data) $result = $data[0];
         else $result = array();

         return $result;
      }
   }

?>
