<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Information extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'types', 'picturePath'
    ];

    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribute($value){
        return Carbon::parse($value)->timestamp;
    }

    public function toArray(){
        $toArray = parent::toArray();
        $toArray ['picturePath'] = $this->picturePath;
        return $toArray;
    }

    public function getPicturePathAttribute(){
        return url('') . Storage::url($this->attributes['picturePath']);
    }
}
