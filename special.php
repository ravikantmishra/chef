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
            <h2 class="header_div">Soups <span class="title_div">Menu Board</span></h2>
            <div class="menu_box">
				<table cellpadding="0" cellspacing="0" border="1" width="100%">
                	<thead>
                    	<tr>
                        	<th></th>
                            <th></th>
                            <th class="menu_box_price">Members</th>
                            <th></th>
                            <th class="menu_box_price">Guests</th>
                        </tr>
                        <tr>
                        	<td colspan="5">
                            	<div class="menu_box_line"></div>
                            </td>
                        </tr>
                        <?php
							$obj = new common();
							$data= $obj->getMenuItems('4',date('Y-m-d'));
							if(count($data)){
								foreach($data as $item){
									if(empty($item['dish_name'])) continue;
						?>
						<tr>
                        	<td class="menu_box_item"><?php echo isset($item['dish_name']) ? $item['dish_name'] : 'N/A'; ?></td>
                            <td class="menu_box_space"></td>
                            <td class="menu_box_price"><?php echo isset($item['member_price']) ? '$'.$item['member_price'] : 'N/A'; ?></td>
                            <td class="menu_box_space"></td>
                            <td class="menu_box_price"><?php echo isset($item['guest_price']) ? '$'.$item['guest_price'] : 'N/A'; ?></td>
                        </tr>
                        <?php }
							}else{ ?>
                            <tr><td colspan="5" class="menu_box_price">No records found.</td></tr>
                         <?php } ?>   
                    </thead>
                </table>
            </div>
        </div> 
    </body> 
</html>