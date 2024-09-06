<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Only allow these fields to be mass-assigned
    protected $fillable = ['name', 'priority', 'project_id'];
}
