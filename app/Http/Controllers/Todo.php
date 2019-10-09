<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo as todoModel;
use App\Repositories\TodoRepository;

class Todo extends Controller
{
    private $todoRepo;

    public function __construct()
    {
        $this->todoRepo = new TodoRepository();
    }

    public function index()
    {
        $todos = $this->todoRepo->all();
        return view('index', ['todos' => $todos]);
    }

    public function new_form()
    {
        return view('new');
    }

    public function save(Request $request)
    {
        $description = $request->input('description');
        $this->todoRepo->create($description);
        return redirect()->route('todoIndex');
    }

    public function detail(int $id)
    {
        $todo = $this->todoRepo->get($id);
        return view('detail', ['todo' => $todo]);
    }

    public function delete(int $id)
    {
        $this->todoRepo->delete($id);
        return redirect()->route('todoIndex');
    }

    public function edit(int $id)
    {
        $todo = $this->todoRepo->get($id);
        return view('edit', ['todo' => $todo]);
    }

    public function update(Request $request, int $id)
    {
        $todo = new todoModel();
        $todo->description = $request->input('description');
        $todo->status = $request->input('status');
        $this->todoRepo->update($id, $todo);
        return redirect()->route('todoIndex');
    }

    public function finished() {
        $todos = $this->todoRepo->showFinished();
        return view('finished', ['todos' => $todos]);
    }
}