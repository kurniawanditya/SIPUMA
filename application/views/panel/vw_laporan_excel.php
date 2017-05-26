<?php
 header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=$title.xls");
 header("Pragma: no-cache");
 header("Expires: 0");
 ?>
 
 <table border="1" width="100%">
 
      <thead>
 
           <tr>
 
                <th>Id</th>
                <th>User</th>
                <th>Description</th>
                <th>Time</th>
 
           </tr>
 
      </thead>
 
      <tbody>
 
           <?php $i=1; foreach($logs as $log) { ?>
           <tr>
                <td><?php echo $log->log_id;   ?></td>
                <td><?php echo $log->log_user; ?></td>
                <td><?php echo $log->log_desc; ?></td>
                <td><?php echo $log->log_time; ?></td>
           </tr>
 
           <?php $i++; } ?>
 
      </tbody>
 
 </table>