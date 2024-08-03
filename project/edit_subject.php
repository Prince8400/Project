
<?php
require_once('inc/header-part.php');
?>
</head>

<body>
    <?php require_once('inc/menu.php'); ?>
    <div class="heading">
        <div>
            <span>Subject -> Edit Subject</span>
            <span><a href="subject.php">BACK</a></span>
        </div>
    </div>
    <div class="container white-form">
        <form action="">
            <table id="input-table">
                <tr>
                    <td width='33%'>Edit id</td>
                    <td>
                        <input type="number" name="id" id="id" class="input-box" 
                        required value="PSI" />
                    </td>
                </tr>
                <tr>
                    <td>Edit course id</td>
                    <td>
                        <input type="number" name="id" id="id" class="input-box" 
                        required/>
                    </td>
                </tr>
                <tr>
                    <td>Edit Subject</td>
                    <td>
                        <input type="text" name="subject" id="subject" class="input-box" required />
                    </td>
                </tr>
                <tr>
                    <td>Edit Rate</td>
                    <td>
                        <input type="number" name="rate" id="rate" class="input-box" require/>
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
