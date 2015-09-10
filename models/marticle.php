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
               array('name' => "admin" , 'on' => "article.arAuthor = admin.amId") ,
               array('name' => "category" , 'on' => "article.arCategory = category.catId")
            ) ,
            'select' => "arId, arTitle, arAuthor, arDateStart, arDateEnd, arContent, arBarcode, arPict, catName, amName"
         ));

         return $this->dbsql->result();
      }

      public function getById($id){
         $this->dbsql->inner_join( array(
            'table' => array(
               array('name' => "article") ,
               array('name' => "admin" , 'on' => "article.arAuthor = admin.amId") ,
               array('name' => "category" , 'on' => "article.arCategory = category.catId")
            ) ,
            'where' => "arId = '" . $id . "'" ,
            'select' => "arId, arTitle, arAuthor, arDateStart, arDateEnd, arContent, arBarcode, arPict, catName, amName"
         ));

         $data = $this->dbsql->result();

         if ($data) $result = $data[0];
         else $result = array();

         return $result;
      }

      public function getByCategory($cat){
         $this->dbsql->inner_join( array(
            'table' => array(
               array('name' => "article") ,
               array('name' => "admin" , 'on' => "article.arAuthor = admin.amId") ,
               array('name' => "category" , 'on' => "article.arCategory = category.catId")
            ) ,
            'where' => "category.catName = '" . $cat . "'" ,
            'select' => "arId, arTitle, arAuthor, arDateStart, arDateEnd, arContent, arBarcode, arPict, catName, amName"
         ));

         return $this->dbsql->result();
      }
   }

?>
