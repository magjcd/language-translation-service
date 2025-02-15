<?php

namespace App\Repositories\Classes;

use App\Models\TagTranslation;
use App\Models\Translation;
use App\Repositories\Interfaces\TranslationInterface;
use Illuminate\Support\Facades\DB;

class TranslationClass implements TranslationInterface
{

    public function addTranslation($data){
        DB::beginTransaction();
        try {

            $payload = [
                'title' => $data['title'],
                'details' => $data['details'],
                'language_id' => $data['language_id']
            ];

            $add_translation = Translation::create($payload);
            
            foreach($data['tags'] as $device){
                $tags_payload = [
                'tag_id' => $device,
                'translation_id' => $add_translation->id
                ];

                TagTranslation::create($tags_payload);
            }

            DB::commit();
            return response()->success(true,null,'translation added',201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->error(false,$e->getMessage(),500);
        }
    }
    public function updateTranslation($data,$id){
        DB::beginTransaction();
        try {
            
            $payload = [
                'title' => $data['title'],
                'details' => $data['details'],
                'language_id' => $data['language_id']
            ];

            Translation::whereId($id)->update($payload);

            TagTranslation::whereTranslationId($id)->delete();
            foreach($data['tags'] as $device){
                $tags_payload = [
                'tag_id' => $device,
                'translation_id' => $id
                ];

                TagTranslation::create($tags_payload);
            }

            DB::commit();
            return response()->success(true,null,'translation updated',201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->error(false,$e->getMessage(),500);
        }
    }

    public function listTranslations(){
        try{
            $list_translations = Translation::select('id','title','details','language_id')->with('languages:id,code,name')->get();
            
            if(!$list_translations){
                return response()->error(false,'record could not be found',400);
            }
            return response()->success(true,$list_translations,null,200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->error(false,$e->getMessage(),500);
        }
    }

    public function listTranslationbyId($id){
        try {

            $list_translation_by_id = Translation::select('id','title','details','language_id')->with('tags:id,tag_name','languages:id,code,name')->find($id);
            
            if(!$list_translation_by_id){
                return response()->error(false,'record could not be found',400);
            }
            return response()->success(true,$list_translation_by_id,null,200);

        } catch (\Exception $e) {
            return response()->error(false,$e->getMessage(),500);
        }
    }
    
    public function deleteTranslation($id){
        try {
            $delete_translation = Translation::whereId($id)->delete();
            if(!$delete_translation){
                return response()->error(false,'record could not be deleted',400);
            }
            return response()->success(true,null,'record deleted',200);
        } catch (\Exception $e) {
            return response()->error(false,$e->getMessage(),500);
        }
    }
}
