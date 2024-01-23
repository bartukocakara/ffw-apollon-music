<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\CreditRepository;
use App\Repositories\UserRepository;

class AuthService extends CrudService
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected UserRepository $userRepository;
    protected CreditRepository $creditRepository;

    /**
     * @param UserRepository $companyRepository
     * @return void
    */
    public function __construct(UserRepository $userRepository,
                                CreditRepository $creditRepository)
    {
        // Extend ettiğimiz CrudService'in __construct methoduna repositoryi gönderiyoruz.
        parent::__construct($userRepository); // Crud işlemleri yoksa kaldırınız.
        // Repository bu serviste kullanılmak üzere değişkene tanımlanıyor.
        $this->userRepository = $userRepository;
        $this->creditRepository = $creditRepository;
    }

    /**
     * register
     *
     * @param  array $params
     * @return User
     */
    public function register(array $params) : User
    {
        $user = $this->userRepository->create($params);

        $this->creditRepository->create([
            'user_id' => $user->id,
            'price' => 0,
            'amount' => 3,
        ]);
        return $user;
    }
}
