<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Certificate extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'certificates';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'active', 'string1', 'string2', 'string3', 'text', 'date'];

    public function getQrCodeAttribute()
    {
        if($this->active) {
            $qrCode = route('certificate', 
                Carbon::parse($this->created_at)->timestamp + $this->id);
        } else {
            $qrCode = null;
        }
        return $qrCode;
    }
}
