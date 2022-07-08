<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reddit extends Model
{
    protected $table = 'reddit';
    protected $fillable = ['autor', 'titulo', 'ups', 'coments', 'data'];
}
