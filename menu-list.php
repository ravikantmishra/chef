<?php 
include_once "class/common.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head> 
    <title></title>
    <link href="css/style.css" type="" rel="stylesheet" /> 
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" /> 
</head> 
    <body> 
        <div id="wrapper">
            <h2 class="members_div">Asian Food</h2>
            <div class="title_div">Specials</div>
            <?php
				$obj = new common();
				$data= $obj->getMenuItems('3',date('Y-m-d'));

			?>
            <div class="display_box">
                <div class="left display_box1"><?php echo isset($data[0]['dish_name']) ? $data[0]['dish_name'] : 'N/A'; ?></div>
                <div class="left display_box2"></div>
                <div class="left display_box3"><span class="member_text">Members</span> <br /> <span class="member_price"><?php echo isset($data[0]['member_price']) ? '$'.$data[0]['member_price'] : 'N/A'; ?></span></div>
            </div>
        </div> 
    </body> 
</html>