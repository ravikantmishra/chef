<?php
	include_once "../class/common.php";
	if(isset($_GET['action']) && $_GET['action'] == 'getinfo'){
		$data	= getinfo($_POST);
		echo $data;
		
	}else if(isset($_GET['action']) && $_GET['action'] == 'addinfo'){
		$data	= addinfo($_POST, $_GET['input_board']);
		$data	= json_decode($data);
		if($data->status == 1){
			echo json_encode(array('status'=>1, 'msg'=>'Saved successfully.'));
		}else{
			echo json_encode(array('status'=>0, 'msg'=>'Some error has occured.', 'error'=>$data->message));
		}
	}else{
			
	}
	
	function addinfo($val, $inputBoard){
		try{
			$obj	= new common();
			$loop = 7;
			if($inputBoard == 2 || $inputBoard == 4){
				$loop = 1;	
			}
			
			//delete previous records
			$obj->deleteRecordes($inputBoard, date('Y-m-d'));
			
			for($i=1; $i<=$loop; $i++){
				$arrData= array(
								'dish_name' => $val['dish_'.$i], 
								'input_board'=> empty($inputBoard) ? 0 : $inputBoard,
								'member_price'=> $val['member_'.$i],
								'guest_price'=> $val['guest_'.$i],
								'created_on'=> date('Y-m-d')
							);
				$id 	= $obj->createInsert('menu_items', $arrData);
			}
			return json_encode(array('status'=>1, 'message'=>$id));
		
		}catch(Exception $e){
			return json_encode(array('status'=>0, 'message'=>$e->getMessage()));
		}
	}
	
	function getinfo($data){
		$obj	= new common();
		$data 	= $obj->getMenuItems($data['input_board'], date('Y-m-d'));

		$var 	= "
				<tr>
					<td align='right'>1</td>
					<td><input type='text' class='input_first' value='".(isset($data[0]['dish_name']) ? $data[0]['dish_name'] : '')."' name='dish_1' id='dish_1' /></td>
					<td></td>
					<td><input type='text' class='input_two' value='".(isset($data[0]['member_price']) ? $data[0]['member_price'] : '')."' name='member_1' id='member_1' /></td>    
					<td></td>
					<td><input type='text' class='input_two' value='".(isset($data[0]['guest_price']) ? $data[0]['guest_price'] : '')."' name='guest_1' id='guest_1' /></td>
				</tr>
				<tr><td colspan='6'></td></tr>
				<tr class='non_special'>
					<td align='right'>2</td>
					<td><input type='text' class='input_first' value='".(isset($data[1]['dish_name']) ? $data[1]['dish_name'] : '')."' name='dish_2' id='dish_2' /></td>
					<td></td>
					<td><input type='text' class='input_two' value='".(isset($data[1]['member_price']) ? $data[1]['member_price'] : '')."' name='member_2' id='member_2' /></td>    
					<td></td>
					<td><input type='text' class='input_two' value='".(isset($data[1]['guest_price']) ? $data[1]['guest_price'] : '')."' name='guest_2' id='guest_2' /></td>
				</tr>
				<tr class='non_special'><td colspan='6'></td></tr>
				<tr class='non_special'>
					<td align='right'>1</td>
					<td><input type='text' class='input_first' value='".(isset($data[2]['dish_name']) ? $data[2]['dish_name'] : '')."' name='dish_3' id='dish_3' /></td>
					<td></td>
					<td><input type='text' class='input_two' value='".(isset($data[2]['member_price']) ? $data[2]['member_price'] : '')."' name='member_3' id='member_3' /></td>    
					<td></td>
					<td><input type='text' class='input_two' value='".(isset($data[2]['guest_price']) ? $data[2]['guest_price'] : '')."' name='guest_3' id='guest_3' /></td>
				</tr>
				<tr class='non_special'><td colspan='6'></td></tr>
				<tr class='non_special'>
					<td align='right'>5</td>
					<td><input type='text' class='input_first' value='".(isset($data[3]['dish_name']) ? $data[3]['dish_name'] : '')."' name='dish_4' id='dish_4' /></td>
					<td></td>
					<td><input type='text' class='input_two' value='".(isset($data[3]['member_price']) ? $data[3]['member_price'] : '')."' name='member_4' id='member_4' /></td>    
					<td></td>
					<td><input type='text' class='input_two' value='".(isset($data[3]['guest_price']) ? $data[3]['guest_price'] : '')."' name='guest_4' id='guest_4' /></td>
				</tr>
				<tr class='non_special'><td colspan='6'></td></tr>
				<tr class='non_special'>
					<td align='right'>6</td>
					<td><input type='text' class='input_first' value='".(isset($data[4]['dish_name']) ? $data[4]['dish_name'] : '')."' name='dish_5' id='dish_5' /></td>
					<td></td>
					<td><input type='text' class='input_two' value='".(isset($data[4]['member_price']) ? $data[4]['member_price'] : '')."' name='member_5' id='member_5' /></td>    
					<td></td>
					<td><input type='text' class='input_two' value='".(isset($data[4]['guest_price']) ? $data[4]['guest_price'] : '')."' name='guest_5' id='guest_5' /></td>
				</tr>
				<tr class='non_special'><td colspan='6'></td></tr>
				<tr class='non_special'>
					<td align='right'>6</td>
					<td><input type='text' class='input_first' value='".(isset($data[5]['dish_name']) ? $data[5]['dish_name'] : '')."' name='dish_6' id='dish_6' /></td>
					<td></td>
					<td><input type='text' class='input_two' value='".(isset($data[5]['member_price']) ? $data[5]['member_price'] : '')."' name='member_6' id='member_6' /></td>    
					<td></td>
					<td><input type='text' class='input_two' value='".(isset($data[5]['guest_price']) ? $data[5]['guest_price'] : '')."' name='guest_6' id='guest_6' /></td>
				</tr>
				<tr class='non_special'><td colspan='6'></td></tr>
				<tr class='non_special'>
					<td align='right'>7</td>
					<td><input type='text' class='input_first' value='".(isset($data[6]['dish_name']) ? $data[6]['dish_name'] : '')."' name='dish_7' id='dish_7' /></td>
					<td></td>
					<td><input type='text' class='input_two' value='".(isset($data[6]['member_price']) ? $data[6]['member_price'] : '')."' name='member_7' id='member_7' /></td>    
					<td></td>
					<td><input type='text' class='input_two' value='".(isset($data[6]['guest_price']) ? $data[6]['guest_price'] : '')."' name='guest_7' id='guest_7' /></td>
				</tr>
				<tr class='non_special'><td colspan='6'></td></tr>
				<tr>
					<td align='right'></td>
					<td></td>
					<td></td>
					<td align='right'><input type='reset' name='Cancel' value='Cancel' class='button' /></td>    
					<td></td>
					<td><input type='submit' name='save' value='Submit' class='button' id='save_data' /></td>
				</tr>
				";
				
				return $var;
	
	}
?>