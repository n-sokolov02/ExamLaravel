<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'salary', 'email', 'office_id'];
    protected $primaryKey = 'worker_id';
    public function office()
    {
        return $this->belongsTo(Office::class, 'office_id');
    }

}
