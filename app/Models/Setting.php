<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'content',
    ];

    protected $appends = [
        'lcontent',
        'lname',

    ];
    public function getLnametAttribute(){
        return $this->checkAndGetAttr('name');
    }
    public function getLcontentAttribute(){
        return $this->checkAndGetAttr('content');
    }

    public static function getUpdateRules(){
        return [
            'name' => ['required'],
            'code'=>['required'],
            'content'=>['required'],
        ];
    }
}
