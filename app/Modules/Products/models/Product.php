<?php

namespace App\Modules\Products\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Product extends Model
{
    use HasFactory;
    public $fillable =[
        'code_product',
        'designation',
        'ply',
        'quantity',
        'width',
        'height',
        'product_category_id',
    ];
    public static function getFileds(){
        return app(self::class)->getFillable();
    }
    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }
    public static function getUpdateRules(){
        return [
            'code_product' => ['required','string',Rule::unique('products', 'code_product')->ignore(request()->id),'max:100'],
            'designation'=>['required'],
            'quantity'=>['required'],
            'ply'=>['required'],
            'width'=>['nullable'],
            'height'=>['nullable'],
            'product_category_id'=>['required','exists:product_categories,id'],
        ];
    }

    public static function getCreateRules(){
        return [
            'code_product' => ['required','string','unique:products','max:100'],
            'designation'=>['required'],
            'quantity'=>['required'],
            'ply'=>['required'],
            'width'=>['nullable'],
            'height'=>['nullable'],
            'product_category_id'=>['required','exists:product_categories,id'],
        ];
    }
}
