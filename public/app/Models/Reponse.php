<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reponse extends Model
{
    use HasFactory;
    protected $fillable = ["admin_id","question_id","confirmed","queston","reponse"];
    /**
     * Get all of the question for the Reponse
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function question(): HasMany
    {
        return $this->hasMany(Question::class);
    }
    /**
     * Get the admin that owns the Reponse
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
