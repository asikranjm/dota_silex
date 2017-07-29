<?php
/**
 * Created by PhpStorm.
 * User: juanm
 * Date: 29/07/17
 * Time: 22:54
 */

namespace Web;


use Silex\Api\ControllerProviderInterface;
use Silex\Application;
use Silex\ControllerCollection;
use Symfony\Component\HttpFoundation\Request;

class MainControllerProvider implements ControllerProviderInterface
{

    /**
     * Returns routes to connect to the given application.
     *
     * @param Application $app An Application instance
     *
     * @return ControllerCollection A ControllerCollection instance
     */
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $controllers->match('/', function(Request $request) use ($app) {
            return $app['twig']->render('index.html.twig', array());
        })->bind('home');

        return $controllers;
    }
}