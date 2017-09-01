$(document).ready(function () {

    //            var ambient = localStorage.setItem('ambient', nsId);
    var ambient = localStorage.getItem('ambient');

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
                    '<tr class="hover-row" onclick="document.location=\'#\'" style="cursor:hand"><td>' + this.nome + '</td><td>' + this.descricao.substring(0, 70) + '...</td><td>' + this.dataInicio + '</td><td>' + dataFinal + '</td><td>' + labelSit + '</td><td><div class="progress status-running-desenvolvimento"><div class="progress-bar progress-bar' + setColorStatus + ' progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div></td></tr>'
                    );
        });
    }

    $('#enviar').click(function () {

        console.log('envia ok');

        var nome = $("input#nome").val();
        var dataNasc = $("input#data-nasc").val();
        var email = $("input#email").val();
        var mobile = $("input#mobile").val();
        var region = $("select#regiao").val();
        var unit = $("select#unidade").val();

        var setJson = JSON.stringify({'nome': nome, 'data_nascimento': dataNasc, 'email': email, 'mobile': mobile, 'regiao': region, 'unidade': unit});

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'api/execForm.php',
            data: setJson,
            success: function (data) {
                console.log(data);

                if (data == true) {
                    $('div#panel_sucesso').show();
                    setToken(email);
                }
                // se email existir
                if (data == 3) {
                    $('div#panel_email_alert').show();
                    $('.go-back').click(function (event) {
                        event.preventDefault();
                        $('div#panel_email_alert').hide();
                    });
                }
                if (data == 4) {
                    $('div#panel_error').show();
                    $('.go-back').click(function (event) {
                        event.preventDefault();
                        $('div#panel_error').hide();
                    });
                }
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