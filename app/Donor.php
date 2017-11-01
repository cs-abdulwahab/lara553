<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $bloodgroup
 */
class Donor extends Model
{
    protected $fillable = ['name', 'email', 'isactive', 'phone', 'blood_group_id'];


    public function bloodgroup()
    {
        return $this->belongsTo(BloodGroup::class, 'blood_group_id', 'id');
    }


}
