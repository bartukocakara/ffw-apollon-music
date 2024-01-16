<?php

namespace App\Repositories;

use App\Models\CompanyUser;

class CompanyUserRepository extends BaseRepository
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected CompanyUser $companyUser;

    /**
     * @param CompanyUser $companyUser
     * @return void
    */
    public function __construct(CompanyUser $companyUser)
    {
        // Ortak crud işlemleri için BaseRepository construct'ına model gönderiliyor.
        parent::__construct($companyUser);
        // Model bu repoda kullanılmak üzere değişkene tanımlanıyor.
        $this->companyUser = $companyUser;
    }
}
