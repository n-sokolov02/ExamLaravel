<?php

namespace App\Http\Api\v1\Controllers\WorkerController;

use App\Http\DTO\WorkerDTO\WorkerDTO;
use App\Http\Requests\WorkerRequest;
use App\Http\Services\WorkerService;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;

class WorkerCommandController
{
    public function __construct(WorkerService $workerService)
    {
        $this->workerService= $workerService;
    }

    #[OA\Post(
        path: '/api/v1/worker',
        operationId: 'addWorker',
        summary: 'Create a worker',
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                ref: '#/components/schemas/WorkerRequestBody'
            )
        ),
        tags: ['Worker'],
        responses: [
            new OA\Response(
                response: 201,
                description: 'Success',
                content: new OA\JsonContent(
                    ref: '#/components/schemas/WorkerSuccessResponse'
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
    public function createWorker(WorkerRequest $request): JsonResponse
    {
        $workerDTO = new WorkerDTO();
        $workerDTO->buildFromArray($request->validated());

        $worker = $this->workerService->create($workerDTO);

        return response()->json(['data'=>$worker], 200);
    }

    #[OA\Put(
        path: '/api/v1/worker/{id}',
        operationId: 'updateWorker',
        summary: 'Update specific worker',
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                ref: '#/components/schemas/WorkerRequestBody'
            )
        ),
        tags: ['Worker'],
        parameters: [
            new OA\Parameter(
                name: 'id',
                description: 'worker ID',
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
                    ref: '#/components/schemas/WorkerSuccessResponse'
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
    public function updateWorker(WorkerRequest $request, int $id): JsonResponse
    {
        $workerDTO = new WorkerDTO();
        $workerDTO->buildFromArray($request->validated());

        $worker = $this->workerService->update($id, $workerDTO);

        return response()->json(['data'=>$worker], 200);
    }

    #[OA\Delete(
        path: '/api/v1/worker/{id}',
        operationId: 'deleteWorker',
        summary: 'Delete specific worker',
        tags: ['Worker'],
        parameters: [
            new OA\Parameter(
                name: 'id',
                description: 'worker ID',
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
    public function deleteWorker(int $id): JsonResponse
    {
        $this->workerService->delete($id);

        return response()->json(['message'=> 'Object was successfully deleted'], 204);
    }
}
