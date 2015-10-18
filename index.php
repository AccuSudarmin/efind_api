<?php
   require 'config/init.php';

   \Slim\Slim::registerAutoloader();

   $app = new \Slim\Slim();
   $loader = new loader();

   function checkApi (){
      $app = \Slim\Slim::getInstance();

      $header = apache_request_headers();
      if ($header['API_KEY'] != API_KEY ) {
         echo json_encode(array("message" => "wrong api"));
         exit;
      }
   };

   // GET route
   $app->get(
      '/',
      'checkApi' ,
      function () {
         echo "Eventfinder Api";
      }
   );

   $app->get(
      '/event/all',
      'checkApi' ,
      function () use ($loader) {

         $marticle = $loader->model("marticle");
         echo json_encode($marticle->getAll());

      }
   );

   $app->get(
      '/event/:id',
      'checkApi' ,
      function ($id) use ($loader) {

         $marticle = $loader->model("marticle");
         echo json_encode($model->getById($id));

      }
   );

   $app->get(
      '/event/category/:cat',
      'checkApi' ,
      function ($cat) use ($loader) {

         $marticle = $loader->model("marticle");
         echo json_encode($marticle->getByCategory($cat));

      }
   );

   $app->run();
?>
