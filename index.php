<?php
//config files
include "bootstrap.php";
//header
include VIEW . 'header.php';
?>
<script src="View/js/scripts.js"></script>
<body>
    <div class="container-fluid" style="margin-top: 50px; border: 1px dotted #ccc;">

        <?php include "View/sideBar.php";?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h2 class="sub-header">Registro de Atividades</h2>
            <form name="type_chamado" method="post" action="#">
                <input type="hidden" id="editMode" name="edit" value="false">
                <button type="button" class="btn typeAtividade" id="btn_todos" value="0"><span class="glyphicon glyphicon-alert"></span> Todos</button>        
                <button type="button" class="btn btn-danger typeAtividade" id="btn_pendente" value="4">Pendente</button>
                <button type="button" class="btn btn-primary typeAtividade" id="btn_exec" value="3">Em Desenvolvimento</button>
                <button type="button" class="btn btn-warning typeAtividade" id="new_activ" value="2">Em Testes</button>
                &nbsp;&nbsp;
                <button type="button" class="btn btn-success typeAtividade" id="btn_final" value="1">Concluído</button>
            </form>

            <div class="table-responsive">
                <table class="table " style="font-size: 12px;">
                    
                    <!-- lista aparece aqui-->
                    <tbody></tbody>
                </table>              
                <div class="clearfix"></div>
                <button type="button" class="btn btn-primary" id="btn_new"><span class="glyphicon glyphicon-plus"></span> Nova Atividade</button>
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li>
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>                        
                        <li>
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div><!--/content-->
    </div>
    <div style="height: 300px;"></div>
<?php
//footer
    include "View/footer.php";
?>