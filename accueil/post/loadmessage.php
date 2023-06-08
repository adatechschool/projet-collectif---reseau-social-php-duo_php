<?php
include "../../connectdatabase.php";
session_start();
$sql=("SELECT * from post INNER JOIN users WHERE post.user_id = users.id");
$res=$conn->query($sql);
while($row = $res->fetch(PDO::FETCH_ASSOC)) : ?>
    <tr>
      <td><?php echo $row['prenom'].":" ?></td>
      <td><?php echo $row['content']; ?></td>
    </tr>
    </div>
<?php endwhile; ?>