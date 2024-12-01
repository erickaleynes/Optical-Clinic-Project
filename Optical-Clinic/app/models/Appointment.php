<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class User_model extends Model
{

  public function __construct()
  {
    parent::__construct();
    lava_instance()->database();
  }

  public function get_users()
  {
    return $this->db->table('appointments')->get_all();
  }

  public function insert_user($UserId, $date, $time, $description, $status)
  {
    $data = array(
      'user_id' => $UserId,
      'date' => $date,
      'time' => $time,
      'description' => $description,
      'status' => $status
    );
    return $this->db->table('appointments')->insert($data);
  }

  public function getUserById($id)
  {
    return $this->db->table('appointments')->where('id', $id)->get();
  }

  public function update_user($id, $data)
  {
    return $this->db->table('appointments')->where('id', $id)->update($data);
  }

  public function delete_user($id)
  {
    return $this->db->table('appointments')->where("id", $id)->delete();
  }
}
