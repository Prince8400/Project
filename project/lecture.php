
<?php
require_once('inc/verify_login.php');
require_once('inc/header-part.php');
require_once('inc/connection.php');
require_once('inc/datetime_functions.php');
?>
</head>

<body>
    <?php require_once('inc/menu.php'); ?>
    <div class="heading">
        <div>
            <span>Lecture</span>
            <span><a href="add_lecture.php">Add Lecture</a></span>
        </div>
    </div>
    <div class="container">
    <?php require_once("inc/message.php"); ?>
        <table align="center" class="data">
            <thead>
                <tr>
                    <th width='3%'>Action</th>
                    <th>Id</th>
                    <th>course</th>
                    <th>Batch</th>
                    <th>Subject</th>
                    <th>Teacher</th>
                    <th>Duration</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>is Paid</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql="select l.id as id, l.duration as duration,amount,lecturedate,payoutid ,t.fullname,c.title as coursetitle, s.subject as subjecttitle,classtime from lecture l,course c, subject s, teacher t,batch b where l.batchid=b.id and l.teacherid=t.id and l.subjectid=s.id and b.courseid=c.id order by l.id desc";
                $cmd=$db->prepare($sql);
                $cmd->execute();
                $table = $cmd->fetchall();
                foreach($table as $row)
                {
                        extract($row);
                    ?>
                


                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td><?= $id; ?></td>
                    <td><?= $coursetitle; ?></td>
                    <td><?= $classtime; ?></td>
                    <td><?= $subjecttitle; ?></td>
                    <td><?= $fullname; ?></td>
                    <td><?= $duration; ?></td>
                    <td><?= $amount; ?></td>
                    <td><?= toDMY($row['lecturedate']); ?></td>
                    <td><?php
                    if($payoutid==null)
                        echo "no";
                    else
                        echo $payoutid
                      ?>
                      </td>
                </tr>
                <tr>
             
                </tr>
                <?php
                }
                ?>
            </tbody>
           
        </table>
    </div>
</body>
<?php
require_once('inc/footer.php');
?>

