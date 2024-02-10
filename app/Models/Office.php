<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;
    protected $fillable = ['number', 'address'];
    protected $primaryKey = 'office_id';
    public function workers()
    {
        return $this->hasMany(Worker::class);
    }

}
