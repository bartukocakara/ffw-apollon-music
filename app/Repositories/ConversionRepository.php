<?php

namespace App\Repositories;

use App\Models\Conversion;

class ConversionRepository extends BaseRepository
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected Conversion $conversion;

    /**
     * @param Conversion $conversion
     * @return void
    */
    public function __construct(Conversion $conversion)
    {
        // Ortak crud işlemleri için BaseRepository construct'ına model gönderiliyor.
        parent::__construct($conversion);
        // Model bu repoda kullanılmak üzere değişkene tanımlanıyor.
        $this->conversion = $conversion;
    }
}
