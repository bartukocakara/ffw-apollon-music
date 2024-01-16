<?php

namespace App\Services;

use App\Repositories\CompanyUserRepository;

class CompanyUserService extends CrudService
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected CompanyUserRepository $companyUserRepository;

    /**
     * @param CompanyUserRepository $companyUserRepository
     * @return void
    */
    public function __construct(CompanyUserRepository $companyUserRepository)
    {
        // Extend ettiğimiz CrudService'in __construct methoduna repositoryi gönderiyoruz.
        parent::__construct($companyUserRepository); // Crud işlemleri yoksa kaldırınız.
        // Repository bu serviste kullanılmak üzere değişkene tanımlanıyor.
        $this->companyUserRepository = $companyUserRepository;
    }
}
