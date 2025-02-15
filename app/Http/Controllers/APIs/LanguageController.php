<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\Interfaces\LanguageInterface;
use App\Http\Requests\APIs\LanguageRequest;

class LanguageController extends Controller
{
    protected $language_interface;

    public function __construct(LanguageInterface $language_interface){
        $this->language_interface = $language_interface;
    }

    public function addLanguage(LanguageRequest $req){
        return $this->language_interface->addLanguage($req);
    }

    public function updateLanguage(LanguageRequest $req,$id){
        return $this->language_interface->updateLanguage($req,$id);
    }

    public function listLanguage(){
        return $this->language_interface->listLanguage();
    }

    public function deleteLanguage($id){
        return $this->language_interface->deleteLanguage($id);
    }

    public function listLanguageById($id){
        return $this->language_interface->listLanguageById(($id));
    }
}
