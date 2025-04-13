<?php

namespace app\Helpers;
use Illuminate\Database\Schema\Blueprint;


class MigrationHelper{
    public static function sharedColumnsForVideosAndImages(Blueprint $table){
        $table->string("intitule_video");
        $table->text("description");
        $table->unsignedBigInteger("post_id");
    }    
    
}