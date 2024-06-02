<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'NPK',
        'report_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'NPK', 'NPK');
    }

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }
}

