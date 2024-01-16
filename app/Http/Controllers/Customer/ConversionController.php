<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConversionRequest;
use App\Http\Resources\ConversionResource;
use App\Providers\RouteServiceProvider;
use App\Services\ConversionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class ConversionController extends Controller
{
    private ConversionService $conversionService;

    /**
     * Service tanımlanıyor.
     *
     * @param  ConversionService $conversionService
     * @return void
    */
    public function __construct(ConversionService $conversionService)
    {
        $this->conversionService = $conversionService;
    }

    /**
     * Kaynakları listelemek için kullanılır.
     *
     * @param  Request  $request
     * @return View
    */
    public function index(Request $request) : View
    {
        $collection = ConversionResource::collection($this->conversionService->all($request))
                    ->response()
                    ->getData(true);
        return view('customer.profile.contents.conversions', [ 'collection' => $collection]);
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @return View
    */
    public function create() : View
    {
        return view('customer.conversions.create');
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  ConversionRequest $request
     * @return
    */
    public function store(ConversionRequest $request)
    {
        $this->conversionService->store($request->validated());
        Alert::html('success', 'Your music successfully created');

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Kaynağı görüntülemek için kullanılır.
     *
     * @param  int $id
     * @return View
    */
    public function show(string $id) : View
    {
        $conversions = $this->conversionService->show($id);

        return view( 'customer.conversions.show', [
                'conversions' => ConversionResource::collection($conversions)
                                    ->response()->getData(true)]);
    }

    /**
     * Kaynağı güncellemek için kullanılır.
     *
     * @param  ConversionRequest $request
     * @param  int $id
     * @return JsonResponse
    */
    public function update(ConversionRequest $request, string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->conversionService->update($request->validated(), $id));
    }

    /**
     * Kaynağı kaldırmak için kullanılır.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function destroy(string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->conversionService->destroy($id));
    }
}
