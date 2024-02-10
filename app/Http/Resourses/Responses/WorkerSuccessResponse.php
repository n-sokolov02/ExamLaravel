<?php

namespace App\Http\Resourses\Responses;

use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

#[OA\Schema(
    required: ["data"]
)]
class WorkerSuccessResponse extends JsonResource
{
    #[OA\Property(
        ref: '#/components/schemas/WorkerSchema'
    )]
    public object $data;
}
