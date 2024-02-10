<?php

namespace App\Http\Resourses\Schemas;

use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;
#[OA\Schema(
    required: [
        'name',
        'salary',
        'email',
        'officeId'
    ]
)]
class WorkerSchema extends JsonResource
{
    #[OA\Property(
        maxLength: 64,
        example: 'John'
    )]
    public string $name;

    #[OA\Property(
        maxLength: 64,
        example: '50000'
    )]
    public int $salary;

    #[OA\Property(
        maxLength: 64,
        example: 2
    )]
    public string $officeId;
}
