<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valiny extends Model
{
    use HasFactory;
    protected $fillable = ["admin_id","confirmed","question","reponse"];
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

}
