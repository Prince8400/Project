
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
            <span>Batch</span>
            <span><a href="add_batch.php">Add Batch</a></span>
        </div>
    </div>
    <div class="container">
    <?php require_once("inc/message.php"); ?>
        <table align="center" class="data">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Course id</th>
                    <th>Starting Date</th>
                    <th>Ending Date</th>
                    <th>Class time</th>
                    <th width='15%'>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                   $sql = "select b.*,  c.title  from batch b,course c where c.id=courseid and b.isdeleted=0 order by b.id desc";
                    $cmd =$db->prepare($sql);
                    $cmd->execute();
                    while($row =$cmd->fetch())
                    {

                    ?>      
                   <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php 
                           echo $row['title'];
                            ?></td>
                    <td><?php echo toDMY($row['startdate']);?></td>
                    <td><?php echo toDMY($row['enddate']);?></td>
                    <td><?php echo $row['classtime'];?></td>
                    <td>
                        <a title="delete_batch.php" class="delete"><i  class="fa fa-trash fa-2x"></i></a>
                        <a href=""><i class="fa fa-edit fa-2x"></i></a>
                       
                    </td>
                </tr>
               <?php
                    }
                    ?>
            </tbody>
        </table>
    </div>
</body>
<script src="dist/jquery-min.js"></script>
<script>
    $(document).ready(function(){
        $(".delete").click(function(){
            let choice = confirm("Are you want to do this?");
            if (choice===true){
                let id =$(this).parent().parent().find("td:first").html();
                let row=$(this).parent().parent();
                let table = 'batch';
                $.post('ajex/delete_row.php',{
                    rowid:id,
                    tablename:table

                },
                function(responce){
                    console.log(responce);
                    $(row).fadeOut(1000,function(){
                        $(row).remove();
                    })
                }
            ).fail(function(error){
                alert("error occured....");
            });
            }

        });
    });
</script>
<?php
require_once('inc/footer.php');
?>
