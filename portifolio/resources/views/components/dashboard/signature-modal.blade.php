<!-- Modal Signature -->
<div class="modal fade" id="modalSignature" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Signature</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/add/signature" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="inputState">Tipo</label>
                    <select  name="type" id="inputState" class="form-control mb-3">
                        <option selected disabled>escolha...</option>
                        <option value="basico">Basico</option>
                        <option value="premio">Prêmio</option>
                        <option value="especializado">Especializado</option>
                    </select>
                    <label for="inputState">Tipo de Pagamento</label>
                    <select  name="payamentType" id="inputState" class="form-control mb-3">
                        <option selected disabled>escolha...</option>
                        <option value="mes">mês</option>
                        <option value="hora">hora</option>
                        <option value="dia">dia</option>
                    </select>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                            <span class="input-group-text">0.00</span>
                        </div>
                        <input type="text" class="form-control" name="price" placeholder="ex: 9.99" aria-label="Dollar amount (with dot and two decimal places)">
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
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descrição</label>
                        <textarea class="form-control"  name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
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
<!--End Modal Signature -->