<?php

namespace App\Http\Resourses\Schemas;

use OpenApi\Attributes as OA;
use Illuminate\Http\Resources\Json\JsonResource;

#[OA\Schema(
    required: [
        "number",
        "address",
    ]
)]

class OfficeSchema extends JsonResource
{

    #[OA\Property(
        example: '123'
    )]

    public int $number;

    #[OA\Property(
        maxLength: 256,
        example: 'Moscow, Zelenograd K113'
    )]

    public string $address;
}
