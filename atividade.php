<?php
//config files
include "bootstrap.php";
//header
include VIEW . 'header.php';
?>
<script src="View/js/scripts.js"></script>
<body>
    <div class="container-fluid" style="margin-top: 50px; border: 1px dotted #ccc;">
        <?php include "View/sideBar.php"; ?>        
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="min-height: 400px;">
            <h2 class="sub-header">Registro de Atividades</h2>
            <span class="message"></span>
            <span class="message-danger"></span>
            <form name="addAtividade" class="addAtividade">
                <input type="hidden" id="formMode" name="form" value="true">
                <input type="hidden" id="idAtividade" name="idAtividade" value="<?=$atividadeId?>">
                <?php
                    if($setEdit){
                        echo '<input type="hidden" id="editMode" name="edit" value="true">';
                    }
                ?>
                <table class="table" border="0">
                    <tbody>
                        <tr>
                            <td colspan="2">                                
                                <label>*Nome</label>                                
                                <input type="text" name="nome" id="nome" class="form-control " value="<?=$atividadeNome?>" style="font-size: 14px; font-weight: bold; width: 500px;">                               
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <label>*Descrição</label><br>
                                <textarea name="desc" id="desc" maxlength="600" style="width: 600px; height: 150px; font-size: 12px; padding: 8px;"><?=$atividadeDescricao?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="position: relative; float: left; margin-right: 12px;">                                    
                                    <label>*Status</label>
                                    <select name="status" id="status" class="form-control select-status" style="font-size: 16px; width: 200px;">
                                        <?php
                                            $selectedItem = 4;
                                            if($setEdit){                                                
                                                $selectedItem = $atividadeStatus;
                                            }                                            
                                            foreach ($itemsStatus as $dataItem) {
                                                if($dataItem->getId() == $selectedItem){
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
                                        <input type="radio" class="situacao" name="situacao" <?=$disableSituacao?> value="1" <?=$ativoChecked?>>&nbsp;&nbsp;  

                                        <label>Inativo</label>
                                        <input type="radio" class="situacao" name="situacao" <?=$disableSituacao?> value="0" <?=$inativoChecked?>>
                                    </div>                                
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button id="voltar" type="button" name="btn" class="btn btn-primary btn-lg btn-voltar"><span class="glyphicon glyphicon-chevron-left"></span> Voltar</button>
                                <button id="enviar" type="button" name="btn" class="btn btn-primary btn-lg btn-enviar"><span class="glyphicon glyphicon-floppy-disk"></span> Gravar</button>
                                
                                <span class="loader"></span>
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