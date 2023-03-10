<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Response;

class pengaduan extends Model
{
    use HasFactory;
    protected $tables = 'pengaduans';
    protected $fillable = [
    'nik',
    'nama',
    'no',
    'pengaduan',
    'foto',
];

public function response()
{
    return $this->hasOne
    (Response::class);
}
}
