<?php

class Api_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }


    function phoneExist($phonenumber) {

        $this->db->where('phonenumber', $phonenumber);
        return $this->db->get('tb_user')->num_rows();
    }
	
	function userExist($user_id) {

        $this->db->where('id', $user_id);
        return $this->db->get('tb_user')->num_rows();
    }
	
	function contactExist($user_id, $contact_id) {
		
		$this->db->where('user_id', $user_id);
		$this->db->where('contact_id', $contact_id);
        return $this->db->get('tb_contacts')->num_rows();
	}
	
	function sendCode($phonenumber, $code) {
		
		$this->db->where('phonenumber', $phonenumber);
		$this->db->delete('tb_code');
		
        $this->db->set('phonenumber', $phonenumber);
		$this->db->set('code', $code);     
        $this->db->insert('tb_code');
        return $this->db->insert_id();
	}
    
    function register($phonenumber, $device_type) {

		if ($this->phoneExist($phonenumber) > 0) {
			return 0;
		} 

        $this->db->set('phonenumber', $phonenumber);  
		$this->db->set('device_type', $device_type);  		
		$this->db->set('last_login', 'NOW()', false);
        $this->db->set('reg_time', 'NOW()', false);
        $this->db->insert('tb_user');
        return $this->db->insert_id();
    }
	
	function saveContacts($user_id, $contacts) {
		
		$contactsArr = json_decode($contacts, true);
		 
		for ($i = 0 ; $i < count($contactsArr) ; $i++) {
		
			$contact = $contactsArr[$i];
			$phonenumber = $contact['phoneNumber'];
			$name = $contact['name'];
			
			$this->db->like('phonenumber', $phonenumber, 'before');
			$count = $this->db->get('tb_user')->num_rows();
			
			if ($count > 0) {
				
				$this->db->like('phonenumber', $phonenumber, 'before');
				$row = $this->db->get('tb_user')->row();
				
				if (!$this->contactExist($user_id, $row->id)) {	
				
					$this->db->set('user_id', $user_id);
					$this->db->set('contact_id', $row->id);
					$this->db->set('contact_phonenumber', $row->phonenumber);
					$this->db->set('contact_name', $name);
					$this->db->insert('tb_contacts');	
				} else {
					$this->db->where('user_id', $user_id);
					$this->db->where('contact_id', $row->id);
					$this->db->set('contact_phonenumber', $row->phonenumber);
					$this->db->set('contact_name', $name);
					$this->db->update('tb_contacts');	
				}
			}
	
		}
		
		
	}
    
	
	function setDevice($user_id, $device_type) {
        
        $this->db->where('id', $user_id);
        $this->db->set('device_type', $device_type);
        $this->db->update('tb_user');        
    }
	
	
	function setLoginStatus($id) {
        
        $this->db->where('id', $id);
        $this->db->set('last_login', 'NOW()', false);
        $this->db->update('tb_user');
    }
	
	
	function registerToken($user_id, $token) {
		
		$this->db->where('id', $user_id);
		$this->db->set('device_token', $token);
		$this->db->update('tb_user');			
				
	}
	
	function deleteToken($user_id) {
		
		$this->db->where('id', $user_id);
		$this->db->set('device_token', '');
		$this->db->update('tb_user');			
				
	}
	
	function createRoom($user1, $user2) {
		
		$roomname = "";	
		if ($user1 < $user2) {
			$roomname = $user1."_".$user2;
		} else {
			$roomname = $user2."_".$user1;
		}
			
		$this->db->where('name', $roomname); 
		$query = $this->db->get('tb_rooms');
         
         if ($query->num_rows() == 0) {
             
            $this->db->set('name', $roomname);
			$this->db->set('user1', $user1);
			$this->db->set('user2', $user2);
			$this->db->set('created_at', 'NOW()', false);
			$this->db->insert('tb_rooms');
         }      
		
	}
	
	function sendMessage($sender, $target, $message) {
		
		$roomname = "";
		if ($sender < $target) {
			$roomname = $sender."_".$target;
		} else {
			$roomname = $target."_".$sender;
		}
		
		$this->db->set('room_name', $roomname);
		$this->db->set('sender', $sender);
		$this->db->set('content', $message);
		$this->db->set('created_at', 'NOW()', false);
		$this->db->insert('tb_messages');
		return $this->db->insert_id();
		
	}
	
	function readMessage($roomname, $user_id) {

		$this->db->where('room_name', $roomname); 
		$this->db->where('sender != ', $user_id); 
		$this->db->where('status', 0); 
		$this->db->set('status', 1);
		$this->db->update('tb_messages');
	}
	
	function deleteAllMessages($roomname, $user_id) {

		$ids = explode("_", $roomname);
		
		$target = $ids[1];
		if ($target == $user_id) {
			$target = $ids[0];
		}
			
		$delete = "deleted1";
		
		if ($user_id > $target) {
			$delete = "deleted2";
		}
		
		$this->db->where('room_name', $roomname);
		$this->db->set($delete, 1);
		$this->db->update('tb_messages');
	}
	
	function deleteMessage($roomname, $msgId, $user_id) {
		
		$ids = explode("_", $roomname);
		
		$target = $ids[1];
		if ($target == $user_id) {
			$target = $ids[0];
		}
			
		$delete = "deleted1";
		
		if ($user_id > $target) {
			$delete = "deleted2";
		}
		
		$this->db->where('id', $msgId);
		$this->db->set($delete, 1);
		$this->db->update('tb_messages');
	}
	
}
?>