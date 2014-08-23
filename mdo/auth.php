<?php namespace mdo;

class Auth
{
    private $dbc;
    private $email;
    private $password;
    private $name;

    public function __construct($dbc, $email, $password, $name = '')
    {
        $this->dbc = $dbc;
        $this->email = $this->dbc->real_escape_string($email);
        $this->name = $this->dbc->real_escape_string($name);
        $this->password = MD5($password);
    }

    public function signUp()
    {
        $stmt = $this->dbc->stmt_init();
        $stmt->prepare("INSERT INTO USERS(EMAIL, PASSWORD, NAME) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $this->email, $this->password, $this->email);
        try {
            $stmt->execute();
        } catch (mysqli_sql_exception $e) {
            exit($e->getMessage());
        }
        $stmt->close();
    }

    public function signIn()
    {
        $stmt = $this->dbc->stmt_init();
        $stmt->prepare("SELECT SESSION_ID, SECURITY_ID FROM USERS WHERE EMAIL = ? AND PASSWORD = ?");
        $stmt->bind_param("ss", $this->email, $this->password);
        try {
            $stmt->execute();
        } catch (mysqli_sql_exception $e) {
            exit($e->getMessage());
        }
        $result = $stmt->get_result();
        $stmt->close();
        if ($result->num_rows == 0) {
            echo 'Wrong info! :(';
            exit();
        }
        $auth_result = $result->fetch_assoc();
        $session_id = $auth_result["SESSION_ID"];
        $security_id = $auth_result["SECURITY_ID"];
        setcookie("SESSION_ID", $session_id);
        setcookie("SECURITY_ID", $security_id);
    }
}