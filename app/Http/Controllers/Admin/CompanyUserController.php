<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyUserRequest;
use App\Http\Resources\CompanyUserResource;
use App\Services\CompanyUserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CompanyUserController extends Controller
{
    private CompanyUserService $companyUserService;

    /**
     * Service tanımlanıyor.
     *
     * @param  CompanyUserService $companyUserService
     * @return void
    */
    public function __construct(CompanyUserService $companyUserService)
    {
        $this->companyUserService = $companyUserService;
    }

    /**
     * Kaynakları listelemek için kullanılır.
     *
     * @param  Request  $request
     * @return JsonResponse
    */
    public function index(Request $request) : JsonResponse
    {
        return $this->okApiResponse(
            CompanyUserResource::collection($this->companyUserService->all($request))
                ->response()
                ->getData(true)
        );
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  CompanyUserRequest $request
     * @return JsonResponse
    */
    public function store(CompanyUserRequest $request) : JsonResponse
    {
        return $this->createdApiResponse($this->companyUserService->store($request->validated()));
    }

    /**
     * Kaynağı görüntülemek için kullanılır.
     *
     * @param  int $id
     * @return JsonResponse
    */
    public function show(string $id) : JsonResponse
    {
        return $this->okApiResponse(new CompanyUserResource($this->companyUserService->show($id)));
    }

    /**
     * Kaynağı güncellemek için kullanılır.
     *
     * @param  CompanyUserRequest $request
     * @param  int $id
     * @return JsonResponse
    */
    public function update(CompanyUserRequest $request, string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->companyUserService->update($request->validated(), $id));
    }

    /**
     * Kaynağı kaldırmak için kullanılır.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function destroy(string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->companyUserService->destroy($id));
    }
}
