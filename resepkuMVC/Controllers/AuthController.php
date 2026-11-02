<?php
require_once __DIR__ . '/../Models/UserModel.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function loginView() {
        require_once __DIR__ . '/../Views/login.php';
    }

    public function signupView() {
        require_once __DIR__ . '/../Views/sign_up.php';
    }

    public function processLogin() {
        session_start();
        $user = $_POST['username'] ?? '';
        $pass = $_POST['password'] ?? '';

        $q_user = $this->userModel->getUserByUsername($user);

        if(mysqli_num_rows($q_user) < 1){
            header("Location: index.php?action=login&status=no_akun");
            exit;
        } else {
            $data = $this->userModel->getUserByUsername($user);
            $inside = mysqli_fetch_assoc($data);
            
            if ($inside["password"] == $pass){
                $_SESSION["sesi"] = $inside["id"];
                if($inside["role"] == "rakyat"){
                    header("Location: Views/user/index.php?status=login");
                }else{
                    header("Location: Views/admin/index.php?status=login");
                }
                exit;
            } else {
                header("Location: index.php?action=login&status=salah");
                exit;
            }
        }
    }
    public function registerUser($nama, $user, $email, $pass) {
        $conn = $this->connect();
        $stmt = $conn->prepare("INSERT INTO pengguna (id, nama, email, username, password, role) VALUES (NULL, ?, ?, ?, ?, 'rakyat')");
        $stmt->bind_param("ssss", $nama, $user, $email, $pass);
        return $stmt->execute();
    }

    public function processRegister() {
        $nama = $_POST['nama'] ?? '';
        $user = $_POST['user'] ?? '';
        $email = $_POST['email'] ?? '';
        $pass = $_POST['password'] ?? '';

        // Sesuaikan dengan model yang akan memasukkan data nama ke database
        if($this->userModel->registerUser($nama, $email, $user, $pass)) {
            header("Location: index.php?action=login&status=ditambah");
        } else {
            header("Location: index.php?action=signup&status=gagal");
        }
        exit;
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php?action=login&status=kelar");
        exit;
    }
}
?>