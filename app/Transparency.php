<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Transparency extends Model
{
    protected $fillable = [
        'date_name', 'economic_document','entity_document'
    ];
    public function upload_documents($economic_document,$entity_document)
    {
        $name_document = $this->id . '.pdf';
        $economic_document->storeAs('transparency/', $name_document, ['disk'=>'public']);
        $entity_document->storeAs('transparency/', $name_document, ['disk'=>'public']);
    }
    public function get_documents_url()
    {
        Return Storage::url('transparency/'.$this->id . '.pdf');
    }

    public function view_documents($transparency)
    {

    }

}
