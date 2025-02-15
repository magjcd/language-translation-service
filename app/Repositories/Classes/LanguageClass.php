<?php

namespace App\Repositories\Classes;

use App\Models\Language;
use App\Repositories\Interfaces\LanguageInterface;
use Illuminate\Support\Facades\DB;

class LanguageClass implements LanguageInterface
{
    public function addLanguage($data){
        try {

            $payload = [
                'code' => $data['code'],
                'name' => $data['name']
            ];

            $add_language = Language::create($payload);
            if(!$add_language){
                return response()->error(false,'language could not be added',400);
            }
            return response()->success(true,null,'language added',201);

        } catch (\Exception $e) {
            return response()->error(false,$e->getMessage(),500);
        }
    }

    public function updateLanguage($data,$id){
        try{

            $payload = [
                'code' => $data['code'],
                'name' => $data['name'],
            ];


            $update_language = Language::whereId($id)->update($payload);
            if(!$update_language){
                return response()->error(false,'language could not be updated',400);
            }
            return response()->success(true,null,'language updated',201);
            
        } catch (\Exception $e) {
            return response()->error(false,$e->getMessage(),500);
        }
    }

    public function listLanguage(){
        try {

            $view_languages = Language::select('id','code','name')->withCount('translations')->get();

            if(!$view_languages){
                return response()->error(false,'no record is available ',400);
            }
            return response()->success(true,$view_languages,null,200);
            
        } catch (\Exception $e) {
            return response()->error(false,$e->getMessage(),500);
        }
    }

    public function deleteLanguage($id){
        try {
            $delete_language = Language::whereId($id)->delete();
            if(!$delete_language){
                return response()->error(false,'record could not be deleted',400);
            }
            return response()->success(true,null,'record deleted',200);
        } catch (\Exception $e) {
            return response()->error(false,$e->getMessage(),500);
        }
    }

    public function listLanguageById($id){
        try{ 

            $list_lang_by_id = Language::select('id','code','name')->with('translations:id,title,details,language_id')->withCount('translations')->whereId($id)->get();
            
            // $list_lang_by_id= null;
            // Language::with('translations')->withCount('translations')->orderBy('id')
            // ->chunk(1000, function($lang_res) use(&$list_lang_by_id){
            //     $list_lang_by_id = $lang_res;
            // }); 

            if(!$list_lang_by_id){
                return response()->error(false,'record could not be found',400);
            }
            return response()->success(true,$list_lang_by_id,'record found',200);
        } catch (\Exception $e) {
            return response()->error(false,$e->getMessage(),500);
        }

    }


}
