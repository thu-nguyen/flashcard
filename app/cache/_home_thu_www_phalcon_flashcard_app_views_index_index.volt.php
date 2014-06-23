<?php echo $this->getContent(); ?>

<table border="1" cellspacing = "0" cellpadding = "5" width="500">
    <tr>
        <th>Tables</th>
        <th>Rows</th>
    </tr>
    <?php foreach ($tables as $table) { ?>
        <tr>
            <td><?php echo $table['TABLE_NAME']; ?></td>
            <td><?php echo $table['TABLE_ROWS']; ?></td>
        </tr>
    <?php } ?>    
</table>

