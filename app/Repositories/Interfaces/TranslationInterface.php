<?php

namespace App\Repositories\Interfaces;

interface TranslationInterface
{
    public function addTranslation($data);
    public function updateTranslation($data,$id);
    public function listTranslations();
    public function listTranslationbyId($id);
    public function deleteTranslation($id);
}
