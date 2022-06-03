<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationResponse extends Model
{
    use HasFactory;

    public function evaluation_response()
    {
        return $this->hasMany(Audit::class, 'id', 'evaluation_id');
    }

    /**
     * Get the user associated with the EvaluationResponse
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function datapoint()
    {
        return $this->hasOne(Datapoint::class, 'id', 'datapoint_id');
    }
}
