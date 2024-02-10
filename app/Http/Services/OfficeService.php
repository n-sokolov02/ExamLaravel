<?php

namespace App\Http\Services;

use App\Http\DTO\OfficeDTO\OfficeDTO;
use App\Models\Office;
use Illuminate\Database\Eloquent\Collection;

class OfficeService
{
    public function index():Collection
    {
        return Office::all();
    }

    public function view(int $id):Office
    {
        return Office::findOrFail($id);
    }

    public function create(OfficeDTO $officeDTO):Office
    {
        $office = new Office();
        $office->number = $officeDTO->number;
        $office->address = $officeDTO->address;
        $office->save();

        return $office;
    }

    public function update(int $id, OfficeDTO $officeDTO):OfficeDTO
    {
        $office = Office::findOrFail($id);
        $office->number = $officeDTO->number ?? $office->number;
        $office->address = $officeDTO->address ?? $office->address;
        $office->save();

        return $office;
    }

    public function delete(int $id): void
    {
        $office = Office::findOrFail($id);
        $office->delete();
    }

}
