<?php

namespace App\Http\Api\v1\Controllers\OfficeController;

use App\Http\Api\v1\Controllers\Controller;
use App\Http\DTO\OfficeDTO\OfficeDTO;
use App\Http\Requests\OfficeRequest;
use App\Http\Services\OfficeService;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;

class OfficeCommandController extends Controller
{
    public function __construct(OfficeService $officeService)
    {
        $this->officeService = $officeService;
    }

    #[OA\Post(
        path: '/api/v1/office',
        operationId: 'addOffice',
        summary: 'Create a office',
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                ref: '#/components/schemas/OfficeRequestBody'
            )
        ),
        tags: ['Office'],
        responses: [
            new OA\Response(
                response: 201,
                description: 'Success',
                content: new OA\JsonContent(
                    ref: '#/components/schemas/OfficeSuccessResponse'
                )
            ),
            new OA\Response(
                response: 422,
                description: 'Unprocessable Content',
                content: new OA\JsonContent(
                    ref: '#/components/schemas/UnprocessableEntityResponse'
                )
            ),
        ]
    )]
    public function createOffice(OfficeRequest $request)
    {
        $officeDTO = new OfficeDTO();
        $officeDTO->buildFromArray($request->validated());

        $office = $this->officeService->create($officeDTO);

        return response()->json(['data'=>$office], 201);
    }

    #[OA\Put(
        path: '/api/v1/office/{id}',
        operationId: 'updateOffice',
        summary: 'Update specific office',
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                ref: '#/components/schemas/OfficeRequestBody'
            )
        ),
        tags: ['Office'],
        parameters: [
            new OA\Parameter(
                name: 'id',
                description: 'office ID',
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
                response: 422,
                description: 'Unprocessable Content',
                content: new OA\JsonContent(
                    ref: '#/components/schemas/UnprocessableEntityResponse'
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

    public function updateOffice(OfficeRequest $request, int $id):JsonResponse
    {
        $officeDTO = new OfficeDTO();
        $officeDTO->buildFromArray($request->validated());

        $office = $this->officeService->update($id, $officeDTO);

        return response()->json(['data'=>$office], 200);
    }

    #[OA\Delete(
        path: '/api/v1/office/{id}',
        operationId: 'deleteOffice',
        summary: 'Delete specific Office',
        tags: ['Office'],
        parameters: [
            new OA\Parameter(
                name: 'id',
                description: 'office ID',
                in: 'path',
                required: true,
                schema: new OA\Schema(
                    type: 'integer'
                )
            ),
        ],
        responses: [
            new OA\Response(
                response: 204,
                description: 'Object was successfully deleted',
                content: new OA\JsonContent(
                    ref: '#/components/schemas/NoContentResponse'
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
    public function deleteOffice(int $id):JsonResponse
    {
        $this->officeService->delete($id);

        return response()->json(['message'=> 'Object was successfully deleted'], 204);
    }
}
