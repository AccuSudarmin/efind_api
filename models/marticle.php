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
               array('name' => "ref_category" , 'on' => "article.arCategory = ref_category.catId") ,
               array('name' => "ref_map", 'on' => "article.arId = ref_map.mapArticleId")
            ) ,
            'select' => "arId, arTitle, arAuthor, arDateStart, arDateEnd, arContent, arBarcode, arPict, catName, amName, mapLongitude, mapLatitude, mapZoom" ,
            'order' => 'arDateStart DESC'
         ));

         return $this->dbsql->result();
      }

      public function getById($id){
         $this->dbsql->inner_join( array(
            'table' => array(
               array('name' => "article") ,
               array('name' => "admin" , 'on' => "article.arAuthor = admin.amId") ,
               array('name' => "ref_category" , 'on' => "article.arCategory = ref_category.catId") ,
               array('name' => "ref_map", 'on' => "article.arId = ref_map.mapArticleId")
            ) ,
            'where' => "arId = '" . $id . "'" ,
            'select' => "arId, arTitle, arAuthor, arDateStart, arDateEnd, arContent, arBarcode, arPict, catName, amName, mapLongitude, mapLatitude, mapZoom"
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
               array('name' => "ref_category" , 'on' => "article.arCategory = ref_category.catId") ,
               array('name' => "ref_map", 'on' => "article.arId = ref_map.mapArticleId")
            ) ,
            'where' => "ref_category.catId = '" . $cat . "'" ,
            'select' => "arId, arTitle, arAuthor, arDateStart, arDateEnd, arContent, arBarcode, arPict, catName, amName, mapLongitude, mapLatitude, mapZoom",
            'order' => 'arDateStart DESC'
         ));

         return $this->dbsql->result();
      }
   }

?>
