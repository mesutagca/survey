<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Questionnaire extends Model
{
    protected $guarded = [];

    public function path()
    {
        return url('/questionnaires/' . $this->id);
    }

    public function publicPath()
    {
        return url('/surveys/' . $this->id . '-' . Str::slug($this->title));
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    public function surveys()
    {
        return $this->hasMany(Survey::class);
    }
}
