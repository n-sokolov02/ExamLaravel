<?php

namespace App\Http\Resourses\Responses;

use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

#[OA\Schema(
    required: ["data"]
)]

class WorkerListResponse extends JsonResource
{
    #[OA\Property(
        type: "array",
        items: new OA\Items(
            ref: '#/components/schemas/WorkerSchema'
        )
    )]
    public array $data;
}
