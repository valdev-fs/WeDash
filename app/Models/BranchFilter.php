<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchFilter extends Model
{
    use HasFactory;

    protected $fillable = ['branch_table', 'report_id'];
}
