<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRateFormRequest;
use App\Http\Resources\UserRateResource;
use App\Http\Response\Utility\ResponseType;
use Dev\Domain\Service\UserRateService;
use Dev\Infrastructure\Models\UserRate;

/**
 * Class UserRateController
 * @package App\Http\Controllers
 */
class UserRateController extends Controller
{
    /**
     * @var UserRateService $userRateService
     */
    private $userRateService;

    /**
     * UserRateController constructor.
     * @param UserRateService $userRateService
     */
    public function __construct(UserRateService $userRateService)
    {
        $this->userRateService = $userRateService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $userRates = $this->userRateService->index();
        return UserRateResource::collection($userRates);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserRateFormRequest $request
     * @return UserRateResource
     */
    public function store(UserRateFormRequest $request)
    {
        $userRate = $this->userRateService->create($request->validated());
        return (new UserRateResource($userRate))
            ->additional(ResponseType::simpleResponse('UserRate has been created', true));
    }

    /**
     * Display the specified resource.
     *
     * @param  UserRate $userRate
     * @return UserRateResource
     */
    public function show(UserRate $userRate)
    {
        $userRate = $this->userRateService->show($userRate->id);
        return new UserRateResource($userRate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserRateFormRequest $request
     * @param  UserRate $userRate
     * @return UserRateResource
     */
    public function update(UserRateFormRequest $request, UserRate $userRate)
    {
        $userRate = $this->userRateService->update($userRate->id, $request->validated());
        return (new UserRateResource($userRate))->additional(ResponseType::simpleResponse('UserRate has been updated', true));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  UserRate $userRate
     * @return UserRateResource
     */
    public function destroy(UserRate $userRate)
    {
        $this->userRateService->delete($userRate);
        return new UserRateResource(ResponseType::simpleResponse('UserRate has been deleted', true));
    }
}
