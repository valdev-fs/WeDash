<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_report',
        'id_report',
        'id_dataset',
        'id_group',
    ];

    public function accessUsers()
    {
        return $this->hasMany(AccessUser::class, 'report_id');
    }
}

