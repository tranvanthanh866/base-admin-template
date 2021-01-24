<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Describe extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    protected $with = ['examples', 'pronunciation', 'wordType'];

    public function examples() {
        return $this->hasMany(SentenceExample::class);
    }

    public function pronunciation() {
        return $this->hasOne(Pronunciation::class);
    }

    public function wordType() {
        return $this->belongsTo(WordType::class);
    }
}
