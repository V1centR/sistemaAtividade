<?php
//config files
include "./bootstrap.php";

//header
include VIEW.'/header.php';
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

         
          <?php
          
          echo "ok 123";
          
          
          ?>
          
          
          
          
          
          <h2 class="sub-header">Registro de Atividades</h2>
          
          
    <form name="type_chamado" method="post" action="#">
        
       <button type="button" class="btn" id="btn_aberto">Todos</button>
       <input type="hidden" name="aberto" id="aberto" value="0">
        
       <button type="button" class="btn btn-danger" id="btn_aberto">Pendente</button>
       <input type="hidden" name="aberto" id="aberto" value="0">

        <button type="button" class="btn btn-primary" id="btn_exec">Em Desenvolvimento</button>
       <input type="hidden" name="exec" id="exec" value="1">

       <button type="button" class="btn btn-warning" id="new_chamado">
        Em Testes</button>   

       &nbsp;&nbsp;
        <button type="button" class="btn btn-success" id="btn_final">Concluído</button>
       <input type="hidden" name="final" id="final" value="2">
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
              <tbody>
                
            <?php

            for($i=1; $i<=10;$i++){

                echo '
                        <tr class="hover-row">
                          <td>Miguel Guimarães</td> <!-- nome -->
                          <td>Testes com bootstrap</td> <!-- descricao -->
                          <td>29/08/2017 14:51</td> <!-- data inicio -->
                          <td>29/08/2017 17:00</td> <!-- data fim -->
                          <td>Ativo</td> <!-- status -->
                          <td><div class="progress status-running-desenvolvimento">
        <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>        
    </div></td> <!-- situacao -->
                        </tr>
                    ';
            }                

            ?>
                
              </tbody>
              
              
            </table>              
              
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
include "./view/footer.php";
?>