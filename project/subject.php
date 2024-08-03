
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
            <span>Subject</span>
            <span><a href="add_subject.php">Add Subject</a></span>
        </div>
    </div>
    <div class="container">
    <?php require_once("inc/message.php"); ?>
        <table align="center" class="data">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Courseid</th>
                    <th>Subject</th>
                    <th>Rate</th>
                    <th width='15%'>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql =" select s.*,c.title as 'coursetitle' from subject s,course c where courseid=c.id and s.isdeleted=0 order by s.id desc";
                    $cmd=$db->prepare($sql);
                    $cmd->execute();
                    $table = $cmd->fetchall();
                    foreach($table as $row )
                    {
                        extract($row);
                    ?>
                    
                <tr>
                    <td><?= $id; ?></td>
                    <td><?= $coursetitle; ?></td>
                    <td><?= $subject; ?></td>
                    <td><?= $rate; ?></td>
                    <td>
                        <a title="delete_subject.php" class="delete"><i  class="fa fa-trash fa-2x"></i></a>
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
            let choice = confirm("Are you want to do this");
            if(choice===true){
                let id =$(this).parent().parent().find("td:first").html();
                let row =$(this).parent().parent();
                let table='subject';
               $.post("ajex/delete_row.php",{
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
                    alert ("error occured.....")
               });
               }
            
        });
    });
</script>
<?php
require_once('inc/footer.php');
?>
