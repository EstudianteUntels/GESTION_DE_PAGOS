<?php
class UserView
{
  public function show($users = [])
  {
?>
    <?php

    ?>
    <?php
    if ($_SESSION['login_type'] == 1) { ?>

      <div class="container-fluid">

        <div class="row">
          <div class="col-lg-12">

          </div>
        </div>
        <br>
        <div class="col-lg-12">
          <div class="card ">
            <div class="card-header"><b>Lista de Usuarios</b>
            </div>

            <div class="card-body">
              <table class="table-striped table-bordered">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Correo</th>
                    <th class="text-center">Tipo</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($users as $user) :
                  ?>
                    <tr>
                      <td class="text-center">
                        <?php echo $i++ ?>
                      </td>
                      <td>
                        <?php echo ucwords($user->name) ?>
                      </td>

                      <td>
                        <?php echo $user->username ?>
                      </td>
                      <td>
                        <?php echo $user->type ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>

              </table>
            </div>
          </div>
        </div>

      </div>

      <script>
        $('table').dataTable();
        $('#new_user').click(function() {
          uni_modal('Nuevo Usuario', 'manage_user.php')
        })
        $('.edit_user').click(function() {
          uni_modal('Editar Usuario', 'manage_user.php?id=' + $(this).attr('data-id'))
        })
        $('.delete_user').click(function() {
          _conf("¿Deseas eliminar a esta usuario?", "delete_user", [$(this).attr('data-id')])
        })

        function delete_user($id) {
          start_load()
          $.ajax({
            url: 'ajax.php?action=delete_user',
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
