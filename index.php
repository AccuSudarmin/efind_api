<?php
   require 'config/init.php';

   \Slim\Slim::registerAutoloader();

   $app = new \Slim\Slim();
   $loader = new loader();

   // GET route
   $app->get('/', function () {
         echo "API Eventfinder";
      }
   );

   $app->get('/article/all', function () use ($loader) {
      $model = $loader->model("marticle");

      echo json_encode($model->getAll());
   });

   $app->get('/article/:id', function ($id) use ($loader) {
      $model = $loader->model("marticle");

      echo json_encode($model->getById($id));
   });

   $app->run();
?>
