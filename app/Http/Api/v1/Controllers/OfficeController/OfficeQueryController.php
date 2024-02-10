<?php

namespace App\Http\Api\v1\Controllers\OfficeController;

use App\Http\Api\v1\Controllers\Controller;
use App\Http\Services\OfficeService;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;

class OfficeQueryController extends Controller
{
    public function __construct(OfficeService $officeService)
    {
        $this->officeService= $officeService;
    }
    #[OA\Get(
        path: '/api/v1/office',
        operationId: 'getOffices',
        description: 'Get list of all offices available',
        summary: 'Get all offices',
        tags: ['Office'],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Success',
                content: new OA\JsonContent(
                    ref: '#/components/schemas/OfficeListResponse'
                )
            ),
        ]
    )]
    public function indexOffice():JsonResponse
    {
        $office = $this->officeService->index();
        return response()->json(['data'=>$office], 200);
    }

    #[OA\Get(
        path: '/api/v1/office/{id}',
        operationId: 'getOfficeById',
        description: 'Get information about a specific office with ID',
        summary: 'Get office',
        tags: ['Office'],
        parameters: [
            new OA\Parameter(
                name: 'id',
                description: 'The ID of the office',
                in: 'path',
                required: true,
                schema: new OA\Schema(
                    type: 'integer'
                )
            ),
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Success',
                content: new OA\JsonContent(
                    ref: '#/components/schemas/OfficeSuccessResponse'
                )
            ),
            new OA\Response(
                response: 404,
                description: 'Not Found',
                content: new OA\JsonContent(
                    ref: '#/components/schemas/NotFoundResponse'
                )
            ),
        ]
    )]
    public function viewOffice(int $id): JsonResponse
    {
        $office = $this->officeService->view($id);

        return response()->json(['data'=>$office], 200);
    }
}
