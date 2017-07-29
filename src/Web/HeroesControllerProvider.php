<?php
/**
 * Created by PhpStorm.
 * User: juanm
 * Date: 29/07/17
 * Time: 22:36
 */

namespace Web;

use Silex\Api\ControllerProviderInterface;
use Silex\Application;
use Silex\ControllerCollection;
use Symfony\Component\HttpFoundation\Request;

class HeroesControllerProvider implements ControllerProviderInterface
{
    /**
     * @var HeroesController
     */
    private $heroesController;

    /**
     * Returns routes to connect to the given application.
     *
     * @param Application $app An Application instance
     *
     * @return ControllerCollection A ControllerCollection instance
     */
    public function connect(Application $app)
    {
        $this->heroesController = new HeroesController($app);
        $controllers = $app['controllers_factory'];

        $controllers->get('/', function(Request $request) use ($app) {
            return $this->heroesController->listHeroes();
        });

        return $controllers;

    }
}