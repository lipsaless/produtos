<form id="form-produto" class="ui form" method="POST" action="{{ route('produto-gravar') }}"> 
    <div class="field">
        <label for="no_produto">Nome do produto:</label>
        <input type="text" name="no_produto" id="no_produto" value="{{ $obj->no_produto }}">
    </div>
    <div class="field">
        <label for="id_produto_tipo">Tipo do produto:</label>
        <select class="" id="id_produto_tipo" name="id_produto_tipo">
            <?php foreach ($tipos as $value): ?>
                <?php $selecionado = ($value->id_produto_tipo == $obj->id_produto_tipo) ? 'selected' : '' ?>
                <option value="<?php echo $value->id_produto_tipo; ?>" <?php echo $selecionado; ?>><?php echo $value->no_produto_tipo; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="field">
        <label for="id_produto_status">Status do produto:</label>
        <select class="" id="id_produto_status" name="id_produto_status">
            <?php foreach ($status as $value): ?>
                <?php $produtoStatus = ($value->id_produto_status == $obj->id_produto_status) ? 'selected' : '' ?>
                <option value="<?php echo $value->id_produto_status; ?>" <?php echo $produtoStatus; ?>><?php echo $value->no_produto_status; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="field">
        <label for="nu_preco">Preço do produto:</label>
        <input type="text" name="nu_preco" id="nu_preco" value="{{ $obj->nu_preco }}">
    </div>
    <div class="field">
        <label for="ds_produto">Descrição do produto:</label>
       <textarea name="" id="" cols="30" rows="10" id="ds_produto" name="ds_produto"></textarea>
    </div>
    <button id="salvar-produto" class="ui green button" type="submit">Salvar</button>
</form>

<script>
    $(document).ready(function() {
        $('#voltar-produto').click(function() {
            $('#voltar-produto').css("display", "none");
            $('#principal-produtos').show();
            $('#novo-produto').css("display", "block");
            $('h4').html('Produtos');
            $('#div-form-produtos').hide();
            $('#grid-produtos').show();
            $('#listar-produtos').click();
        });
    });

</script>