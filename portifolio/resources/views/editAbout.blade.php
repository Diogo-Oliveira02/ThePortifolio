@extends('layouts.layouts')
@section('title', 'Editar About')
@section('content')

    <x-dashboard.navbar/>

    <div class="card w-75">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="{{Storage::url($list->patch)}}" alt="" width="200" height="200">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">About</h5>
                    <form action="/update/about" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$list->id}}">
                        <textarea name="description" cols="25" rows="4">{{$list->description}}</textarea>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="hidden" name="patch" value="{{$list->patch}}">
                                <input type="file" name="imagem" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Escolha uma foto</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Editar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection