<?php
namespace Project\core;

use Slim\Factory\AppFactory;

use Project\controllers\LoginController;
use Project\controllers\RegisterController;

class Router {
    
    private $app;

    public function __construct(){
        $this->app = AppFactory::create();

        $this->defineRoutes();
    }

    protected function defineRoutes(){
        new LoginController($this->app);
        new RegisterController($this->app);

        // Error
        $this->app->any('/{any:.*}', function ($request, $response) {
            $response->getBody()->write(file_get_contents(__DIR__ . '/../views/ErrorView.html'));
            return $response->withStatus(404);
        });
    }

    public function run(){
        $this->app->run();
    }

}