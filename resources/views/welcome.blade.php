@extends('layouts.app')

@section('content')
    <form method="post" enctype="multipart/form-data" id="uploadForm">
        <input type="file" name="image" id="file">
        <input type="submit" value="Upload" id="upload">
    </form>
@endsection