<?php
namespace App\Services; use Illuminate\Database\Eloquent\Model; use Illuminate\Http\Request;
abstract class CrudService { public function index(Model $model){return $model->newQuery()->paginate(15);} public function store(Model $model,array $data){return $model->newQuery()->create($data);} public function show(Model $model,$id){return $model->newQuery()->findOrFail($id);} public function update(Model $model,$id,array $data){$item=$this->show($model,$id);$item->update($data);return $item->fresh();} public function destroy(Model $model,$id):void{$this->show($model,$id)->delete();} }
