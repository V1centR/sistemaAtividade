$(document).ready(function () {
    var ambient = localStorage.getItem('ambient');
    var editMode = $('input#editMode').val();
    var formMode = $('input#formMode').val();
    
    if(editMode === 'false'){        
        if (ambient === null || ambient === '' || ambient === 0) {
            orderAtividades(0);
        } else {
            orderAtividades(ambient);
        }
        $('.typeAtividade').click(function () {
            orderAtividades(this.value);
        });
        $('button#btn_new').click(function () {
            window.location.href = '/atividade.php';
        });
        $('tr').click(function () {
            window.location = $(this).attr('href');
            return false;
        });
    }
    
    if(formMode === 'true'){
        $('button#voltar').click(function(){        
            window.location.href = '/';
        });
        
        $('#enviar').click(function () {            
            execForm();
        });
    }    
    if(editMode === 'true'){
        
        $('form.addAtividade')[0].reset();
        
    }
    function orderAtividades(type) {
        console.log("O tipo de ordenação é  " + type);
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '/api/orderAtividades.php',
            data: 'setType=' + type,
            success: function (data) {
                //console.log(strJson);
                $('tbody').html('');
                var ambient = localStorage.setItem('ambient', type);
                // $('tbody').load("api/orderAtividades.php?setType=" + type);
                makeList(data);
                console.log(data);
            },
            error: function (data) {
                console.log(data);
                return false;
            }
        });
    }
    function makeList(data) {

        $.each(data, function () {

            if (this.situacao == 0) {
                var labelSit = 'Inativo';
            } else {
                var labelSit = 'Ativo';
            }            
            if(this.dataFim == 0 || this.dataFim == 'false'){
                var dataFinal = ' - ';
            }else{
                var dataFinal = this.dataFim;
            }
            switch (this.statusId) {
                case 1:
                    var setColorStatus = "-success";
                    break;
                case 2:
                    var setColorStatus = "-warning";
                    break;
                case 3:
                    var setColorStatus = "";
                    break;
                case 4:
                    var setColorStatus = "-danger";
                    break;
            }
            $('tbody').append(
                    '<tr class="hover-row" onclick="document.location=\'atividade.php?edit=true&atividade='+ this.id +'\'" style="cursor:hand"><td>' + this.nome + '</td><td>' + this.descricao.substring(0, 70) + '...</td><td>' + this.dataInicio + '</td><td>' + dataFinal + '</td><td>' + labelSit + '</td><td><div class="progress status-running-desenvolvimento"><div class="progress-bar progress-bar' + setColorStatus + ' progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div></td></tr>'
                    );
        });
    }
    
    function execForm(){
        
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
    }
    // --final documentReady --
});