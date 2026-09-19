<?php

namespace App\Http\Controllers\V1;

use App\Actions\V1\HumanResources\Citizens\FetchCitizenAction;
use App\Actions\V1\HumanResources\Citizens\IncludeCitizenRelationsAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\ShowCitizenRequest;
use App\Http\Resources\V1\CitizenResource;
use App\Models\Citizen;
use Illuminate\Pipeline\Pipeline;

class CitizenController extends Controller
{
    public function show(Citizen $citizen, ShowCitizenRequest $request)
    {
        $citizen = app(Pipeline::class)
            ->send([
                'id' => $citizen->id,
                'include' => $request->input('include', default: [])
            ])
            ->through([
                FetchCitizenAction::class,
                IncludeCitizenRelationsAction::class,
            ])
            ->thenReturn();

        return CitizenResource::make($citizen);
    }
}
