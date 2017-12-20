<?php

class Admin_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }
    
    function getAdminInfo($username){
        
        $this->db->where('username', $username);
        return $this->db->get('tb_admin')->row();
        
    }    
    function getAdmins(){
        
        return $this->db->get('tb_admin')->result();
        
    }   
    function registerUser($userid, $password){
        
        $this->db->set('username', $userid);
        $this->db->set('password', $password);
        $this->db->set('reg_date', 'NOW()', false);
        $this->db->insert('tb_admin');
        $this->db->insert_id();   
    }
    function updateLastLogin($username){
        
        $this->db->where('username', $username);
        $this->db->set('last_login', 'NOW()', false);
        $this->db->update('tb_admin'); 
    }
    function getuserInfo() {
        
        return $this->db->get('tb_user')->result();
    }
    function getMessageInfo() {
        
        $query = 'SELECT m1.* FROM tb_online m1 LEFT JOIN tb_online m2 ON (m1.user_id = m2.user_id AND m1.reg_date < m2.reg_date) WHERE m2.reg_date IS NULL';
        
        return $this->db->query($query)->result();         
    }
    function getAllCount() {
        
        return $this->db->get('tb_online')->num_rows();
    }
    function getWaitingCount() {
        
        $this->db->where('status', 'waiting');
        return $this->db->get('tb_online')->num_rows();
    }
    function getDoneCount() {
        
        $this->db->where('status', 'done');
        return $this->db->get('tb_online')->num_rows();
        
    }
    function getReinquiryCount() {
        
        $this->db->where('status', 'reinquiry');
        return $this->db->get('tb_online')->num_rows();
        
    }
    
    function getMessageByUserId($user_id) {
        
        $this->db->where('user_id', $user_id);
        return $this->db->get('tb_online')->result();
                                                     
    }
    
    function sendTextMessage($user_id, $name, $text) {
        
        $this->db->set('user_id', $user_id);
        $this->db->set('name', $name);
        $this->db->set('message', $text);
        $this->db->set('reg_date', 'NOW()', false);
        $this->db->set('type', 1);       
        
        $this->db->insert('tb_online');
        $this->db->insert_id();
    }
    
    function sendImageMessage($user_id, $name, $file_url, $width, $height) {
        
        $this->db->set('user_id', $user_id);
        $this->db->set('name', $name);
        $this->db->set('message', $file_url);
        $this->db->set('width', $width);
        $this->db->set('height', $height);
        $this->db->set('reg_date', 'NOW()', false);
        $this->db->set('type', 1);
        $this->db->set('is_image', 1);       
        
        $this->db->insert('tb_online');
        $this->db->insert_id();        
    }
    
    function sendMessageStatus($message_id, $name, $status) {
        
        $this->db->where('id', $message_id);
        $this->db->set('status', $status);        
        $this->db->set('reg_date', 'NOW()', false);             
        
        $this->db->update('tb_online');        
    }
    
    function noticeInfo() {
        
        $this->db->order_by('reg_date', 'DESC');
        return $this->db->get('tb_note')->row();        
    }
    
    function noteFileInfo($note_id) {
        
        $this->db->where('note_id', $note_id);
        return $this->db->get('tb_note_file')->result();        
    }
    
    function deleteNote($note_id) {
        
        $this->db->where('id' ,$note_id);
        $this->db->delete('tb_note');
        
        $this->db->where('note_id', $note_id);
        $this->db->delete('tb_note_file');
    }
    
    function setTextNotice($text, $link) {
        
        $this->db->set('content', $text);
        $this->db->set('link', $link);
        $this->db->set('reg_date', 'NOW()', false);
        $this->db->insert('tb_note');
        
        return $this->db->insert_id();
    }
    
    function setImageNotice($note_id, $file_url) {
        
        $this->db->set('note_id', $note_id);
        $this->db->set('file_url', $file_url);
        $this->db->insert('tb_note_file');
        
        $this->db->insert_id();
    }
    
//    function deleteUser($id) {
//        
//        $row = $this->db->where('id', $id)->get('tb_user')->row();
//        $email = $row->email;
//        $phone_number = $row->phone_number;
//        
//        $this->db->where('email', $email);
//        $this->db->or_where('email', $phone_number);
//        $this->db->delete('tb_authcode');
//        
//        $this->db->where('user_id', $id);
//        $this->db->or_where('block_id', $id);
//        $this->db->delete('tb_block');
//        
//        $this->db->where('user_id', $id);
//        $this->db->or_where('friend_id', $id);
//        $this->db->delete('tb_friend');
//        
//        $this->db->where('user_id', $id);
//        $this->db->delete('tb_group');
// 
//        $this->db->where('user_id', $id);
//        $this->db->delete('tb_like_timeline');
//        
//        $this->db->where('user_id', $id);
//        $this->db->delete('tb_online');
//        
//        $this->db->where('user_id', $id);
//        $this->db->delete('tb_like_timeline');
//        
//    }
//	
	
	// USER SECTION
	function allUsers() {
		return $this->db->get('tb_user')->result();
    }
	function deleteUser($id){
		$user = $this->db->where('id', $id)->get('tb_user')->row();
		if($user){
			$this->db->where('id', $id);
			$this->db->delete('tb_user');
			return 1;
		}
		else
			return 0;
	}
	function getUserByID($id){
		return $this->db->where('id', $id)->get('tb_user')->row();
	}
	function updateUser($data){
		$this->db->where('id', $data['id']);
		$this->db->update("tb_user", array(
			'firstname' => $data['firstname'],
			'lastname' => $data['lastname'],
			'sex' => $data['sex'],
			'email' => $data['email'],
			'status' => $data['status'],
			'trip_start' => $data['trip_start'],
			'trip_end' => $data['trip_end'],
			'last_login' => date('Y-m-d H:i:s'),
			'photo_url' => $data['photo']
		));
		return true;
	}
	function createUser($data){
		$this->db->set(array(
			'firstname' => $data['firstname'],
			'lastname' => $data['lastname'],
			'sex' => $data['sex'],
			'email' => $data['email'],
			'status' => $data['status'],
			'trip_start' => $data['trip_start'],
			'trip_end' => $data['trip_end'],
			'last_login' => date('Y-m-d H:i:s'),
			'photo_url' => $data['photo']
		));
		$this->db->insert('tb_user');
		return $this->db->insert_id();
	}
		
	//EVENTS SECTION
	function allEvents() {
		return $this->db->get('tb_event')->result();
    }
	function allClubs() {
		return $this->db->get('tb_club')->result();
    }
	function getClubName($id){
		$club = $this->db->where('id', $id)->get('tb_club')->row();
		return $club->name;
		
	}
	function getEventByID($id){
		return $this->db->where('id', $id)->get('tb_event')->row();
	}
	function getFileByID($id){
		return $this->db->where('id', $id)->get('tb_event_files')->row();
	}
	function deleteEvent($id){
		$item = $this->db->where('id', $id)->get('tb_event')->row();
		if($item){
			$this->db->where('id', $id);
			$this->db->delete('tb_event');
			return 1;
		}
		else
			return 0;
	}
	function deleteFile($id){
		$this->db->where('id', $id);
        $this->db->delete('tb_event_files');
		return $this->db->affected_rows();
	}
	function updateEvent($data){
		$res = $this->db
			->where('id', $data['id'])
			->update("tb_event", array(
			'event_name' => $data['event_name'],
			'event_type' => $data['event_type'],
			'club_id' => $data['club_id'],
			'date' => $data['date'],
			'start_time' => $data['start_time'],
			'end_time' => $data['end_time'],
			'price' => $data['price'],
			'description' => $data['description'],
			'music' => $data['music'],
			'entry_type' => $data['entry_type'],
		));
		if($res)
			return $data['id'];
	}
	function createEvent($data){
		$this->db->set(array(
			'event_name' => $data['event_name'],
			'event_type' => $data['event_type'],
			'club_id' => $data['club_id'],
			'date' => $data['date'],
			'start_time' => $data['start_time'],
			'end_time' => $data['end_time'],
			'price' => $data['price'],
			'description' => $data['description'],
			'music' => $data['music'],
			'entry_type' => $data['entry_type'],
		));
		$this->db->insert('tb_event');
		return $this->db->insert_id();
	}
	function createEventFile($data){
		$this->db->set(array(
			'event_id' => $data['event_id'],
			'file_url' => $data['file_url'],
		));
		$this->db->insert('tb_event_files');
	}
	function getEventFiles($id){
		return $this->db->where('event_id', $id)->get('tb_event_files')->result();
	}
	
	//BOOKING SECTION
	function allBookings(){
		//return $this->db->get('tb_book')->result();
		$this->db->select ( 'tb_book.id,tb_user.email,tb_club.name AS club_name,tb_event.date AS event_date,tb_event.event_type,tb_event.event_name,tb_book.seat,tb_book.attendees,tb_book.time,tb_book.price,tb_book.date,tb_book.purchased'); 
		$this->db->from ( 'tb_book' );
		$this->db->join ( 'tb_user', 'tb_user.id = tb_book.user_id' , 'left' );
		$this->db->join ( 'tb_event', 'tb_event.id = tb_book.event_id' , 'left' );
		$this->db->join ( 'tb_club', 'tb_club.id = tb_event.club_id' , 'left' );
		$query = $this->db->get ();
		return $query->result ();

	}
	function getBookingByID(){
		return $this->db->where('id', $id)->get('tb_book')->row();
	}
	function deleteBooking($id){
		$this->db->where('id', $id);
        $this->db->delete('tb_book');
		return $this->db->affected_rows();
	}
	function createBooking($data){
		$this->db->set(array(
			'user_id' => $data['user_id'],
			'event_id' => $data['event_id'],
			'seat' => $data['seat'],
			'attendees' => $data['attendees'],
			'price' => $data['price'],
			'purchased' => $data['purchased'],
			'date' => $data['date']
		));
		$this->db->insert('tb_book');
		return $this->db->insert_id();
	}
	//PURCHASE SECTION
	function allPurchases(){
		//return $this->db->get('tb_purchase')->result();
		$this->db->select ( 'tb_purchase.id,tb_user.email,tb_purchase.book_id,tb_purchase.price,tb_purchase.date,tb_event.event_name AS event_name,tb_event.date AS event_date,tb_club.name AS club_name'); 
		$this->db->from ( 'tb_purchase' );
		$this->db->join ( 'tb_user', 'tb_user.id = tb_purchase.user_id' , 'left' );
		$this->db->join ( 'tb_book', 'tb_book.id = tb_purchase.book_id' , 'left' );
		$this->db->join ( 'tb_event', 'tb_event.id = tb_book.event_id' , 'left' );
		$this->db->join ( 'tb_club', 'tb_club.id = tb_event.club_id' , 'left' );
		$query = $this->db->get ();
		return $query->result ();
	}
	function getPurchaseByID(){
		return $this->db->where('id', $id)->get('tb_purchase')->row();
	}
	function deletePurchase($id){
		$this->db->where('id', $id);
        $this->db->delete('tb_purchase');
		return $this->db->affected_rows();
	}
	
	
	// TICKET SECTION
	function allTickets(){
		//return $this->db->get('tb_ticket')->result();
		$this->db->select ( 'tb_ticket.id,tb_user.email,tb_ticket.book_id,tb_ticket.barcode,tb_book.price,tb_book.attendees,tb_book.time,tb_book.seat,tb_event.event_name,tb_event.event_type,tb_event.date AS event_date,tb_club.name AS club_name'); 
		$this->db->from ( 'tb_ticket' );
		$this->db->join ( 'tb_user', 'tb_user.id = tb_ticket.user_id' , 'left' );
		$this->db->join ( 'tb_book', 'tb_book.id = tb_ticket.book_id' , 'left' );
		$this->db->join ( 'tb_event', 'tb_event.id = tb_book.event_id' , 'left' );
		$this->db->join ( 'tb_club', 'tb_club.id = tb_event.club_id' , 'left' );
		$query = $this->db->get ();
		return $query->result ();
	}
	function getTicketByID(){
		return $this->db->where('id', $id)->get('tb_ticket')->row();
	}
	function deleteTicket($id){
		$this->db->where('id', $id);
        $this->db->delete('tb_ticket');
		return $this->db->affected_rows();
	}
	function createTicket($data){
		$this->db->set(array(
			'user_id' => $data['user_id'],
			'book_id' => $data['booking_id'],
			'barcode' => $data['barcode'],
		));
		$this->db->insert('tb_ticket');
		return $this->db->insert_id();
	}
	
}
  
?>
