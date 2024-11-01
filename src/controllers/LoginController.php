<?php
namespace Project\controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

class LoginController {

    public function __construct(App $app) {
        $this->registerRoutes($app);
    }

    private function registerRoutes(App $app) {
        $app->get('/login', [$this, 'loadView']);
    }

    public function loadView($request, $response, $args){
        $response->getBody()->write(file_get_contents(__DIR__ . '/../views/LoginView.html'));
        return $response;
    }

}