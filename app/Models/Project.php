<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Only allow the 'name' field to be mass-assigned
    protected $fillable = ['name'];
    public function tasks()
{
    return $this->hasMany(Task::class);
}

}
