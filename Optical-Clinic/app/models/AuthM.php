<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthM extends Model {

    // Function to get a user by email for login
    public function get_user_by_email($email) {
        $sql = "SELECT * FROM users WHERE email = ?";
        return $this->db->query($sql, [$email])->row();
    }

    // Function to create a new user (Registration)
    public function create_user($data) {
        $sql = "INSERT INTO users (username, email, password, email_token, created_at) VALUES (?, ?, ?, ?, ?)";
        return $this->db->query($sql, [
            $data['username'],
            $data['email'],
            $data['password'], // Ensure you hash the password before saving
            $data['email_token'],
            date('Y-m-d H:i:s')
        ]);
    }

    // Function to validate a user by email and password
    public function validate_user($email, $password) {
        $user = $this->get_user_by_email($email);
        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return null;
    }

    // Function to store a password reset token
    public function store_password_reset_token($email, $token) {
        $sql = "UPDATE users SET password_reset_token = ?, token_expiry = ? WHERE email = ?";
        return $this->db->query($sql, [
            $token,
            date('Y-m-d H:i:s', strtotime('+1 hour')),
            $email
        ]);
    }

    // Function to get a user by reset token
    public function get_user_by_reset_token($token) {
        $sql = "SELECT * FROM users WHERE password_reset_token = ? AND token_expiry > ?";
        return $this->db->query($sql, [$token, date('Y-m-d H:i:s')])->row();
    }

    // Function to update the password
    public function update_password($token, $new_password) {
        $sql = "UPDATE users SET password = ?, password_reset_token = NULL, token_expiry = NULL WHERE password_reset_token = ?";
        return $this->db->query($sql, [
            password_hash($new_password, PASSWORD_BCRYPT),
            $token
        ]);
    }

    // Function to check if a username or email is already in use
    public function is_unique($field, $value) {
        $sql = "SELECT * FROM users WHERE {$field} = ?";
        return $this->db->query($sql, [$value])->num_rows() === 0;
    }

    // Function to logout the user
    public function logout_user($user_id) {
        $sql = "UPDATE users SET last_logged_out = ? WHERE id = ?";
        return $this->db->query($sql, [
            date('Y-m-d H:i:s'),
            $user_id
        ]);
    }
}
?>
