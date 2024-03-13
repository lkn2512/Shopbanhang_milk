<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wards extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name_xaphuong', 'type'];
    protected $primaryKey = 'xaid';
    protected $table = 'tbl_xaphuongthitran';
}
