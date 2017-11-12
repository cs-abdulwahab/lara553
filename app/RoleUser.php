<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class RoleUser extends Pivot
{

    protected $fillable = ['isactive'];

    public function testfun()
    {
        return 'is there any need of pivot table   may be if there are pivot table attributes';
    }

}
