@extends('layouts.layouts')
@section('title', 'Editar Portifolio')
@section('content')

    <x-dashboard.navbar/>

    <div class="card w-75">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="{{Storage::url($list->patch)}}" alt="" width="200" height="200">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Portifolio</h5>
                    <form action="/update/portifolio" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Titulo</label>
                        <input type="text" class="form-control" name="title" value="{{$list->title}}" id="formGroupExampleInput" placeholder="Digite um Titulo">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descrição</label>
                        <textarea class="form-control"  name="description" id="exampleFormControlTextarea1" rows="3">{{$list->description}}</textarea>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file"  class="custom-file-input" name="imagem" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Escolha uma imagem</label>
                        </div>
                    </div>
                    <label for="basic-url">Digite a URL do site</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">URL</span>
                        </div>
                        <input type="text" class="form-control" value="{{$list->url}}" placeholder="https://example.com/users/" name="url" id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <label for="inputState">Tipo de Serviço</label>
                    <input type="hidden" name="type" value="{{$list->type}}">
                    <select  name="type" id="inputState" class="form-control">
                        <option selected disabled>{{$list->type}}</option>
                        <option>...</option>
                        <option>...</option>
                        <option>...</option>
                    </select>
                        <button type="submit" class="btn mt-2 btn-success">Editar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection