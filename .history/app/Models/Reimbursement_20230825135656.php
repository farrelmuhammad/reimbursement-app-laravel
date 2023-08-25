<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reimbursement extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id', // Add 'user_id' to the fillable fields
        'nama_reimbursement',
        'deskripsi',
        'status',
        'file_pendukung',
        'tanggal',
    ];
}
