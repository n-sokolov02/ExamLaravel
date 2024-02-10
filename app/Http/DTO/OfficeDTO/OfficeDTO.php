<?php

namespace App\Http\DTO\OfficeDTO;

use App\Http\DTO\BaseDTO;
use \Illuminate\Http\Request;

class OfficeDTO extends BaseDTO
{
    public int $number;
    public string $address;

    public function build(Request $request): BaseDTO
    {
        $this->buildFromRequest($request);
        return $this;
    }
}
