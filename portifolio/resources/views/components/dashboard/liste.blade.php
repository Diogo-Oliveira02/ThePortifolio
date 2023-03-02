<form action="/search/{{$service}}" method="post" class="form-inline mt-lg-3 mt-sm-0 justify-content-center">
    @csrf
    <div class="input-group mb-3">
        <input type="text" class="form-control" name="search" size="40" placeholder="search" aria-label="search" aria-describedby="button-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
        </div>
    </div> 
</form> 
@if  (isset($result))
    <div class="container-fluid mt-5">
        <div class="row">
            @foreach($result as $key)
                <div class="col-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$service}}</h5>
                            <p class="card-text">{{$key->description}}</p>
                            <form action="/editar/{{$service}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$key->id}}">
                                <button class="btn btn-warning">Edit</button>
                            </form>
                            <form action="/deletar/{{$service}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$key->id}}">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif