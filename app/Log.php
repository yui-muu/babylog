<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['weight', 'height'];


/**
 * このログを所有するBaby。（ Babyモデルとの関係を定義）
 */
    public function baby()
    {
        return $this->belongsTo(Baby::class);
    }
}