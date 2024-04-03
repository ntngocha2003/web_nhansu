<?php
namespace App\Traits;

trait QueryScope{

    public function scopeRelationKeyword($query,$keyword,$fieldSearch=['name']){
        if(!empty($keyword)){
            if(count($fieldSearch)){
                foreach($fieldSearch as $key=>$val){
                    $query->orWhere($val,'like','%'.$keyword.'%');
                }
            }
        }
    }

    public function scopeRelationCount($query,$relation){
        if(!empty($relation)){
            foreach($relation as $item){
                $query->withCount($item);
            }
        }
        return $query;
    }
}