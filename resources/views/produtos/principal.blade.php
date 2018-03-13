@extends('template')

@section('view-template')
<div class="ui menu">
  <div class="item">
    <div class="ui primary button">Sign up</div>
  </div>
  <div class="item">
    <div class="ui button">Log-in</div>
  </div>
</div>

<h4 style="text-align: center;"><?php echo $title; ?></h4>

<button id="novo-produto" class="ui yellow button" data-action="{{ route('produto-form') }}" style="margin-left: 25%; color: black">Novo produto</button>

<button id="voltar-produto" class="ui yellow button" style="margin-left: 25%; display:none; color: black;"><i class="arrow left icon"></i>Voltar</button>


<div id="div-form-produtos"></div>

<div id="principal-produtos" class="ui form">
        <div class="fields">
            <div class="field">
                <label for="no_produto">Nome do produto:</label>
                <input type="text" id="no_produto" name="no_produto">
            </div>
            <div class="field">
                <label>Tipo do produto:</label>
                <select class="ui fluid dropdown" id="id_produto_tipo" name="id_produto_tipo">
                    <?php foreach ($tipos as $value): ?>
                        <option value="<?php echo $value->id_produto_tipo; ?>"><?php echo $value->no_produto_tipo; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="field">
                <label for="">&nbsp;&nbsp;</label>
                <button id="listar-produtos" class="ui red button" data-action="{{ route('produto-listar') }}" style="float: right; right:0;"><i class="angle double down icon"></i>Listar</button>
            </div>
        </div>
</div>

<div id="grid-produtos"></div>

<script>
    $(document).ready(function() {

        $('.ui.dropdown').dropdown();

        $('#novo-produto').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr("data-action"),
                type: "GET",
                data: $(this).serialize(),
                dataType: "html",
                success: function(formHtml) {
                    $('#principal-produtos').hide();
                    $('#novo-produto').css("display", "none");
                    $('#voltar-produto').css("display", "block");
                    $('h4').html('Cadastrar produto');
                    $('#div-form-produtos').html(formHtml);
                    $('#div-form-produtos').show();
                    $('#grid-produtos').hide();
                }
            });
            return false;
        });

        $('#listar-produtos').click(function() {

            let lista = '';

            $.ajax({
                url: $(this).attr("data-action"),
                type: "GET",
                data: $(this).serialize(),
                dataType: "json"
            }).done(function(grid){

                let lista = '';

                    lista = '<table class="ui table" style="margin-bottom: 15%;">';
                    lista += '    <thead>';
                    lista += '       <tr>';
                    lista += '            <th>Produto</th>';
                    lista += '            <th>Tipo</th>';
                    lista += '            <th>Preço</th>';
                    lista += '            <th style="text-align: center;">Ações</th>';
                    lista += '        </tr>';
                    lista += '    </thead>';
                    lista += '    <tbody>';

                    $.each(grid, function(key, rs){
                    
                        lista += '    <tr>';
                        lista += '        <td>'+rs.no_produto+'</td>';
                        lista += '        <td><div class="ui medium blue horizontal label">'+rs.no_produto_tipo+'</div></td>';
                        lista += '        <td>'+rs.nu_preco+'</td>';
                        lista += '        <td style="text-align:center;">';
                        lista += '              <button id="produto-editar" style="text-align:center;" class="ui yellow button produto-editar" data-action="'+rs.id_produto+'" style="float:right; right:10; color: black !important;">Editar</button>';
                        lista += '              <button id="produto-excluir" style="text-align:center;" class="negative ui button produto-excluir" style="float:right; right:0;" data-action="'+rs.id_produto+'">Excluir</button>';
                        lista += '        </td>';
                        lista += '    </tr>';
                    });
                                            
                    lista += '    </tbody>';
                    lista += '</table>';

                $('#grid-produtos').html(lista);

                $('.produto-editar').click(function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: '{{ route("produto-editar") }}'+ '/' + $(this).attr("data-action"),
                        type: "GET",
                        data: $(this).serialize(),
                        dataType: "html",
                        success: function(formHtml) {
                            $('#principal-produtos').hide();
                            $('#novo-produto').css("display", "none");
                            $('#voltar-produto').css("display", "block");
                            $('h4').html('Editar produto');
                            $('#div-form-produtos').html(formHtml);
                            $('#div-form-produtos').show();
                            $('#grid-produtos').hide();
                        }
                    });
                    return false;
                });

                $('.produto-excluir').click(function(e) {

                    Command: toastr["error"]("Excluído com sucesso!")
                            toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-center",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            }

                    e.preventDefault();
                    $.ajax({
                        url: '{{ route("produto-excluir") }}'+ '/' + $(this).attr("data-action"),
                        type: "GET",
                        data: $(this).serialize(),
                        dataType: "html",
                        success: function(formHtml) {
                            $('#listar-produtos').click();

                            
                        }
                    });
                    return false;
                });
            });
        });
        $('#listar-produtos').click();

        
    });
</script>
@stop