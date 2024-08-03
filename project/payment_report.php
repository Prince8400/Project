
<?php
require_once('inc/verify_login.php');
require_once('inc/header-part.php');
require_once('inc/connection.php');
?>
</head>

<body>
    <?php require_once('inc/menu.php'); ?>
    <div class="heading">
        <div>  
            <span>Reports - Batch Wise</span>
            <span><a href="report.php">batch Report</a></span>
        </div>
    </div>
    <div class="container">
        <table align="center" class="data">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Batch Detail</th>
                    <th align='right'>UnPaid Amount</th>
                    <th align='right'>paid Amount</th>
                    <th align='right'>Total Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql="select title,classtime, (select sum(amount) from lecture l where  l.batchid=batchid and payoutid is null) as 'unpaid',ifnull((select sum(amount) from lecture l where  l.batchid=batchid and payoutid is not null),0) as 'paid' from course c, batch b where c.id=courseid";
                $cmd=$db->prepare($sql);
                $cmd->execute();
                $table=$cmd->fetchAll();
                $unpaidtotal=0;
                $paididtotal=0;
                foreach($table as $row){
                    extract($row);
                    $unpaidtotal+=$unpaid;
                    $paididtotal+=$paid;

                

                ?>
                <tr>
                    <td>1</td>
                    <td><?= $title ?></td>
                    <td align='right'><?= $unpaid ?></td>
                    <td align='right'><?= $paid ?></td>
                    <td align='right'><?= $unpaid+$paid ?></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th align='right'><?= $unpaidtotal ?></th>
                    <th align='right'><?= $paididtotal ?></th>
                    <th align='right'><?= $unpaidtotal+$paididtotal ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
<?php
require_once('inc/footer.php');
?>
