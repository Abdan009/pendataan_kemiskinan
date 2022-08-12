<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $fillable = [
        'id',
        'url',
        'hasil_survey_id',
        'depan',
        'belakang',
        'kanan',
        'kiri',
        'ruang_tamu',
        'ruang_tidur',
        'kamar_mandi',
        'dapur',
        'kks',
    ];
    public function hasilSurvey()
    {
        return $this->belongsTo(HasilSurvei::class, 'hasil_survey_id');
    }

    public function getUrlAttribute()
    {
        if ($this->attributes['url']) {
            return url('') . Storage::url($this->attributes['url']);
        } else {
            return null;
        }
    }
}
