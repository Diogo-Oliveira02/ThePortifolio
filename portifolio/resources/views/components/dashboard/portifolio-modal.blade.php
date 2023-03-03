<!-- Modal Portifolio -->
<div class="modal fade" id="modalPortifolio" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Portifolio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/add/portifolio" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Titulo</label>
                        <input type="text" class="form-control" name="title" id="formGroupExampleInput" placeholder="Digite um Titulo">
                    </div>
                    <label for="inputState">Tipo de Serviço</label>
                    <select  name="type" id="inputState" class="form-control mb-3">
                        <option selected disabled>escolha...</option>
                        <option value="sass">SASS</option>
                        <option value="pass">PASS</option>
                        <option value="venda">VENDA</option>
                        <option value="api">API</option>
                        <option value="suport">SUPORTE</option>
                    </select>
                    <label for="basic-url">Digite a URL do site</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">URL</span>
                        </div>
                        <input type="text" class="form-control" placeholder="https://example.com/users/" name="url" id="basic-url" aria-describedby="basic-addon3">
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
<!--End Modal Portifolio -->