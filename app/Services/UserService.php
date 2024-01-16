<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService extends CrudService
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected UserRepository $userRepository;

    /**
     * @param UserRepository $userRepository
     * @return void
    */
    public function __construct(UserRepository $userRepository)
    {
        // Extend ettiğimiz CrudService'in __construct methoduna repositoryi gönderiyoruz.
        parent::__construct($userRepository); // Crud işlemleri yoksa kaldırınız.
        // Repository bu serviste kullanılmak üzere değişkene tanımlanıyor.
        $this->userRepository = $userRepository;
    }
}
