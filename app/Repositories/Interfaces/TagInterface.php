<?php

namespace App\Repositories\Interfaces;

interface TagInterface
{
    public function addTag($data);
    public function updateTag($data,$id);
    public function listTags();
    public function listTagById($id);
    public function deleteTag($id);
}
