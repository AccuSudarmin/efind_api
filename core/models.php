<?php
   class Models
   {
      function __construct(){
         $this->dbsql = new dbsql(array(
            'db_host' => DB_HOST ,
            'db_user' => DB_USER ,
            'db_pass' => DB_PASS ,
            'db_name' => DB_NAME
         ));
      }

      public function load($model) {
         require_once './models/' . $model . '.php';

         $class_name = strtolower($model);
			$this->$class_name = new $model;
      }
   }

?>
