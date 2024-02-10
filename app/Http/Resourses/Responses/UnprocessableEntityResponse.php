<?php

namespace App\Http\Resourses\Responses;
use OpenApi\Attributes as OA;

#[OA\Schema(
    required: ["error"]
)]
class UnprocessableEntityResponse
{
    #[OA\Property(
        type: "string",
        example: "Unprocessable Content"
    )]
    public string $error;
}
