<?php 

class Database {
    private $host = 'localhost';
    private $dbname = 'login_db';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function __construct() {

        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            // Set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function regUser($username, $password, $c_password, $rank) {

        if (empty($username) || empty($password)) {
            $_SESSION['error'] = "Please fill in the form.";
            header("Location: register.php");
            return; 
        }

        $checkUser = $this->conn->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
        $checkUser->execute([$username]);
        if ($checkUser->fetchColumn() > 0) {
            $_SESSION['error'] = "This username is already taken.";
            header("Location: register.php");
            return;
        } 

        if ($password == $c_password) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            try {
                $stmt = $this->conn->prepare("INSERT INTO users(username, password, rank) VALUES(?, ?, ?)");
                $stmt->execute([$username, $hashedPassword, $rank]);

                if ($stmt) {
                    $_SESSION['success'] = "Registration successfully!";
                    header("Location: register.php");
                } else {
                    $_SESSION['error'] = "Something went wrong, please try again.";
                    header("Location: register.php");
                }
    
            } catch(PDOException $e) {
                $_SESSION['error'] = "Something went wrong, please try again.";
                header("Location: register.php");
                echo "Error: " . $e->getMessage();
            }
        } else {
            $_SESSION['error'] = "Password do not match, please try again.";
            header("Location: register.php");
        }
    }

    public function loginUser($username, $password) {

        if (empty($username) && empty($password)) {
            $_SESSION['error'] = "Please fill in the form.";
            header("Location: login.php");
            return; 
        }

        try {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$username]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                if ($user['rank'] === 0) {
                    $_SESSION['success'] = "Login successful!";
                    $_SESSION['userId'] = $user['id'];
                    $_SESSION['userRank'] = $user['rank'];
                    header("Location: user.php");
                } else {
                    $_SESSION['success'] = "Login successful!";
                    $_SESSION['userId'] = $user['id'];
                    $_SESSION['userRank'] = $user['rank'];
                    header("Location: admin.php");
                }
            } else {
                $_SESSION['error'] = "Invalid username or password";
                header("Location: login.php");
            }
        } catch(PDOException $e) {
            $_SESSION['error'] = "Something went wrong, please try again.";
            header("Location: login.php");
            echo "Error: " . $e->getMessage();
        }
    }

    public function getUser($userId) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->execute([$userId]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                return $user;
            } else {
                echo "User not found.";
                return null;
            }

        } catch(PDOException $e) {
            $_SESSION['error'] = "Something went wrong, please try again.";
            echo "Error: " . $e->getMessage();
            header("Location: user.php");
        }
    }
}

?>