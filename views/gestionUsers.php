<?php
$PDO = new SQLitePDO();
$sql = 'SELECT * FROM USERS';
$stmt = $PDO->bdd()->prepare($sql);
$stmt->execute();
$users_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();
?>

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
              <td><?php echo $user['firstname'] ?></td>
              <td><?php echo $user['lastname'] ?></td>
              <td><?php echo $user['dob'] ?></td>
              <td><?php echo $user['email'] ?></td>
              <td><?php echo $user['password'] ?></td>
              <td><?php echo $user['role'] ?></td>
              <td><a href="/gestion/users/<?php echo $user['id'] ?>">Delete</a></td>
             <?php  if($user['role'] == "admin") { ?>
              <td><a href="/gestion/users/update">User</a></td>
           <?php } else { ?>
                <td><a href="/gestion/users/update">Admin</a></td>
           <?php } ?>
       </tr>
       <?php } ?>
      </tbody>
    </table>
