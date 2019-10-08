@extends('base')

@section('body')
<dl>
    <dt><b>Description</b></dt>
    <dd>{{ $todo->description }}</dd>
    <dt><b>Status</b></dt>
    <dd>{{ $todo->status }}</dd>
</dl>
@endsection