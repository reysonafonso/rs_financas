<?php
/**
 * Created by PhpStorm.
 * User: reyso
 * Date: 18/05/2017
 * Time: 01:50
 */

namespace RSFin\Auth;


use Jasny\Auth;
use Jasny\Auth\Sessions;
use Jasny\Auth\User;
use RSFin\Repository\RepositoryInterface;

class JasnyAuth extends Auth
{
    use Sessions;

    private $repository;

    /**
     * JasnyAuth constructor.
     */
    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int|string $id
     * @return User | null
     */
    public function fetchUserById($id)
    {
        return $this->repository->find($id, false);
    }

    /**
     * @param string $username
     * @return User | null
     */
    public function fetchUserByUsername($username)
    {
        return $this->repository->findByField('email', $username)[0];
    }
}
