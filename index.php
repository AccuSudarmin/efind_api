<?php
   require 'config/init.php';

   \Slim\Slim::registerAutoloader();

   $app = new \Slim\Slim();
   $model = new Models();


   // GET route
   $app->get('/', function () {
         echo "API Eventfinder";
      }
   );

   $app->get('/article/all', function () use ($model) {
      $model->load("marticle");

      $data = $model->marticle->getAll();

      echo json_encode($data);
   });

   $app->get('/article/:id', function ($id) use ($model) {
      $model->load("marticle");

      $data = $model->marticle->getById($id);

      echo json_encode($data);
   });

   // POST route
   $app->post('/post',
      function () {
         echo 'This is a POST route';
      }
   );

   // PUT route
   $app->put( '/put', function () {
         echo 'This is a PUT route';
      }
   );

   // PATCH route
   $app->patch('/patch', function () {
      echo 'This is a PATCH route';
   });

   // DELETE route
   $app->delete(
       '/delete',
       function () {
           echo 'This is a DELETE route';
       }
   );

   $app->get('/hello/:name', function ($name) {
       echo "Hello, " . $name;
   });

   $app->run();
?>
