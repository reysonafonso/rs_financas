<?php
/**
 * Created by PhpStorm.
 * User: reyso
 * Date: 19/05/2017
 * Time: 01:00
 */

namespace RSFin\View\Twig;


use RSFin\Auth\AuthInterface;

class TwigGlobals extends \Twig_Extension implements \Twig_Extension_GlobalsInterface
{
    /**
     * @var AuthInterface
     */
    private $auth;


    /**
     * TwigGlobals constructor.
     */
    public function __construct(AuthInterface $auth)
    {
        $this->auth = $auth;
    }

    public function getGlobals()
    {
        return [
            'Auth' => $this->auth
        ];
    }
}
