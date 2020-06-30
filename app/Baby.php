<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baby extends Model
{
    protected $fillable = ['name', 'birthday', 'gender', 'weight', 'height'];
    
    /**
     * このBabyを所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
