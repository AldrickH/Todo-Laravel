@extends('base')

@section('body')
<table border='1'>
    <tr>
        <td>ID</td>
        <td>Description</td>
        <td>Status</td>
        <td colspan="3">Action</td>
    </tr>

    @foreach ($todos as $todo)
    <tr>
        <td>{{ $todo->id }}</td>
        <td>{{ $todo->description }}</td>
        <td><?php if ($todo->status) echo "Finished"; else echo "Unfinished"; ?></td>
        <td><a href="{{ route('todoDetail', ['id' => $todo->id])}}"><button>DETAIL</button></a></td>
        <td><a href="{{ route('todoEditForm', ['id' => $todo->id])}}"><button>EDIT</button></a></td>
        <td><a href="{{ route('todoDelete', ['id' => $todo->id])}}"><button onclick="return confirm('Are you sure ?')">DELETE</button></a></td>
    </tr>
    @endforeach

</table>
<a href="{{ route('todoNewForm') }}"><button>Add new Todo</button></a>
@endsection