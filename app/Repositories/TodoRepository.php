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
        $todo = Todo::findOrFail($id);
        $todo->description = $data->description;
        if ($data->status == "finished") $todo->status = 1;
        else $todo->status = 0;
        $todo->save();
    }
    
    public function delete(int $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
    }

    public function showFinished() {
        return Todo::all()->where('status', 1);
    }
}