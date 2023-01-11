<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $table = 'emp';
    protected $primaryKey = 'emp_id';
    protected $guarded = [];    
}
