<?php

namespace App\Modules\ProductCategories\requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Modules\ProductCategories\models\ProductCategory;

class UpdateProductCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = ProductCategory::getUpdateRules();

        return $rules;
    }
}
