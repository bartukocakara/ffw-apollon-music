<?php

namespace App\Repositories;

use App\Models\Company;

class CompanyRepository extends BaseRepository
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected Company $company;

    /**
     * @param Company $company
     * @return void
    */
    public function __construct(Company $company)
    {
        // Ortak crud işlemleri için BaseRepository construct'ına model gönderiliyor.
        parent::__construct($company);
        // Model bu repoda kullanılmak üzere değişkene tanımlanıyor.
        $this->company = $company;
    }
}
