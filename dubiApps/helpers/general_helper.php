<?php

function menuLink($link, $link1, $selectedLink){
	
	if($link == $selectedLink){
		return  'class="active"';	
	}
	
	if($selectedLink == 'home' && $link == ''){
		return 'class="active"';
	}
	return '';
}

function isSuperAdmin(){
	$CI = & get_instance();
	if($CI->session->userdata('agentType') == 0 && $CI->session->userdata('agentId') == 1 && $CI->session->userdata('userName')){
		return true;
	}
	return false;
}

function setMessage($MessageID, $Message){
	$CI = & get_instance();
	$sessData = array($MessageID => $Message);
	$CI->session->set_userdata($sessData);
}

function getMessage($MessageID){
	$CI = & get_instance();
	$messageData = '';
	if((bool)($CI->session->userdata($MessageID)) == TRUE){
		$messageData = $CI->session->userdata($MessageID);
		$CI->session->unset_userdata($MessageID);
	}
	return $messageData;
}

function getCurrentDate(){
	date_default_timezone_set('Asia/Dubai');
	return date('Y-m-d H:i:s');
}

function getCurrentTime(){
	date_default_timezone_set('Asia/Karachi');
	return date('h:i A', time());
}


function displayDate($date){
	$count = 0;
	$date_ary = explode(' ', $date);
	
	$tok = strtok($date_ary[0], "-");	
	$year = $tok;
	while ($tok !== false) {
		$count++;	
		$tok = strtok("-");
		if($count == 1){
			$month = $tok;	
		}
		else{
			$day = $tok;
			break;	
		}
	}
	$month_code = $month;
	switch($month_code){
		case '01':
			$month = 'Janurary';
		break;		
		case '02':
			$month = 'Feburary';
		break;
		case '03':
			$month = 'March';
		break;
		case '04':
			$month = 'April';
		break;
		case '05':
			$month = 'May';
		break;
		case '06':
			$month = 'June';
		break;		
		case '07':
			$month = 'July';
		break;		
		case '08':
			$month = 'August';
		break;		
		case '09':
			$month = 'September';
		break;		
		case '10':
			$month = 'October';
		break;		
		case '11':
			$month = 'November';
		break;		
		case '12':
			$month = 'December';
		break;	
	}	
	return $day.', '.$month.' '.$year.'  &nbsp; '.date('g:i a', strtotime($date_ary[1])); ;	
}

function isNumber($Value){	
	if(preg_match('/^\d+$/',$Value)) {
	  return true;
	}
	return false;
}

function paginationList(){	
	$CI = & get_instance();	
	$perPage = $CI->session->userdata('recordsPerPage');
	$option1 = '';
	$option2 = '';
	$option3 = '';
	$option4 = '';
	$option5 = '';
	switch($perPage){
		case 20:
			$option1 = 'selected';
		break;
		case 50:
			$option2 = 'selected';
		break;
		case 100:
			$option3 = 'selected';
		break;
		case 200:
			$option4 = 'selected';
		break;
		case 500:
			$option5 = 'selected';
		break;
	}	
	return '
			<select name="records_per_page" id="records_per_page" style="margin:6px 4px 0 0; border: 1px solid #CCCCCC; width: 57px;" onchange="changeRecordsPerPage();">
				<option value="20" '.$option1.'>20</option>
				<option value="50" '.$option2.'>50</option>
				<option value="100" '.$option3.'>100</option>
				<option value="200" '.$option4.'>200</option>
				<option value="500" '.$option5.'>500</option>
			</select>
			<input type="hidden" id="base___URL"  value="'.base_url().'"/>
			';
}

function Email_Template($mailBody){	
	$CI = & get_instance();
	$CI->db->select('projectNameAtBackend');
	$CI->db->from('tbl_settings');	
	$resultSet = $CI->db->get();
	if ($resultSet->num_rows > 0) {
		$project_name = $resultSet->row();
		$project_name = $project_name->projectNameAtBackend;
	} else {
		$project_name = 'Untitled Project';
	}
	$resultSet->free_result();		
	$emailHeader = '<div style="background:#F1F2F6; width:1000px; height: auto; padding: 10px; color:#374953; font-family: arial,sans-serif;">
						<a href="'.base_url().'" style="text-decoration:none; font-size:28px; color:#ccc; border-radius: 10px; background:#368EE0; padding: 10px;"><em>'.$project_name.'</em></a>
					</div>';
	$emailFooter = '<div style="padding:10px; background:#F1F2F6; width:1000px;  color:#374953; font-family: arial,sans-serif;">
						<hr color="#CCCCCC">
						<div align="right"><a href="'.base_url().'" style="text-decoration:none; font-size:14px; color:#ccc; border-radius: 8px; background:#368EE0; padding: 6px;"><em>'.$project_name.'</em></a></div>
					</div>';	
	return $emailHeader.'<div style="padding:10px; background:#F1F2F6;  width:1000px;  color:#374953; font-family: arial,sans-serif;">'.$mailBody.'</div>'.$emailFooter;
}


function shortDescription($string, $numberOfWords, $readMoreLink){
	$stringtArray = preg_split('//', $string, -1, PREG_SPLIT_NO_EMPTY);
	$arraySize  = sizeof($stringtArray);	
	$newString = '';	
	if($arraySize > $numberOfWords){		
		for($i=0; $i<$numberOfWords; $i++){
			$newString.= $stringtArray[$i];	
		}		
		return $newString.$readMoreLink;
	}	
	return $string;		
}

function initializeImageSettings($imgae_settings){
	$CI = & get_instance();
	$imagePath = '../media/';	
	$config['upload_path'] = realpath(APPPATH . $imagePath);
	$config['allowed_types'] = $imgae_settings->allowed_image_extensions;
	$config['max_size']	=($imgae_settings->allowed_image_max_size*1024);
	$config['max_width']  = 0;
	$config['max_height']  = 0;
	$config['encrypt_name'] = 0;
	$CI->upload->initialize($config);	
}

function initializeFileSettings(){	
	$CI = & get_instance();
	$imagePath = '../btPublic/bt-uploads/';	
	$config['upload_path'] = realpath(APPPATH . $imagePath);
	$config['allowed_types'] = 0;
	$config['max_size']	= 0;	
	$config['encrypt_name'] = 0;
	$CI->upload->initialize($config);	
}


function resize_image($image_name, $new_directory, $newWidth, $newHeight){	
	$CI = & get_instance();
	$imagePath = '../media/';	
	$config_img = array();
	$config_img['image_library'] = 'gd2';
	$config_img['source_image'] = realpath(APPPATH . $imagePath . $image_name);	
	if($new_directory != ''){
	   $config_img['new_image'] = realpath(APPPATH . $imagePath.$new_directory.'/');
	}	
	$config_img['maintain_ratio'] = TRUE;
	$config_img['width'] = $newWidth;
	if($newHeight > 0){
		$config_img['height'] = $newHeight;
	}	
	$config['create_thumb'] = TRUE;
	$config['maintain_ratio'] = TRUE;	
	$CI->image_lib->initialize($config_img);	
	if ( ! $CI->image_lib->resize()){
	  return false;
	}	
	return true;
}

function resize_image_main($image_name, $newWidth, $newHeight){	
	$CI = & get_instance();
	$imagePath = '../btPublic/bt-uploads/';	
	$config_img = array();
	$config_img['image_library'] = 'gd2';
	$config_img['source_image'] = realpath(APPPATH . $imagePath . $image_name);	
	$config_img['new_image'] = realpath(APPPATH . $imagePath.'/');	
	$config_img['maintain_ratio'] = TRUE;
	$config_img['width'] = $newWidth;
	if($newHeight > 0){
		$config_img['height'] = $newHeight;
	}	
	$config['create_thumb'] = TRUE;
	$config['maintain_ratio'] = TRUE;	
	$CI->image_lib->initialize($config_img);	
	if ( ! $CI->image_lib->resize()){
	  return false;
	}	
	return true;
}


function removeImage($imageName){	
	$imagePath = '../media/';	
	unlink(realpath(APPPATH.$imagePath.'/'.$imageName));
	unlink(realpath(APPPATH.$imagePath.'medium'.'/'.$imageName));
	unlink(realpath(APPPATH.$imagePath.'thumbs'.'/'.$imageName));
}


function message($text = 'Add / Update Successfull.', $type = 'success'){
	$return_msg = '';
	switch($type){
		case 'error':
			$return_msg = '<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>Error!</strong> '.$text.'
							</div>';
		break;
		
		case 'success':
			$return_msg = '<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>Success!</strong> '.$text.'
							</div>';
		break;
		
		case 'info':
			$return_msg = '<div class="alert alert-info">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>Message!</strong> '.$text.'
							</div>';
		break;
		
		case 'warning':
			$return_msg = '<div class="alert">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>Warning!</strong> '.$text.'
							</div>	';
		break;	
	}
	return $return_msg;
																														
}

function filter_value($field_name, $empty_title = ''){
	$CI = & get_instance();
	if($CI->input->post($field_name)){
		return 	$CI->input->post($field_name);
	}
	return $empty_title;
}
function full_url(){
	$s = &$_SERVER;
	$ssl = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on') ? true:false;
	$sp = strtolower($s['SERVER_PROTOCOL']);
	$protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
	$port = $s['SERVER_PORT'];
	$port = ((!$ssl && $port=='80') || ($ssl && $port=='443')) ? '' : ':'.$port;
	$host = isset($s['HTTP_X_FORWARDED_HOST']) ? $s['HTTP_X_FORWARDED_HOST'] : isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : $s['SERVER_NAME'];
	return $protocol . '://' . $host . $port . $s['REQUEST_URI'];
}
?>