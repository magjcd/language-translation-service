<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\Interfaces\TagInterface;

use App\Http\Requests\APIs\TagRequest;

class TagController extends Controller
{
    protected $tag_interface;

    public function __construct(TagInterface $tag_interface){
        $this->tag_interface = $tag_interface;
    }

    public function addTag(TagRequest $req){
        return $this->tag_interface->addTag($req);
    }

    public function updateTag(TagRequest $req,$id){
        return $this->tag_interface->updateTag($req,$id);    
    }

    public function listTags(){
        return $this->tag_interface->listTags();
    }

    public function listTagById($id){
        return $this->tag_interface->listTagById($id);
    }

    public function deleteTag($id){
        return $this->tag_interface->deleteTag($id);
    }

}
