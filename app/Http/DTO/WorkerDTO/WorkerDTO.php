<?php

namespace App\Http\DTO\WorkerDTO;

use App\Http\DTO\BaseDTO;
use \Illuminate\Http\Request;

class WorkerDTO extends BaseDTO
{
    public string $name;
    public int $salary;
    public string $email;


    public int $officeId;
    public function build(Request $request): BaseDTO
    {
        $this->buildFromRequest($request);
        return $this;
    }
}
