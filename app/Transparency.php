<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Transparency extends Model
{
    protected $fillable = [
        'date_name', 'economic_document','entity_document'
    ];
    public function upload_economic_document($economic_document)
    {
        $name_document = $this->date_name . '_economic.pdf';
        $economic_document_path='/transparency/';
        $economic_document->storeAs($economic_document_path, $name_document);
    }
    public function upload_entity_document($entity_document)
    {
        $name_document = $this->date_name . '_entity.pdf';
        $entity_document_path='/transparency/';
        $entity_document->storeAs($entity_document_path, $name_document);
    }
    public function get_economic_url()
    {
        $economic_document_name = $this->date_name . '_economic.pdf';
        $economic_document_path = '/transparency/';
        Return Storage::url($economic_document_path . $economic_document_name);
    }
    public function get_entity_url()
    {
        $entity_document_path='/transparency/';
        Return Storage::url($entity_document_path . $this->date_name . '_entity.pdf');
    }

}
