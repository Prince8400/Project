
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
            <span>Reports - Batch Wise</span>
            <span><a href="payment_report.php">Payment Report</a></span>
        </div>
    </div>
    <div class="container">
        <form action="report.php" method="post">
        <table border="1" align=center cellpadding='10' width='90%'>
            <tr>
                <td>
                    <select name="batchid" id="batchid" class="input-box">
                        <option value="">Select batch</option>
                        <?php
                          var_dump($_POST);
                        $sql="select id,classtime from batch order by id desc";
                        $cmd=$db->prepare($sql);
                        $cmd->execute();
                        $table =$cmd->fetchall();
                        foreach($table as $row)
                        {
                            echo "<option value={$row['id']}>{$row['classtime']}</option>";
                        }

                        ?>
                    </select>
                </td>
                <td>
                    <label for="startdate">Start date</label><br>
                    <input type="date" name="startdate" id="startdate" required />
                </td>
                <td>
                    <label for="enddate">End date</label><br>
                    <input type="date" name="enddate" id="enddate" required />
                </td>
                <td width='25%'>
                    <button type="submit" class="save" name="submit">
                        <i class="fa-solid fa-magnifying-glass"></i> Save
                    </button>
                    <button type="reset" class="clear">
                        <i class="fa fa-trash"></i> clear all
                    </button>
                </td>
            </tr>
        </table>
        </form>
        <br>
        <table align="center" class="data">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Subject</th>
                    <th>Teacher</th>
                    <th>Lecture date</th>
                    <th>Duration</th>
                    <th>Amount</th>
                    <th>Is Paid</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($_POST['submit'])==true){
                        extract($_POST);
                        $sql="select lecturedate,amount,duration,payoutid,t.fullname,s.subject from lecture l,subject s,teacher t where batchid=? and (lecturedate>=? and lecturedate<=?) and subjectid=s.id and teacherid=t.id";
                        $cmd=$db->prepare($sql);
                        $cmd->bindparam(1,$batchid,PDO::PARAM_INT);
                        $cmd->bindparam(2,$startdate,PDO::PARAM_STR);
                        $cmd->bindparam(3,$enddate,PDO::PARAM_STR);
                        $cmd->execute();
                        $table=$cmd->fetchall();
                        $params=[$batchid,$startdate,$enddate];
                        foreach($table as $row){
                            extract($row);
                        ?>
                              <tr>
                                      <td><?= $batchid;?></td>
                                      <td><?= $subject;?></td>
                                      <td><?= $fullname;?></td>
                                       <td><?= toDMY($lecturedate);?></td>
                                       <td><?= $duration;?></td>
                                       <td><?= $amount;?></td>
                                       <td><?php  echo"no"; ?></td>
                            </tr>
                            <?php
                        }
                        }
                            ?>
                    </tbody>
        </table>
    </div>
</body>
<?php
require_once('inc/footer.php');
?>
