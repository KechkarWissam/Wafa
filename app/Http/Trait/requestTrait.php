<?php

namespace app\Http\Trait;


trait requestTrait
{


    private function getModelFields($request, $available): array
    {
        return $request->only($available);
    }

    public function handleGet($model, $id)
    {
        return $model::find($id);
    }


    private function handleCreate($request, $model, $extra = [])
    {
        $fields = $this->getModelFields($request, app($model)->getFillable());
        if ($extra)
            $fields = array_merge($fields, $extra);
        return $model::create($fields);
    }

    private function handleUpdate($request, $model, $id)
    {


        $model = $model::where('id', $id)->first();

        $model->update($this->getModelFields($request, $model->getFillable()));

        return $model;

    }

    public function handleDelete($model, $id)
    {

        $model = $model::find($id);

        return $model->delete();
    }
}
