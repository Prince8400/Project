
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
            <span>Lecture -> Add lecture</span>
            <span><a href="course.php">BACK</a></span>
        </div>
    </div>
    <div class="container white-form">
        <form action="submit/insert_lecture.php" method="POST">
            <table id="input-table">
                
                <tr>
                    <td>Add teacher </td>
                    <td>
                        <select name="teacherid" id="teacherid" class="input-box" required>
                            <option value="">select Teacher</option>
                            <?php
                            $sql='select id ,fullname from teacher order by fullname';
                            $cmd=$db->prepare($sql);
                            $cmd->execute();
                            $table=$cmd->fetchAll();
                            foreach($table as $row)
                            {
                                echo "<option value={$row['id']}>{$row['fullname']}</option>";
                            }


                            ?>
                          
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Add subject </td>
                    <td id="output">
                        <select name="subjectid" id="subjectid" class="input-box" required>
                            <option value="">select Subject</option>
                           
                          
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Add  batch </td>
                    <td>
                        <select name="batchid" id="batchid" class="input-box" required>
                            <option value="">select batch</option>
                            <?php
                            $sql='select id ,classtime from batch order by classtime';
                            $cmd=$db->prepare($sql);
                            $cmd->execute();
                            $table=$cmd->fetchAll();
                            foreach($table as $row)
                            {
                                echo "<option value={$row['id']}>{$row['classtime']}</option>";
                            }


                            ?>
                          
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>Add  Duration (in minites)</td>
                    <td>
                        <input type="number" name="duration" id="duration" class="input-box" required/>
                    </td>
                </tr>
                <tr>
                    <td>Add  Amount</td>
                    <td>
                        <input type="number" name="amount" id="amount" class="input-box" required/>
                    </td>
                </tr>
                <tr>
                    <td>Add lecture date</td>
                    <td>
                        <input type="date" name="lecturedate" id="lecturedate" class="input-box" required/>
                    </td>
                </tr>
               
                <tr>
                    <td colspan="2" align="center">
                        <button name="submit" type="submit" class="save">
                            <i class="fa fa-save"></i> Save 
                        </button>
                        <button type="reset" class="clear">
                            <i class="fa fa-trash"></i> clear all
                        </button>
                    </td>
                </tr>
                <tr>
                    <td colspan='2'>
                        <?php require_once("inc/message.php") ?>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#batchid").change(function(){
            let ajexurl="ajex/getsubject.php?batchid=" + $(this).val();
            $("#output").load(ajexurl);
        });
       
        
    });
</script>
<?php
require_once('inc/footer.php');
?>
