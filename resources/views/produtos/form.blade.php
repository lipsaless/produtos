<form id="form-produto" class="ui form" method="POST" action="{{ route('produto-gravar') }}"> 
    <div class="field">
        <label for="no_produto">Nome do produto:</label>
        <input type="text" name="no_produto" id="no_produto" value="{{ $obj->no_produto }}">
    </div>
    <div class="field">
        <label for="id_tipo_produto">Tipo do produto:</label>
        <select class="" id="id_tipo_produto" name="id_tipo_produto">
            <?php foreach ($tipos as $value): ?>
                <?php $selecionado = ($value->id_produto_tipo == $obj->id_produto_tipo) ? 'selected' : '' ?>
                <option value="<?php echo $value->id_produto_tipo; ?>" <?php echo $selecionado; ?>><?php echo $value->no_produto_tipo; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="field">
        <label for="nu_preço">Preço do produto:</label>
        <input type="text" name="nu_preço" id="nu_preço" value="{{ $obj->nu_preco }}">
    </div>
    <div class="field">
        <label for="ds_produto">Descrição do produto:</label>
        <input type="text" name="ds_produto" id="ds_produto" value="{{ $obj->ds_produto }}">
    </div>
    <button class="ui green button" type="submit">Salvar</button>
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