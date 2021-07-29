<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $fillable = ['question','status','user_id'];
}
