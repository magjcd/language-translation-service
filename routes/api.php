<?php

use App\Http\Controllers\APIs\AuthController;
use App\Http\Controllers\APIs\LanguageController;
use App\Http\Controllers\APIs\TagController;
use App\Http\Controllers\APIs\TranslationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class,'login'])->name('login')->middleware('throttle:langServSecurity');

Route::middleware('auth:sanctum')->group(function(){
    
    Route::controller(AuthController::class)->name('auth.')->group(function(){
        Route::get('logout','logout')->name('logout');
    });

    Route::controller(TagController::class,)->name('tag.')->group(function(){
        Route::post('add-tag','addTag')->name('add');
        Route::put('update-tag/{id}','updateTag')->name('update');
        Route::get('list-tags','listTags')->name('listAll');
        Route::get('list-tag-by-id/{id}','listTagById')->name('listById')->middleware('throttle:langServSecurity');
        Route::delete('delete-tag/{id}','deleteTag')->name('delete');
    });

    Route::controller(LanguageController::class,)->name('language.')->group(function(){
        Route::post('add-language','addLanguage')->name('add');
        Route::get('list-languages','listLanguage')->name('listAll');
        Route::get('list-language-by-id/{id}','listLanguageById')->name('listById')->middleware('throttle:langServSecurity');
        Route::put('update-language/{id}','updateLanguage')->name('update');
        Route::delete('delete-language/{id}','deleteLanguage')->name('delete');
    });

    Route::controller(TranslationController::class,)->name('translation.')->group(function(){
        Route::post('add-translation','addTranslation')->name('add');
        Route::put('update-translation/{id}','updateTranslation')->name('update');
        Route::get('list-translations','listTranslations')->name('listAll')->middleware('throttle:langServSecurity');
        Route::get('list-translation-by-id/{id}','listTranslationbyId')->name('listById');
        Route::delete('delete-translation/{id}','deleteTranslation')->name('delete');
    });

});