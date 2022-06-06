<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    use HasFactory;

    protected $table = 'loans';
    protected $fillable =['user_id', 'goods_id', 'loans_code', 'purpose'];
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function goods(){
        return $this->belongsTo(Goods::class,);
    }
}
