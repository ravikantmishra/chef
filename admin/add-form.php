<?php
include_once "../class/common.php";
$obj=new common();
//$a=$obj->getMenuItems(1,'2016-05-06');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head> 
    <title></title>
    <link href="css/style.css" type="" rel="stylesheet" />
    <link href="css/waitMe.min.css" type="" rel="stylesheet" /> 
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" /> 
    <script type="text/javascript" src="js/jquery-min.js"></script>
    <script type="text/javascript" src="js/waitMe.min.js"></script>       
    <script type="text/javascript" src="js/script.js"></script> 
</head> 
    <body> 
        <div id="wrapper">
            <h2 class="header">Chef's Daily Specials Input Board</h2>
            <div class="message"><div id="message" ></div></div>
			<div class="choose_div">
            	<table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td class="choose_text">Select Input Board</td>
                    <td align="left">
                        <select name="input_board" class="choose_select" id="input_board">
                            <option value="1">Chef's Daily Special</option>
                            <option value="2">Member's Only Special</option>
                            <option value="3">Asian Food Special</option>
                            <option value="4">Soups Special</option>
                        </select>
                    </td>
                </tr>
                <tr><td colspan="6"></td></tr>
            	</table>
            </div>
           	 <form name='add_form' id='add_form' action='' method='post' onsubmit="return addData()" >
            <table cellspacing="1" width="100%">
                <thead>
                    <tr>
                        <th width="5%" class=""></th>
                        <th width="40%">Enter Specials Input Board</th>
                        <th width="5%"></th>
                        <th width="20%">Members $</th>    
                        <th width="5%"></th>
                        <th width="20%">Guets $</th>
                    </tr>
                </thead>
                 
                <tbody id="formbody">
                     
                </tbody>
            </table>
            </form>

        </div> 
    </body> 
</html>