<?php
//config files
include "bootstrap.php";
//header
include VIEW . 'header.php';
?>
<body>
    <div class="container-fluid" style="margin-top: 50px; border: 1px dotted #ccc;">

        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li class="active"><a href="#">Início <span class="sr-only">(current)</span></a></li>

                    <li><a href="#">Relatórios</a></li>
                    <li><a href="#">Export</a></li>
                </ul>

                <div style="height: 400px;"></div>

            </div>
        </div><!--fecha row -->

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


            <h2 class="sub-header">Registro de Atividades</h2>


            <form name="type_chamado" method="post" action="#">

                <button type="button" class="btn typeAtividade" id="btn_todos" value="0"><span class="glyphicon glyphicon-alert"></span> Todos</button>        
                <button type="button" class="btn btn-danger typeAtividade" id="btn_pendente" value="4">Pendente</button>
                <button type="button" class="btn btn-primary typeAtividade" id="btn_exec" value="3">Em Desenvolvimento</button>
                <button type="button" class="btn btn-warning typeAtividade" id="new_activ" value="2">Em Testes</button>   

                &nbsp;&nbsp;
                <button type="button" class="btn btn-success" id="btn_final" value="1">Concluído</button>

            </form>

            <div class="table-responsive">
                <table class="table " style="font-size: 12px;">
                    <thead>
                        <tr>                  
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Inicio</th>
                            <th>Final</th>
                            <th>Situação</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <!-- lista aparece aqui-->
                    <tbody></tbody>
                </table>              
                <div class="clearfix"></div>
                <button type="button" class="btn btn-primary" id="btn_exec"><span class="glyphicon glyphicon-plus"></span> Nova Atividade</button>
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li>
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
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