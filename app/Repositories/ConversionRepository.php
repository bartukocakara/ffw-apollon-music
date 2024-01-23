<?php

namespace App\Repositories;

use App\Models\Conversion;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

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

    /**
     * Kaynakları listelemek için kullanılır.
     *
     * @param Request $request
     * @return LengthAwarePaginator|Collection
    */
    public function all(Request $request) : LengthAwarePaginator|Collection
    {
        return $this->conversion->whereHas('user', function($query){
            $query->where('id', auth()->user()->id);
        })->filterBy($request->all());
    }
}
