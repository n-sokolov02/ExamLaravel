<?php

namespace App\Http\Api\v1\Controllers\WorkerController;

use App\Http\Services\WorkerService;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;
class WorkerQueryController
{
    public function __construct(WorkerService $workerService)
    {
        $this->workerService= $workerService;
    }

    #[OA\Get(
        path: '/api/v1/worker',
        operationId: 'getWorkers',
        description: 'Get list of all workers available',
        summary: 'Get all workers',
        tags: ['Worker'],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Success',
                content: new OA\JsonContent(
                    ref: '#/components/schemas/WorkerListResponse'
                )
            ),
        ]
    )]
    public function indexWorker(): JsonResponse
    {
        $worker = $this->workerService->index();

        return response()->json(['data'=>$worker], 200);

    }

    #[OA\Get(
        path: '/api/v1/worker/{id}',
        operationId: 'getWorkerById',
        description: 'Get information about a specific worker with ID',
        summary: 'Get worker',
        tags: ['Worker'],
        parameters: [
            new OA\Parameter(
                name: 'id',
                description: 'The ID of the worker',
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
                response: 404,
                description: 'Not Found',
                content: new OA\JsonContent(
                    ref: '#/components/schemas/NotFoundResponse'
                )
            ),
        ]
    )]
    public function viewWorker(int $id): JsonResponse
    {
        $worker = $this->workerService->view($id);

        return response()->json(['data'=>$worker], 200);
    }
}
