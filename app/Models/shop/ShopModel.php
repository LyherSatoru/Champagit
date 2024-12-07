<?php

namespace App\Models\shop;

use Illuminate\Database\Eloquent\Model;

class ShopModel extends Model
{
    protected $table = 'receipts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'receipt_uuid',
        'username',
        'game_name',
        'platform',
        'rank',
        'description',
        'image_url',
        'price',
    ];

}
