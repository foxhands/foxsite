<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'freelancehunt_id',
        'title',
        'description',
        'category',
        'response',
        'budget',
        'answer',
        'deadline',
        'employer_last_name',
        'employer_first_name',
        'employer_login',
    ];

    public function saveResponseGPT($response)
    {
        $this->response = $response;
        $this->save();
    }
}
