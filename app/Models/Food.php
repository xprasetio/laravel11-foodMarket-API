<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Food extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        "name",
        "description",
        "ingredients",
        "price",
        "rate",
        "types",
        "picturePath",
    ];

    public function getCreatedAtAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp; // merubah unix date atau epoc date
    }
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function toArray()
    {
        $toArray = parent::toArray();
        $toArray['picturePath'] = $this->picturePath;
        return $toArray; // untuk mengakali nama field picturePath
    }

    public function getPicturePathAttribute($value)
    {
        return url($value) . Storage::url($this->attributes['picturePath']);
    }
}
