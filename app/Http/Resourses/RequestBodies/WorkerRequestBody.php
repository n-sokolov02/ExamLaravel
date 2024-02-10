<?php

namespace App\Http\Resourses\RequestBodies;

use OpenApi\Attributes as OA;

#[OA\RequestBody(
    request: 'WorkerRequestBody',
    description: 'worker request body',
    required: true,
    content: [
        new OA\MediaType(
            mediaType: 'application/json',
            schema: new OA\Schema(
                ref: '#/components/schemas/WorkerRequestBody'
            )
        )
    ]
)]
#[OA\Schema(
    required: [
        'name',
        'salary',
        'email',
        'officeId'
    ]
)]
class WorkerRequestBody
{
    #[OA\Property(
        example: 'Nikolai'
    )]
    public string $name;

    #[OA\Property(
        example: 50000
    )]
    public int $salary;

    #[OA\Property(
        example: 'sokolov@gmail.com'
    )]
    public string $email;


    #[OA\Property(
        example: 2
    )]
    public string $officeId;
}
