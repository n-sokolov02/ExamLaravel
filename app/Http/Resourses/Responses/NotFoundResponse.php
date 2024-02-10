<?php

namespace App\Http\Resourses\Responses;
use OpenApi\Attributes as OA;

#[OA\Schema(
    required: ["error"]
)]
class NotFoundResponse
{
    #[OA\Property(
        type: "string",
        example: "Not Found"
    )]
    public string $error;
}
