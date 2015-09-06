<?php
   /**
    *
    */
   class Marticle extends Models
   {
      function __construct() {
         parent::__construct();
      }

      public function getAll(){
         parent::__construct();

         $this->dbsql->select( array(
            'table' => "article"
         ));

         return $this->dbsql->result();
      }

      public function getById($id){
         $this->dbsql->select( array(
            'table' => "article" ,
            'where' => "arId = '" . $id . "'"
         ));

         return $this->dbsql->row();
      }
   }

?>
