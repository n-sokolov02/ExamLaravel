<?php

namespace App\Http\Services;

use App\Http\DTO\WorkerDTO\WorkerDTO;
use App\Models\Worker;
use Illuminate\Database\Eloquent\Collection;

class WorkerService
{
    public function index():Collection
    {
        return Worker::all();
    }

    public function view(int $id):Worker
    {
        return Worker::findOrFail($id);
    }

    public function create(WorkerDTO $workerDTO):Worker
    {
        $worker = new Worker();
        $worker->name = $workerDTO->name;
        $worker->salary = $workerDTO->salary;
        $worker->email = $workerDTO->email;
        $worker->office_id = $workerDTO->officeId;
        $worker->save();

        return $worker;
    }

    public function update(int $id, WorkerDTO $workerDTO):Worker
    {
        $worker = Worker::findOrFail($id);
        $worker->name = $workerDTO->name ?? $worker->name;
        $worker->salary = $workerDTO->salary ?? $worker->salary;
        $worker->email = $workerDTO->email ?? $worker->email;
        $worker->office_id = $workerDTO->officeId ?? $worker->office_id;
        $worker->save();

        return $worker;
    }

    public function delete(int $id): void
    {
        $worker = Worker::findOrFail($id);
        $worker->delete();
    }

}
