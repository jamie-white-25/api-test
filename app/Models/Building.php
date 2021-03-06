<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'location'];

    /**
     * The department that belong to the employee.
     */
    public function departments()
    {
        return $this->belongsToMany(Department::class, 'deparments_buildings');
    }
}
