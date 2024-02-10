<?php

namespace App\Http\Resourses\RequestBodies;

use OpenApi\Attributes as OA;

#[OA\RequestBody(
    request: 'OfficeRequestBody',
    description: 'office request body',
    required: true,
    content: [
        new OA\MediaType(
            mediaType: 'application/json',
            schema: new OA\Schema(
                ref: '#components/schemas/OfficeRequestBody'
            )
        ),
    ]
)]
#[OA\Schema(
    required: [
        'number',
        'address',
    ]
)]
class OfficeRequestBody
{
    #[OA\Property(
        example: '123'
    )]
    public int $number;

    #[OA\Property(
        example: 'Moscow, Zelenograd K201'
    )]
    public string $address;
}
