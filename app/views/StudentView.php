<?php
class StudentView
{
  public function show($students = [])
  {
?>
    <?php
    // include('db_connect.php'); 
    ?>
    <style>
      input[type=checkbox] {
        /* Double-sized Checkboxes */
        -ms-transform: scale(1.3);
        /* IE */
        -moz-transform: scale(1.3);
        /* FF */
        -webkit-transform: scale(1.3);
        /* Safari and Chrome */
        -o-transform: scale(1.3);
        /* Opera */
        transform: scale(1.3);
        padding: 10px;
        cursor: pointer;
      }
    </style>
    <?php

    if ($_SESSION['login_type'] == 1) { ?>
      <div class="container-fluid">

        <div class="col-lg-12">
          <div class="row mb-4 mt-4">
            <div class="col-md-12">

            </div>
          </div>
          <div class="row">
            <!-- FORM Panel -->

            <!-- Table Panel -->
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <b>Lista de Estudiantes </b>
                  <span class="float:right"><a class="btn btn-primary col-md-1 col-sm-6 float-right" href="javascript:void(0)" id="new_student">
                      <i class="fa fa-plus"></i> Estudiante
                    </a></span>
                </div>
                <div class="card-body">
                  <table class="table table-condensed table-bordered table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th class="">ID No.</th>
                        <th class="">Nombre</th>
                        <th class="">Información</th>
                        <th class="text-center">Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     
                      $i = 1;
                      foreach ($students as $student) :
                      ?>
                        <tr>
                          <td class="text-center"><?php echo $i++ ?></td>
                          <td>
                            <?php echo $student->id_no ?>
                          </td>
                          <td>
                            <?php echo ucwords($student->name) ?>
                          </td>
                          <td class="">
                            <p>Correo: <?php echo $student->email ?></p>
                            <p># Móvil: <?php echo $student->contact ?></p>
                            <p>Dirección: <?php echo $student->address ?></p>
                          </td>
                          <td class="text-center">
                            <button class="btn btn-primary edit_student" type="button" data-id="<?php echo $student->id ?>"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-danger delete_student" type="button" data-id="<?php echo $student->id ?>"><i class="fa fa-trash-alt"></i></button>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>

                  </table>
                </div>
              </div>
            </div>
            <!-- Table Panel -->
          </div>
        </div>

      </div>
      <style>
        td {
          vertical-align: middle !important;
        }

        td p {
          margin: unset
        }

        img {
          max-width: 100px;
          max-height: 150px;
        }
      </style>

      <script>
        $(document).ready(function() {
          $('table').dataTable()
        })
        $('#new_student').click(function() {
          uni_modal("Nuevo Estudiante ", "manage_student.php", "mid-large")

        })
        $('.edit_student').click(function() {
          uni_modal("Gestionar Información de Estudiante", "manage_student.php?id=" + $(this).attr('data-id'), "mid-large")

        })
        $('.delete_student').click(function() {
          _conf("Deseas eliminar este estudiante? ", "delete_student", [$(this).attr('data-id')])
        })

        function delete_student($id) {
          start_load()
          $.ajax({
            url: 'ajax.php?action=delete_student',
            method: 'POST',
            data: {
              id: $id
            },
            success: function(resp) {
              if (resp == 1) {
                alert_toast("Datos eliminados exitósamente", 'success')
                setTimeout(function() {
                  location.reload()
                }, 1500)

              }
            }
          })
        }
      </script>
    <?php } else { ?>
      <h1>NO TIENE ACCESO A ESTA PAGINA</h1>
    <?php } ?>
<?php
  }
}
