<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class ProductCategory extends Model
{
    use HasFactory;
    public $fillable =[
        'name',
        'description',
        'main_category_id',
    ];
    public static function getFileds(){
        return app(self::class)->getFillable();
    }
    public function category()
    {
      if($this->main_category_id)  return $this->BelongsTo(ProductCategory::class, 'main_category_id');
    }
    public function categories()
    {
      if(!$this->main_category_id)   return $this->hasMany(ProductCategory::class, 'main_category_id');
    }
    public static function getUpdateRules(){
        return [
            'name' => ['required','string',Rule::unique('product_categories', 'name')->ignore(request()->id),'max:100'],
            'description'=>['nullable'],
            'main_category_id'=>['nullable','exists:product_categories,id'],
        ];
    }

    public static function getCreateRules(){
        return [
            'name' => ['required','string','unique:product_categories','max:100'],
            'description'=>['nullable'],
            'main_category_id'=>['nullable','exists:product_categories,id'],
        ];
    }
}
