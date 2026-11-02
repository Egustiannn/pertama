<?php
class UserModel {
    
    public function connect() {
        $conn = mysqli_connect("localhost", "root", "root", "resepku");
        if ($conn->connect_errno){
            die("failed" . $conn->connect_error);
        }
        return $conn;
    }

    public function getUserByUsername($user) {
        $stmt = $this->connect()->prepare("SELECT * FROM pengguna WHERE username = ?");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function registerUser($a, $b, $c) {
        $conn = $this->connect();
        $stmt = $conn->prepare("INSERT INTO pengguna (id, username, email, password, role) VALUES (NULL, ?, ?, ?, 'rakyat')");
        $stmt->bind_param("sss", $a, $b, $c);
        return $stmt->execute();
    }
}
?>