<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	require_once 'vendor/autoload.php';
	 
	use paragraph1\phpFCM\Client;
	use paragraph1\phpFCM\Message;
	use paragraph1\phpFCM\Recipient\Device;
	use paragraph1\phpFCM\Notification;
	
	require_once 'vendor/Twilio/autoload.php'; // Loads the library
	use Twilio\Rest\Client  as TwilioClient;

class Api extends CI_Controller  {


    function __construct(){

        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('api_model');
        $this->load->library('session');
        $this->load->library('apn'); 
        
        
        date_default_timezone_set('Europe/London');
            
    }

	function serverInfo() {
         
         phpinfo();
     }
    
    /**
     * Make json response to the client with result code message
     *
     * @param p_result_code : Result code
     * @param p_result_msg : Result message
     * @param p_result : Result json object
     */

     private function doRespond($p_result_code,  $p_result){

         $p_result['result_code'] = $p_result_code;

         $this->output->set_content_type('application/json')->set_output(json_encode($p_result));
     }

     /**
     * Make json response to the client with success.
     * (result_code = 0, result_msg = "success")
     *
     * @param p_result : Result json object
     */

     private function doRespondSuccess($result){

         $this->doRespond(0, $result);
     }
	 
	 private function doUrlDecode($p_text){

        $p_text = urldecode($p_text);
        $p_text = str_replace('&#40;', '(', $p_text);
        $p_text = str_replace('&#41;', ')', $p_text);
        $p_text = str_replace('%40', '@', $p_text);
        $p_text = str_replace('%20',' ', $p_text);
        $p_text = str_replace('ssllaasshh','/', $p_text);
        $p_text = trim($p_text); 

        return $p_text;
     }
	 
	 function sendCode($phonenumber) {
		 
		 $result = array();
		 
		 $phonenumber = $this->doUrlDecode($phonenumber);
		 
		 $code = $this->makeRandomCode();
		 $this->api_model->sendCode($phonenumber, $code);
		 
		 // send code via twilio
		 $sid = "";
		$token = "";
		$client = new TwilioClient($sid, $token);
		
		try {
            
			$client->messages->create($phonenumber,
			array(
				'from' => '',
				'body' => 'Your Enigma Messenger Verification code is : '.$code,
				
			)
			);
            
        } catch(Exception $e) {
            
            $this->doRespond(101, $result);
            return;
        }

		 $this->doRespondSuccess($result);
		 
	 }
	 
	 function register($phonenumber, $code, $device_type) {
		 
		 $phonenumber = $this->doUrlDecode($phonenumber);
		 
		 $result = array();
		 
		$this->db->where('phonenumber', $phonenumber);
		$count = $this->db->get('tb_code')->num_rows();
		
		if ($count == 0) {		// not exist
			$this->doRespond(101, $result);
			 return;
		}
		
		$this->db->where('phonenumber', $phonenumber);
		$existCode = $this->db->get('tb_code')->row()->code;
		if ($code != $existCode) {	// code wrong
			$this->doRespond(102, $result);
			 return;
		}
			
		 $returned = $this->api_model->register($phonenumber, $device_type);
		 
		 if ($returned == 0) {	// exist already			
			return $this->login($phonenumber, $device_type);
		 }
		 
		 $result['user_id'] = $returned;	
		 $this->doRespond(200, $result);
	 }
   
     function login($phonenumber, $device_type) {
		 
		 $result = array();
		 
		 $is_exist = $this->api_model->phoneExist($phonenumber);
		 
		 if ($is_exist == 0) {	// phone not exist
			 $this->doRespond(104, $result);
			 return;
		 }
		 
		 $this->db->where('phonenumber', $phonenumber);
		 
		 $row = $this->db->get('tb_user')->row();
		 
		 $this->api_model->setDevice($row->id, $device_type);
		 $this->api_model->setLoginStatus($row->id);
				
		$user_id = $row->id;			
		return $this->getContacts($user_id);
		 
	 }
	 
	 function getContacts($user_id) {
		 
		 $result = array();
		 
		 $is_exist = $this->api_model->userExist($user_id);
		 
		 if ($is_exist == 0) {	// user not exist
			 $this->doRespond(104, $result);
			 return;
		 }
		 
		$t_result = array();
			
		$this->db->where('user_id', $user_id); 
		$query = $this->db->get('tb_contacts');
         
         if ($query->num_rows() > 0) {
             
             foreach($query->result() as $contact) {
				 
				 $arr = array(
						'user_id' => $contact->contact_id,
						'phonenumber' => $contact->contact_phonenumber,
						'name' => $contact->contact_name
						);								  
                 array_push($t_result, $arr);
             }
         }         

		$result['user_id'] = $user_id;	
		$result['contact_infos'] = $t_result;				
		$this->doRespondSuccess($result);
	 }
	 
	 
	 function saveContacts() {
		 
		 $result = array();
         
        $user_id = $_POST['id'];
        $contacts = $_POST['contacts']; 
		$this->api_model->saveContacts($user_id, $contacts);
        
		return $this->getContacts($user_id);
		 
	 }
	 
	 function registerToken($user_id, $token) {
		 
		 $token = $this->doUrlDecode($token);
		 
		 $result = array();         
         $this->api_model->registerToken($user_id, $token);		 
		 $this->doRespondSuccess($result);
	 }
	 
	 function deleteToken($user_id) {
		 
		 $result = array();         
         $this->api_model->deleteToken($user_id);		 
		 $this->doRespondSuccess($result);
	 }
	 
	 function createRoom($user1, $user2) {
		
		$result = array();
        $this->api_model->createRoom($user1, $user2);
		$this->doRespondSuccess($result);
		
	}
	
	function loadRooms($user_id) {
		
		$result = array();
		$t_result = array();
		
		$this->db->where('user1', $user_id);
		$this->db->or_where('user2', $user_id);
		$query = $this->db->get('tb_rooms');
         
        foreach($query->result() as $room) {
					
			$user1 = $room->user1;
			$user2 = $room->user2;
			
			$target = $user1;
			
			if ($target == $user_id) {
				$target = $user2;
			}
				
			$phonenumber = $this->getPhonenumber($target);
			$last_message = $this->getLastMessage($user_id, $target);
			$unread = $this->getUnreadCount($room->name, $user_id);
			
			$arr = array(
				'id' => $room->id,
				'target_id' => $target,
				'phonenumber' => $phonenumber,
				'room_name' => $room->name,
				'last_message' => $last_message['message'],
				'last_time' => $last_message['time'],
				'unread' => $unread
				);								  
			
			array_push($t_result, $arr);
		}
		
		$result['room_infos'] = $t_result;
		$this->doRespondSuccess($result);
	}
	
	
	function getPhonenumber($user_id) {
		
		$user = $this->db->where('id', $user_id)->get('tb_user')->row();
		return $user->phonenumber;
	}
	
	/*
	function getLastMessage($roomName) {
		
		$result = array();
		
		$this->db->where('room_name', $roomName);
		$this->db->limit(1, 0);
		$this->db->order_by('created_at', 'DESC');
		$query = $this->db->get('tb_messages');
		
		if ($query->num_rows() > 0) {
			
			$result['message'] = $query->result()[0]->content;
			$result['time'] = $query->result()[0]->created_at;
		} else {
		
			$result['message'] = "";
			$result['time'] = "";
		
		}
		
		return $result;
	}
	*/
	
	function getLastMessage($myId, $targetId) {
		
		$roomname = "";	
		if ($myId < $targetId) {
			$roomname = $myId."_".$targetId;
		} else {
			$roomname = $targetId."_".$myId;
		}
		
		$deleted = "deleted1";
		
		if ($myId > $targetId) {
			$deleted = "deleted2";
		}
		
		$result = array();
		
		$this->db->where('room_name', $roomname);
		$this->db->where($deleted, 0);
		$this->db->limit(1, 0);		
		$this->db->order_by('created_at', 'DESC');
		$query = $this->db->get('tb_messages');
		
		if ($query->num_rows() > 0) {
			
			$result['message'] = $query->result()[0]->content;
			$result['time'] = $query->result()[0]->created_at;
		} else {
		
			$result['message'] = "";
			$result['time'] = "";
		
		}
		
		
		return $result;
	}
	
	
	function getUnreadCount($roomName, $userId) {
		
		$this->db->where('room_name', $roomName);
		$this->db->where('status', 0);
		$this->db->where('sender != ', $userId);
		$query = $this->db->get('tb_messages');
		
		return $query->num_rows();
	}
	
	function sendMessage() {
		
		$result = array();
		
		$sender = $_POST['sender'];
		$target = $_POST['target'];
		$message = $_POST['message'];
		$id = $this->api_model->sendMessage($sender, $target, $message);
		
		$this->sendFBPush($target, $message, $sender);	
		
		$result['id'] = $id;
		$this->doRespondSuccess($result);
	}
	
	function loadMessages($roomName, $page) {
		
		$result = array();
		$t_result = array();
		
		$COUNT = 30;
		
		$start =  $page * $COUNT;
		
		$this->db->where('room_name', $roomName); 
		$this->db->order_by('created_at', 'DESC');
		$this->db->limit($COUNT, $start);

		$query = $this->db->get('tb_messages');
         
         if ($query->num_rows() > 0) {
             
             foreach($query->result() as $message) {
				 
				 $arr = array(
						'sender' => $message->sender,
						'message' => $message->content,
						'created_at' =>$message->created_at,
						'status' =>$message->status
						);								  
                 array_push($t_result, $arr);
             }
         }         
				
		$result['messages'] = $t_result;				
		$this->doRespondSuccess($result);
	}
	
	function loadMessagesByCount($roomName, $skip) {
		
		$result = array();
		$t_result = array();
		
		$COUNT = 30;
		
		$start =  $skip;
		
		$this->db->where('room_name', $roomName); 
		$this->db->order_by('created_at', 'DESC');
		$this->db->limit($COUNT, $start);

		$query = $this->db->get('tb_messages');
         
         if ($query->num_rows() > 0) {
             
             foreach($query->result() as $message) {
				 
				 $arr = array(
						'id' => $message->id,
						'sender' => $message->sender,
						'message' => $message->content,
						'created_at' =>$message->created_at,
						'status' =>$message->status
						);								  
                 array_push($t_result, $arr);
             }
         }         
				
		$result['messages'] = $t_result;				
		$this->doRespondSuccess($result);
	}
	
	function loadMessagesByUser($roomName, $user_id, $skip) {
		
		$result = array();
		$t_result = array();
		
		$COUNT = 30;
		
		$start =  $skip;
		
		$ids = explode("_", $roomName);
		
		$target = $ids[1];
		if ($target == $user_id) {
			$target = $ids[0];
		}
			
		$delete = "deleted1";
		
		if ($user_id > $target) {
			$delete = "deleted2";
		}
		
		$this->db->where('room_name', $roomName); 
		$this->db->where($delete, 0); 
		$this->db->order_by('created_at', 'DESC');
		$this->db->limit($COUNT, $start);

		$query = $this->db->get('tb_messages');
         
         if ($query->num_rows() > 0) {
             
             foreach($query->result() as $message) {
				 
				 $arr = array(
						'id' => $message->id,
						'sender' => $message->sender,
						'message' => $message->content,
						'created_at' =>$message->created_at,
						'status' =>$message->status
						);								  
                 array_push($t_result, $arr);
             }
         }         
				
		$result['messages'] = $t_result;				
		$this->doRespondSuccess($result);
	}
	
	 
	 function readMessage($roomName, $user_id) {
		 
		 $result = array();
		$this->api_model->readMessage($roomName, $user_id);
		$this->doRespondSuccess($result);
	 }
	 
	 function deleteMessage($roomName, $msgId, $user_id) {
		$result = array();
		$this->api_model->deleteMessage($roomName, $msgId, $user_id);
		$this->doRespondSuccess($result);
	}
	 
	 function deleteAllMessages($roomName, $user_id) {
		 
		  $result = array();
		$this->api_model->deleteAllMessages($roomName, $user_id);
		$this->doRespondSuccess($result);
	 }
	 
	 function sendFBPush($user_id, $body, $sender) {	 

		$this->db->where('id', $user_id);

		$row = $this->db->get('tb_user')->row();		
		
		 if (count($row) == 0) {
			 return;
		 }
		
		$token = $row->device_token;
		
		$apiKey = 'AAAAK4gJmbc:APA91bH2RSHQ2z3jtJKBHe9_SPiywOEErak1_HGwFyBXx2TS5IJYzcj0xHPQ3T72cZJhmzCCigAAeNKd_9gByjhlgdIU1xOIZuCp7tx3kmjbd8y6d868-wjvLFYlsFmFhz4AqAIGFgLj';
		$client = new Client();
		$client->setApiKey($apiKey);
		$client->injectHttpClient(new \GuzzleHttp\Client());

		$note = new Notification('En1gma Messenger', 'New message received.');
		$note->setColor('#ffffff')
			->setBadge(1);

		$message = new Message();
		$message->addRecipient(new Device($token));
		$message->setNotification($note)->setData(array('sender' => $sender, 'body' => $body));	
		

		$response = $client->send($message);

		 
	 }
	 
	 
	 
	 public function makeRandomCode(){
		 
		 mt_srand();

         $random_code = '';

         $arr = array('1','2','3','4','5','6','7','8','9','0');

         for ($i = 0 ; $i < 6 ; $i++) {

             $index = mt_rand(0, 9);
             $random_code .= $arr[$index];
         }

         return $random_code;
     }
	 

	 
	 function php_info() {
		 
		 phpinfo();
	 }
	 

}

?>
