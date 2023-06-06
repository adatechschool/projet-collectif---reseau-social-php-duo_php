<?php 
include "../../connectdatabase.php";
session_start();
$sql=("SELECT content,user_id from post");
$res=$conn->query($sql);
while($row = $res->fetch(PDO::FETCH_ASSOC)) : ?>
    <tr>
      <td><?php echo htmlspecialchars($row['user_id']); ?></td>
      <td><?php echo htmlspecialchars($row['content']); ?></td>
    </tr>
    </div>
    <?php endwhile; ?> 