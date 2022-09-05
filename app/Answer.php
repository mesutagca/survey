<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    protected $guarded=[];

    public function question():BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public function responses()
    {
        return $this->hasMany(SurveyResponse::class);
    }
}
