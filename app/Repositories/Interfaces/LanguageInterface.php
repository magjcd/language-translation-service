<?php

namespace App\Repositories\Interfaces;

interface LanguageInterface
{
    public function addLanguage($data);
    public function updateLanguage($data,$id);
    public function listLanguage();
    public function listLanguageById($id);
    public function deleteLanguage($id);
}
