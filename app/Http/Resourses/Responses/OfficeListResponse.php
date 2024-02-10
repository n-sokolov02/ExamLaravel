<?php

namespace App\Http\Resourses\Responses;

use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;
#[OA\Schema(
    required: ["data"]
)]
class OfficeListResponse extends JsonResource
{
    #[OA\Property(
        type: "array",
        items: new OA\Items(
            ref: '#/components/schemas/OfficeSchema'
        )
    )]
    public array $data;
}
