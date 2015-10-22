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
               array('name' => "ref_map", 'on' => "article.arId = ref_map.mapArticleId") ,
               array('name' => "ref_social_media", 'on' => "article.arId = ref_social_media.smArticleId")
            ) ,
            'select' => "arId, arTitle, arAuthor, arDateStart, arDateEnd, arContent, arBarcode, arPict, arURL, catName, amName, mapLongitude, mapLatitude, mapZoom , smTwitter, smInstagram, smFacebook, smLine, smPath" ,
            'order' => 'arDateStart DESC'
         ));

         $article = $this->dbsql->result();
         $result = array();

         foreach ($article as $data) {
            $key = $data->arURL;
            $result[$key] = $data;
         }

         return $result;
      }

      public function getById($id){
         $this->dbsql->inner_join( array(
            'table' => array(
               array('name' => "article") ,
               array('name' => "admin" , 'on' => "article.arAuthor = admin.amId") ,
               array('name' => "ref_category" , 'on' => "article.arCategory = ref_category.catId") ,
               array('name' => "ref_map", 'on' => "article.arId = ref_map.mapArticleId") ,
               array('name' => "ref_social_media", 'on' => "article.arId = ref_social_media.smArticleId")
            ) ,
            'where' => "arId = '" . $id . "'" ,
            'select' => "arId, arTitle, arAuthor, arDateStart, arDateEnd, arContent, arBarcode, arPict, arURL, catName, amName, mapLongitude, mapLatitude, mapZoom , smTwitter, smInstagram, smFacebook, smLine, smPath"
         ));

         $article = $this->dbsql->result();
         $result = array();

         foreach ($article as $data) {
            $key = $data->arURL;
            $result[$key] = $data;
         }

         return $result;
      }

      public function getByCategory($cat){
         $this->dbsql->inner_join( array(
            'table' => array(
               array('name' => "article") ,
               array('name' => "admin" , 'on' => "article.arAuthor = admin.amId") ,
               array('name' => "ref_category" , 'on' => "article.arCategory = ref_category.catId") ,
               array('name' => "ref_map", 'on' => "article.arId = ref_map.mapArticleId") ,
               array('name' => "ref_social_media", 'on' => "article.arId = ref_social_media.smArticleId")
            ) ,
            'where' => "ref_category.catId = '" . $cat . "'" ,
            'select' => "arId, arTitle, arAuthor, arDateStart, arDateEnd, arContent, arBarcode, arPict, arURL, catName, amName, mapLongitude, mapLatitude, mapZoom , smTwitter, smInstagram, smFacebook, smLine, smPath" ,
            'order' => 'arDateStart DESC'
         ));

         $article = $this->dbsql->result();
         $result = array();

         foreach ($article as $data) {
            $key = $data->arURL;
            $result[$key] = $data;
         }

         return $result;
      }
   }

?>
