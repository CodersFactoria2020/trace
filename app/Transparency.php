<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transparency extends Model
{
    protected $fillable = [
        'date_name', 'document'
    ];
    public function upload_document($document)
    {
        $name_document = $this->id . '.pdf';
        $document->storeAs('transparency/', $name_document, ['disk'=>'public']);
    }
    public function get_document_url()
    {
        Return Storage::url('transparency/'.$this->id . '.jpg');
    }
    public function download_document($transparency)
    {
        return Storage::download('transparency/'.$transparency->id.'.pdf', $transparency->name.'.pdf');
    }
}
