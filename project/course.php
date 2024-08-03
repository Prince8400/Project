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
            <span>Course</span>
            <span><a href="add_course.php">Add Course</a></span>
        </div>
    </div>
    <div class="container">
    <?php require_once('inc/message.php'); ?>

        <table align="center" class="data">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Fees</th>
                    <th>Duration</th>
                    <th>Detail</th>
                    <th width='15%'>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                        $sql = "select * from course where isdeleted=0 order by id ";
                        $cmd = $db->prepare($sql);
                        $cmd->execute();
                        $table=$cmd->fetchall();
                        foreach($table as $row)
                        {
                            extract($row);
                          //  print_r($row);
                ?>
                <tr>
                    <td><?= $id ?></td>
                    <td><?= $title ?></td>
                    <td><?= $fees ?></td>
                    <td><?= $duration?></td>
                    <td><?= $discription;?></td>
                    <td>
                        <a title="delete_course.php" class="delete"><i  class="fa fa-trash fa-2x"></i></a>
                        <a href="edit_course.php?id=<?= $id; ?>"><i class="fa fa-edit fa-2x"></i></a>
                       
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
            if(choice===true){
                let id = $(this).parent().parent().find("td:first").html();
                let row = $(this).parent().parent();
                let table ='course';
                $.post('ajex/delete_row.php',{
                    rowid:id,
                    tablename:table
                },
                function(response){
                    console.log(response);
                    $(row).fadeOut(1000,function(){
                        $(row).remove();
                    })
                }
            ).fail(function(error){
                alert ("error occured....");
            });
        }
        });

        });
    
</script>
<?php
require_once('inc/footer.php');
?>
