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
           <?php foreach ($users as $user) { ?>
               <form action= "/gestion/users/update" method="POST">
          <tr>
              <td><?= $user->getId(); ?><input type="hidden" name="id" value="<?= $user->getId(); ?>"></td>
              <td><?= $user->getFirstname(); ?><input type="hidden" name="firstname" value="<?= $user->getFirstname(); ?>"></td>
              <td><?= $user->getLastname(); ?><input type="hidden" name="lastname" value="<?= $user->getLastname(); ?>"></td>
              <td><?= $user->getDob(); ?><input type="hidden" name="dob" value="<?= $user->getDob(); ?>"></td>
              <td><?= $user->getEmail(); ?><input type="hidden" name="email" value="<?= $user->getEmail(); ?>"></td>
              <td><?= $user->getpassword(); ?><input type="hidden" name="password" value="<?= $user->getpassword(); ?>"></td>
              <td><?= $user->getRole(); ?></td>
              <td><a href="/gestion/users/<?= $user->getId(); ?>">Delete</a></td>
             <?php  if($user->getRole() == "admin") { ?>
                 <input type="hidden" name="role" value="user" />
              <td><button type="submit">User</button></td>
           <?php } else { ?>
           <input type="hidden" name="role" value="admin" />
                <td><button type="submit">Admin</button></td>
           <?php } ?>
           </form>
       </tr>
       <?php } ?>
      </tbody>
    </table>
