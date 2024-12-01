<?php

class Optical_Clinic extends Controller {

    public function index() {
        // Load the homepage
        $this->call->view('home', ['title' => 'Welcome']);
    }

    public function __construct()
    {
      parent::__construct();
      $this->call->model('Appointment');
    }
  
    public function appointments()
    {
      $data['appointments'] = $this->User_model->get_users();
      $this->call->view('Optical/Appointment', $data);
    }
  
    //=== CREATE USER ===//
    public function create_user()
    {
      $last_name = $this->io->post('reml_last_name');
      $first_name = $this->io->post('reml_first_name');
      $email = $this->io->post('reml_email');
      $gender = $this->io->post('reml_gender');
      $address = $this->io->post('reml_address');
  
      if ($this->User_model->insert_user($last_name, $first_name, $email, $gender, $address)) {
        echo json_encode(['status' => 'success', 'message' => 'User added successfully']);
      } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to add user']);
      }
    }
  
    //=== EDIT USER ===//
    public function edit_user($id)
    {
      $user = $this->User_model->getUserById($id);
  
      if ($user) {
        echo json_encode(['status' => 'success', 'user' => $user]);
      } else {
        echo json_encode(['status' => 'error', 'message' => 'User not found']);
      }
  
      header('Content-Type: application/json');
    }
  
    //=== UPDATE USER ===//
    public function update_user($id)
    {
      $data = array(
        'reml_last_name' => $this->io->post('reml_last_name'),
        'reml_first_name' => $this->io->post('reml_first_name'),
        'reml_email' => $this->io->post('reml_email'),
        'reml_gender' => $this->io->post('reml_gender'),
        'reml_address' => $this->io->post('reml_address')
      );
  
      if ($this->User_model->update_user($id, $data)) {
        echo json_encode(['status' => 'success', 'message' => 'User updated successfully']);
      } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update user']);
      }
    }
  
    //=== DELETE USER ===//
    public function delete_user($id)
    {
      if ($this->User_model->delete_user($id)) {
        echo json_encode(['success' => true, 'message' => 'User deleted successfully.']);
      } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete user.']);
      }
  
      header('Content-Type: application/json');
    }
  
    //=== GET ALL ===//
    public function get_all()
    {
      $users = $this->User_model->get_users();
      if (!empty($users)) {
        echo json_encode(['status' => 'success', 'users' => $users]);
      } else {
        echo json_encode(['status' => 'error', 'message' => 'No users found']);
      }
    }
    public function prescriptions() {
        $this->call->view('prescriptions', 'Prescriptions');
    }

    public function frames() {
        $this->call->view('frames', 'Frames');
    }

    public function profile() {
        $this->call->view('profile', 'Profile');
    }
    

    private function header ($view, $title) {
        $data['title'] = $title;
        $data['content'] = $this->load->view("optical/$view", [], true);
        $this->call->view('template', $data);
    }
}
