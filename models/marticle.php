<?php
   class Marticle extends Models
   {
      function __construct() {
         parent::__construct();
      }

      public function getAll(){
         $date = date('Y-m-d');

         $this->dbsql->inner_join( array(
            'table' => array(
               array('name' => "article") ,
               array('name' => "admin" , 'on' => "article.arAuthor = admin.amId") ,
               array('name' => "ref_category" , 'on' => "article.arCategory = ref_category.catId") ,
               array('name' => "ref_map", 'on' => "article.arId = ref_map.mapArticleId") ,
               array('name' => "ref_social_media", 'on' => "article.arId = ref_social_media.smArticleId")
            ) ,
            'where' =>"article.arStatus = '1' AND (arDateStart >= '" . $date . "' )" ,
            'select' => "arId, arTitle, arAuthor, arDateStart, arDateEnd, arContent, arBarcode, arPict, arURL, arTicketPrice, arContact, catName, amName, arOrganizer, arEventLocation , mapLongitude, mapLatitude, mapZoom , smTwitter, smInstagram, smFacebook, smLine, smPath" ,
            'order' => 'arDateStart DESC'
         ));

         $article = $this->dbsql->result();

         $i = 0;
         foreach ($article as $data) {
            $article[$i]->arURL = 'http://eventfinder.co.id/' . strtolower($data->catName) . '/' . $data->arURL;
            $article[$i]->arContent = htmlspecialchars($data->arContent);
            $article[$i]->arEventLocation = htmlspecialchars($data->arEventLocation);
            $i++;
         }

         $result = array();

         $result['array'] = $article;

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
            'select' => "arId, arTitle, arAuthor, arDateStart, arDateEnd, arContent, arBarcode, arPict, arURL , arTicketPrice , arContact , catName, amName , arOrganizer, arEventLocation , mapLongitude, mapLatitude, mapZoom , smTwitter, smInstagram, smFacebook, smLine, smPath"
         ));

         $article = $this->dbsql->result();

         $i = 0;
         foreach ($article as $data) {
            $article[$i]->arURL = 'http://eventfinder.co.id/' . strtolower($data->catName) . '/' . $data->arURL;
            $article[$i]->arContent = htmlspecialchars($data->arContent);
            $article[$i]->arEventLocation = htmlspecialchars($data->arEventLocation);
            $i++;
         }

         $result = array();

         $result['array'] = $article;

         return $result;
      }

      public function getByCategory($cat){
         $date = date('Y-m-d');

         $this->dbsql->inner_join( array(
            'table' => array(
               array('name' => "article") ,
               array('name' => "admin" , 'on' => "article.arAuthor = admin.amId") ,
               array('name' => "ref_category" , 'on' => "article.arCategory = ref_category.catId") ,
               array('name' => "ref_map", 'on' => "article.arId = ref_map.mapArticleId") ,
               array('name' => "ref_social_media", 'on' => "article.arId = ref_social_media.smArticleId")
            ) ,
            'where' => "ref_category.catId = '" . $cat . "' AND article.arStatus = '1' AND (arDateStart >= '" . $date . "' )" ,
            'select' => "arId, arTitle, arAuthor, arDateStart, arDateEnd, arContent, arBarcode, arPict, arURL , arTicketPrice , arContact , catName, amName , arOrganizer , arEventLocation , mapLongitude, mapLatitude, mapZoom , smTwitter, smInstagram, smFacebook, smLine, smPath" ,
            'order' => 'arDateStart DESC'
         ));

         $article = $this->dbsql->result();

         $i = 0;
         foreach ($article as $data) {
            $article[$i]->arURL = 'http://eventfinder.co.id/' . strtolower($data->catName) . '/' . $data->arURL;
            $article[$i]->arContent = htmlspecialchars($data->arContent);
            $article[$i]->arEventLocation = htmlspecialchars($data->arEventLocation);
            $i++;
         }

         $result = array();

         $result['array'] = $article;

         return $result;
      }
   }

?>
