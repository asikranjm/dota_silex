<?php
/**
 * Created by PhpStorm.
 * User: juanm
 * Date: 29/07/17
 * Time: 22:37
 */

namespace Web;


use Silex\Application;
use stdClass;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HeroesController
{
    /**
     * @var Application
     */
    private $app;

    /**
     * HeroesController constructor.
     * @param $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @return mixed
     */
    public function listHeroes()
    {
        $heroes = array(
            1 => array('name' => 'EarthShacker'),
            2 => array('name' => 'BloodSeaker'),
            3 => array('name' => 'Silencer')
        );
        return $this->app['twig']->render('heroes_list.html.twig', array('heroes' => $heroes));
    }
}