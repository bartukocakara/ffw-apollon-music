<?php

namespace App\Services;

use App\Repositories\CompanyRepository;

class CompanyService extends CrudService
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected CompanyRepository $companyRepository;

    /**
     * @param CompanyRepository $companyRepository
     * @return void
    */
    public function __construct(CompanyRepository $companyRepository)
    {
        // Extend ettiğimiz CrudService'in __construct methoduna repositoryi gönderiyoruz.
        parent::__construct($companyRepository); // Crud işlemleri yoksa kaldırınız.
        // Repository bu serviste kullanılmak üzere değişkene tanımlanıyor.
        $this->companyRepository = $companyRepository;
    }
}
