$(document).ready(function () {
    
    $('form.addAtividade')[0].reset();
    $('button#voltar').click(function(){        
        window.location.href = '/';
    });
    $('#enviar').click(function () {       
        var nome = $("input#nome").val();
        var descricao = $("textarea#desc").val();
        var status = $("select#status").val();
        var situacao = $('input[name="situacao"]:checked').val();
        
        if(nome == '' || descricao == ''){                
            $('span.message-danger').append('<div class="alert alert-danger" role="alert"><strong>ATENÇÃO!</strong> Todos os campos são obrigatórios!</div>');
            return false;
        }
        
        $("button.btn-enviar").attr("disabled","disabled");
        $('span.loader').append('<img src="View/images/loader.gif">');
        
        var setJson = JSON.stringify({'nome': nome, 'desc': descricao,'status': status, 'situacao': situacao});
        
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '/api/addAtividade.php',
            data: setJson,
            success: function (data) {
               // console.log(setJson)
               $('span.loader').remove();
               $('span.message-danger').remove();
               $("form.addAtividade").fadeOut('fast');
               $('span.message').append('<div class="alert alert-success" role="alert">Atividade registrada com sucesso! <a href="/">(Clique para voltar)</a></div>');
                return true;
            },
            error: function (data) {
                console.log(data);
                return false;
            }
        });
    });
    // --final documentReady --
});