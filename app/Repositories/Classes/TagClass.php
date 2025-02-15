<?php

namespace App\Repositories\Classes;

use App\Models\Tag;
use App\Repositories\Interfaces\TagInterface;

class TagClass implements TagInterface
{
    public function addTag($data){
        try{

            $payload = [
                'tag_name' => $data['tag_name'],
            ];

            $add_tag = Tag::create($payload);

            if(!$add_tag){
                return response()->error(false,'tag could not be added',400);
            }
            return response()->success(true,null,'tag added',201);

        
        } catch (\Exception $e) {
            return response()->error(false,$e->getMessage(),500);
        }
    }
    
    public function updateTag($data,$id){
        try{

            $payload = [
                'tag_name' => $data['tag_name']
            ];

            $update_tag = Tag::whereId($id)->update($payload);
            
            if(!$update_tag){
                return response()->error(false,'tag could not be update',400);
            }
            return response()->success(true,null,'tag updated',200);

        } catch (\Exception $e) {
            return response()->error(false,$e->getMessage(),500);
        }
    }

    public function listTags(){
        try{
        
            $list_tags = Tag::select('id','tag_name')->withCount('translations')->get();
            
            if(!$list_tags){
                return response()->error(false,'no record be found',400);
            }
            return response()->success(true,$list_tags,null,200);

        } catch (\Exception $e) {
            return response()->error(false,$e->getMessage(),500);
        }
    }
    
    public function listTagById($id){
        try{
        
            $list_tag = Tag::select('id','tag_name')->with('translations:id,title,details,language_id')->withCount('translations')->whereId($id)->get();
            
            if(!$list_tag){
                return response()->error(false,'no record be found',400);
            }
            return response()->success(true,$list_tag,null,200);

        } catch (\Exception $e) {
            return response()->error(false,$e->getMessage(),500);
        }
    }
    
    public function deleteTag($id){
        try{
            
            $delete_tag = Tag::whereId($id)->delete();
            if(!$delete_tag){
                return response()->error(false,'record could not be deleted',400);
            }
            return response()->success(true,null,'record deleted',200);

        } catch (\Exception $e) {
            return response()->error(false,$e->getMessage(),500);
        }
    }
}
