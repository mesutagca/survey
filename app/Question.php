<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    protected $guarded=[];

    public function questionnaire(): BelongsTo
    {
        return $this->belongsTo(Questionnaire::class);
    }

    public function answers():HasMany
    {
        return $this->hasMany(Answer::class);
    }

    public function responses()
    {
        return $this->hasMany(SurveyResponse::class);

    }
}
