<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'description',
        'availability'
    ];

    const AVAILABILITY_STATUS_AVAILABLE = 0;
    const AVAILABILITY_STATUS_NOT_AVAILABLE = 1;
    const AVAILABILITY_STATUS_MISSING = 2;


    const PROGRESS_STATUSES_READABLE = [
        self::AVAILABILITY_STATUS_AVAILABLE => 'Available',
        self::AVAILABILITY_STATUS_NOT_AVAILABLE => 'Not Available',
        self::AVAILABILITY_STATUS_MISSING => 'Missing',
    ];

}
