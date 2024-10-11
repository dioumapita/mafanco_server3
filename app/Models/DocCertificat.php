<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocCertificat extends Model
{
    use HasFactory;

    protected $table = 'doc_certificats';

    protected $fillable = ['copie','num_copie','date_copie','certificat_nationalites_id'];

    protected $dates = ['date_copie'];
}
