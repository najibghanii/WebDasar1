<?php
include '../user.php';
include '../database.php';

$db = new Database();
$conn = $db->connect();
$user = new User($conn);

$result = $user->getAllUsers();
$daftar_users = [];

if ($result && $result->num_rows > 0) {
    $daftar_users = $result->fetch_all(MYSQLI_ASSOC);
}
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<h1>Daftar User</h1>
<hr />
<a href="index.php?halaman=tambah_user_form.php" class="btn btn-primary mb-3">Tambah User</a>
          <div class="table-responsive small">
            <table class="table table-striped table-sm"> 
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">username</th>
                  <th scope="col">Email</th>
                  <th scope="col">Asal</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              foreach ($daftar_users as $users) {
                ?>
                <tr> 
                  <td><?= $users['id'] ?></td>
                  <td><?= $users['username'] ?></td>
                  <td><?= $users['email'] ?></td>
                  <td><?= $users['asal'] ?></td>
                  <td>
                   <a href="delete_user.php?id=<?= $users['id'] ?>"> delete</a> 
                   <a href="index.php?halaman=edit_user_form.php&id=<?php echo $users['id'] ?>"> | edit</a>
                  </td>
              </tr>
                 <?php
                 } 
                 ?>
              </tbody>
            </table>
          </div>
 </main>