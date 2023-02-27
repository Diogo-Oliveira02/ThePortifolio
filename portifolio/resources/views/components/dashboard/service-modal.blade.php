 <!-- Modal Service -->
 <div class="modal fade" id="modalService" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/add/service" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Titulo</label>
                        <input type="text" class="form-control" name="title" id="formGroupExampleInput" placeholder="Digite um Titulo">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descrição</label>
                        <textarea class="form-control"  name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
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
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">ADD</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End Modal Service -->