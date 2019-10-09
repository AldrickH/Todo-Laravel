<?php

namespace App\Repositories;

use App\Todo;

class TodoRepository implements TodoInterface
{
  
    public function all()
    {
        return Todo::all();
    }

    public function create(string $description)
    {
        $newTodo = new Todo;
        $newTodo->description = $description;
        $newTodo->status = 0;
        $newTodo->save();
    }

    public function get(int $id)
    {
        return Todo::findOrFail($id);
    }

    public function update(int $id, Todo $data)
    {
        if ($data->status == "finished") $status = 1;
        else $status = 0;
        $this->get($id)->update(['description' => $data->description, 'status' => $status]);
    }
    
    public function delete(int $id)
    {
        $this->get($id)->delete();
    }

    public function showFinished() {
        return $this->all()->where('status', 1);
    }
}