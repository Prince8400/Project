
<?php
require_once('inc/header-part.php');
require_once('inc/connection.php');

?>
</head>

<body>
    <?php require_once('inc/menu.php'); 
    extract($_REQUEST);
    var_dump($_REQUEST);
    $sql="select * from course where id =?";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(1, $id);
    $cmd->execute();
    $row = $cmd->fetch();
    extract($row);
print_r($row);
    ?>

    <div class="heading">
        <div>
            <span>Course -> Edit Course</span>
            <span><a href="course.php">BACK</a></span>
        </div>
    </div>
    <div class="container white-form">
        <form action="">
            <table id="input-table">
                <tr>
                    <td width='33%'>Edit Title</td>
                    <td>
                        <input type="text" name="title" id="title" class="input-box" 
                        required value="<?= $title; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Edit Fees</td>
                    <td>
                        <input type="number" name="fees" id="fees" class="input-box" 
                        required value="<?= $fees; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Edit Duration (in days)</td>
                    <td>
                        <input type="number" name="duration" id="duration" class="input-box" required value="<?= $duration; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Edit description</td>
                    <td>
                        <textarea class="input-box" name="description" id="description" value="<?= $description; ?>">
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <button type="submit" class="save">
                            <i class="fa fa-save"></i> Save changes
                        </button>
                        <button type="reset" class="clear">
                            <i class="fa fa-trash"></i> clear all
                        </button>
                    </td>
                </tr>
            </table>
            <input type="hidden" value="<?= $id ?>" >

        </form>
    </div>
</body>
<?php
require_once('inc/footer.php');
?>
