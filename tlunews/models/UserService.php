<?php
require 'models/User.php';
class UserService {
    private $conn;

    public function __construct() {
        $this->conn = $this->getCon();
    }

    private function getCon() {
        $hostname = 'localhost';
        $user = 'root';
        $pass = '';
        $dbname = 'tintuc';

        try {
            return mysqli_connect($hostname, $user, $pass, $dbname);
        } catch (mysqli_sql_exception $e) {
            return null;
        }
    }

    // Lấy tất cả người dùng
    public function getAllUsers() {
        $query = "SELECT * FROM users";
        $result = mysqli_query($this->conn, $query);
        $users = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $user = new User($row['id'], $row['username'], $row['password'], $row['role']);
            $users[] = $user;
        }
        return $users;
    }

    // Lấy người dùng theo ID
    public function getUserById($id) {
        $query = "SELECT * FROM users WHERE id = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);
        return new User($user['id'], $user['username'], $user['password'], $user['role']);
    }

    public function addUser($username, $password, $role) {
        $query = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "ssi", $username, $password, $role);
        mysqli_stmt_execute($stmt);
    }

    public function editUser($id, $username, $password, $role) {
        $query = "UPDATE users SET username = ?, password = ?, role = ? WHERE id = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "ssii", $username, $password, $role, $id);
        mysqli_stmt_execute($stmt);
    }


    public function deleteUser($id) {
        $query = "DELETE FROM users WHERE id = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
    }
}
echo 'test git';
?>