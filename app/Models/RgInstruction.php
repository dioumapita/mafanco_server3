<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RgInstruction extends Model
{
    use HasFactory;

    protected $table = 'rg_instructions';

    protected $fillable = ['num_rp','num_ri'];

    public function inculpes()
    {
        return $this->hasMany('App\Models\Inculpe','rg_instructions_id','id');
    }

    public function fait_inculpes()
    {
        return $this->hasMany('App\Models\FaitInculpe','rg_instructions_id','id');
    }

    public function actes_inculpes()
    {
        return $this->hasMany('App\Models\ActeInculpe','rg_instructions_id','id');
    }

    public function docrgInstructions()
    {
        return $this->hasMany('App\Models\DocRgInstruction','rg_instructions_id','id');
    }
}
