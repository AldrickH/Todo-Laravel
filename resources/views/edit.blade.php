@extends('base')

@section('body')
<form method="post" action="{{ route('todoUpdate', ['id'=>$todo->id]) }}">
    @csrf
    <div>
        <label>Description :</label>
        <input type="text" name="description" value="{{ $todo->description }}">
    </div>
    <div>
        <label>Status :</label>
        <input type="checkbox" name="status" value="finished" <?php if ($todo->status) echo "checked";?>>Finished
    </div>
    <div>
        <input type="submit">
    </div>
</form>
@endsection