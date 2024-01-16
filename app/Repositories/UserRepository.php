<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected User $user;

    /**
     * @param User $user
     * @return void
    */
    public function __construct(User $user)
    {
        // Ortak crud işlemleri için BaseRepository construct'ına model gönderiliyor.
        parent::__construct($user);
        // Model bu repoda kullanılmak üzere değişkene tanımlanıyor.
        $this->user = $user;
    }
}
