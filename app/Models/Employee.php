<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['full_name', 'rfid_card_number'];

    /**
     * The department that belong to the employee.
     */
    public function departments()
    {
        return $this->belongsToMany(Department::class, 'employees_deparments');
    }
}
