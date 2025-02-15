<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\TranslationInterface;

use App\Http\Requests\APIs\TranslationRequest;

class TranslationController extends Controller
{
    protected $translation_interface;

    public function __construct(TranslationInterface $translation_interface){
        $this->translation_interface = $translation_interface;
    }

    public function addTranslation(TranslationRequest $req){
        return $this->translation_interface->addTranslation(($req));
    }

    public function updateTranslation(TranslationRequest $req,$id){
        return $this->translation_interface->updateTranslation($req,$id);
    }

    public function listTranslations(){
        return $this->translation_interface->listTranslations();
    }

    public function listTranslationbyId($id){
        return $this->translation_interface->listTranslationbyId($id);
    }

    public function deleteTranslation($id){
        return $this->translation_interface->deleteTranslation($id);
    }
}
