<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reponse extends Model
{
    use HasFactory;
    protected $fillable = ["question_id","admin_id","confirmed","queston","reponse"];
    /**
     * Get the user that owns the Reponse
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    /**
     * Get the question associated with the Reponse
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function question(): HasOne
    {
        return $this->hasOne(Question::class);
    }
}
