<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;

    public const STATUS_NEW = 'new';
    public const STATUS_COMPLETED = 'completed';

    public const statuses_list = [
        self::STATUS_NEW,self::STATUS_COMPLETED
    ];
}
