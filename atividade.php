<?php
//config files
include "bootstrap.php";
//header
include VIEW . 'header.php';
?>
<script>
$(document).ready(function () {

    $('#enviar').click(function () {

        console.log('envia executando');

        var nome = $("input#nome").val();
        var descricao = $("textarea#desc").val();
        var status = $("select#status").val();
        var situacao = $('input[name="situacao"]:checked').val();        

        var setJson = JSON.stringify({'nome': nome, 'desc': descricao,'status': status, 'situacao': situacao});
        console.log(setJson);
        
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '/api/addAtividade.php',
            data: setJson,
            success: function (data) {
               // console.log(setJson);  
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
</script>
<body>
    <div class="container-fluid" style="margin-top: 50px; border: 1px dotted #ccc;">
        <?php include "View/sideBar.php"; ?>        
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h2 class="sub-header">Registro de Atividades</h2>
            <form name="addAtividade" action="api/addAtividade.php">
                <table class="table" border="0">
                    <tbody>
                        <tr>
                            <td colspan="2">                                
                                <label>*Nome</label>                                
                                <input type="text" name="nome" id="nome" class="form-control " style="font-size: 14px; font-weight: bold; width: 500px;">                               
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <label>*Descrição</label><br>
                                <textarea name="desc" id="desc" style="width: 600px; height: 100px; font-size: 12px; padding: 8px;"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="position: relative; float: left; margin-right: 12px;">                                    
                                    <label>*Status</label>
                                    <select name="status" id="status" class="form-control select-status" style="font-size: 16px; width: 200px;">
                                        <?php
                                            foreach ($itemsStatus as $dataItem) {
                                                if($dataItem->getId() == 4){
                                                    $setSelected = 'selected';                                                    
                                                }else{                                                    
                                                    $setSelected = '';
                                                }
                                                echo '<option value="'.$dataItem->getId().'" '.$setSelected.'>'.$dataItem->getNome().'</option>';                                            
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div style="position: relative; float: left; background-color: #f5f5f5; padding-left: 12px; padding-right: 12px; padding-bottom: 6px; width: 200px;">

                                    <label>*Situação</label><br>

                                    <div style="text-align: center;">
                                        <label>Ativo</label>
                                        <input type="radio" class="situacao" name="situacao" value="1">&nbsp;&nbsp;  

                                        <label>Inativo</label>
                                        <input type="radio" class="situacao" name="situacao" value="0">
                                    </div>                                
                                </div>
                            </td>
                            <td></td>
                            <td> </td>

                        </tr>

                        <tr>
                            <td colspan="2">                                
                                <button id="enviar" type="button" name="btn" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-floppy-disk"></span> Gravar</button>                       
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div><!--/content-->
    </div>
    <div style="height: 300px;"></div>

<?php
//footer
include "View/footer.php";
?>