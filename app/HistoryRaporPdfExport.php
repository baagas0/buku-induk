<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryRaporPdfExport extends Model
{
    protected $fillable = [
        'rapor_pdf_exports_id',
        'student_id',
        'title',
        'type',
    ];    
}
