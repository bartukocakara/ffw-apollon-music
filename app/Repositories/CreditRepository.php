<?php

namespace App\Repositories;

use App\Models\Credit;

class CreditRepository extends BaseRepository
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected Credit $credit;

    /**
     * @param Credit $credit
     * @return void
    */
    public function __construct(Credit $credit)
    {
        // Ortak crud işlemleri için BaseRepository construct'ına model gönderiliyor.
        parent::__construct($credit);
        // Model bu repoda kullanılmak üzere değişkene tanımlanıyor.
        $this->credit = $credit;
    }
}
