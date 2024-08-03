
<?php
require_once('inc/header-part.php');
?>
</head>

<body>
    <?php require_once('inc/menu.php'); ?>
    <div class="heading">
        <div>
            <span>Batch -> Edit batch</span>
            <span><a href="batch.php">BACK</a></span>
        </div>
    </div>
    <div class="container white-form">
        <form action="">
            <table id="input-table">
                <tr>
                    <td width='33%'>Edit id</td>
                    <td>
                        <input type="number" name="title" id="title" class="input-box" 
                        required value="PSI" />
                    </td>
                </tr>
                <tr>
                    <td>Edit course id</td>
                    <td>
                        <input type="number" name="fees" id="fees" class="input-box" 
                        required value="25000" />
                    </td>
                </tr>
                <tr>
                    <td>Edit starting date</td>
                    <td>
                        <input type="date" name="startdate" id="startdate" class="input-box" required value="180" />
                    </td>
                </tr>
                <tr>
                    <td>Edit Ending date</td>
                    <td>
                        <input type="date" name="enddate" id="enddate" class="input-box" required value="180" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <button type="submit" class="save">
                            <i class="fa fa-save"></i> Save 
                        </button>
                        <button type="reset" class="clear">
                            <i class="fa fa-trash"></i> clear all
                        </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
<?php
require_once('inc/footer.php');
?>
