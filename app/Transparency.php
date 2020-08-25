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
        $name_document = $this->id . '_economic.pdf';
        $economic_document->storeAs('transparency/', $name_document, ['disk'=>'public']);

    }
    public function upload_entity_document($entity_document)
    {
        $name_document = $this->id . '_entity.pdf';
        $entity_document->storeAs('transparency/', $name_document, ['disk'=>'public']);
    }
    public function get_economic_url()
    {
        Return Storage::url('transparency/'.$this->id . '_economic.pdf');
    }
    public function get_entity_url()
    {
        Return Storage::url('transparency/'.$this->id . '_entity.pdf');
    }


    public function view_documents()
    {
        Storage::setVisibility('transparency/'.$this->id . '_entity.pdf');

    }



}
