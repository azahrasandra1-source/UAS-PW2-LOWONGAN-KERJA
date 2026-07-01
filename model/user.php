<?php
require_once "C:/xampp/htdocs/PW2/UAS_pw2/config/database.php";

class User
{
    private $conn;
    private $table = "users";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // REGISTER
    public function register($nama, $username, $password)
{
    $password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $this->conn->prepare("INSERT INTO users (nama, username, password) VALUES (?, ?, ?)");

    if (!$stmt) {
        die("Prepare Error: " . $this->conn->error);
    }

    $stmt->bind_param("sss", $nama, $username, $password);

    if (!$stmt->execute()) {
        die("Execute Error: " . $stmt->error);
    }

    return true;
}

    // LOGIN
    public function login($username, $password)
    {
        $query = "SELECT * FROM users WHERE username=?";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows > 0){
            $user = $result->fetch_assoc();

            if(password_verify($password, $user['password'])){
                return $user;
            }
        }

        return false;
    }
}
?>