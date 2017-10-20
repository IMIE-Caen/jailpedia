<?php
$PDO = new SQLitePDO();
$sql = 'SELECT * FROM USERS WHERE id != ?';
$stmt = $PDO->bdd()->prepare($sql);
$stmt->execute(array($_SESSION['userConnect']->getId()));
$users_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();
?>
<form action= "/gestion/users/update/" method="POST">

<table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>firstname</th>
          <th>lastname</th>
          <th>dob</th>
          <th>email</th>
          <th>password</th>
          <th>role</th>
          <th></th>
          <th>Change to</th>
        </tr>
      </thead>
      <tbody>
           <?php foreach ($users_list as $user) { ?>
          <tr>
              <td><?php echo $user['id'] ?></td>
              <td><?php echo $user['firstname'] ?><input type="hidden" name="firstname" value="<?php echo $user['firstname'] ?>"></td>
              <td><?php echo $user['lastname'] ?><input type="hidden" name="lastname" value="<?php echo $user['lastname'] ?>"></td>
              <td><?php echo $user['dob'] ?><input type="hidden" name="dob" value="<?php echo $user['dob'] ?>"></td>
              <td><?php echo $user['email'] ?><input type="hidden" name="email" value="<?php echo $user['email'] ?>"></td>
              <td><?php echo $user['password'] ?><input type="hidden" name="password" value="<?php echo $user['password'] ?>"></td>
              <td><?php echo $user['role'] ?></td>
              <td><a href="/gestion/users/<?php echo $user['id'] ?>">Delete</a></td>
             <?php  if($user['role'] == "admin") { ?>
                 <input type="hidden" name="role" value="user" />
              <td><button type="submit" name="id" value="<?php echo $user['id'] ?>">User</button></td>
           <?php } else { ?>
           <input type="hidden" name="role" value="admin" />
                <td><button type="submit" name="id" value="<?php echo $user['id'] ?>">Admin</button></td>
           <?php } ?>
       </tr>
       <?php } ?>
      </tbody>
    </table>
</form>
