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
        $this->economic_document= $economic_document->extension();
        $name_economic_document = $this->get_saved_name_economic_document();
        $this->save();
        $economic_document->storeAs('transparency/', $name_economic_document, ['disk'=>'public']);
    }
    public function upload_entity_document($entity_document)
    {
        $this->entity_document= $entity_document->extension();
        $name_entity_document = $this->get_saved_name_entity_document();
        $this->save();
        $entity_document->storeAs('transparency/', $name_entity_document, ['disk'=>'public']);
    }
    public function get_economic_url()
    {
        Return Storage::url('transparency/'. $this->get_saved_name_economic_document());
    }
    public function get_entity_url()
    {
        Return Storage::url('transparency/'. $this->get_saved_name_entity_document());
    }

    public function get_saved_name_economic_document(): string
    {
        return $this->date_name . 'Economic' . '.' . $this->economic_document;
    }

    public function get_saved_name_entity_document(): string
    {
        return $this->date_name . 'Entitat' . '.' . $this->entity_document;
    }

}
