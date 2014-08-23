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
        $query = 'INSERT INTO USERS(EMAIL, PASSWORD, NAME) VALUES (?, ?, ?)';
        $stmt = new stmt($this->dbc, $query, array('sss', &$this->email, &$this->password, &$this->name));
        return $stmt->stmt_execute();
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

class stmt
{
    private $dbc;
    private $query;
    private $params;
    private $stmt;

    public function __construct($dbc, $query, $params)
    {
        $this->dbc = $dbc;
        $this->query = $query;
        $this->params = $params;
        $this->stmt = $this->dbc->stmt_init();
    }

    public function __destruct()
    {
        $this->stmt->close();
    }

    public function stmt_execute()
    {
        $this->stmt->prepare($this->query);
        call_user_func_array(array($this->stmt, 'bind_param'), $this->params);
        if($this->stmt->execute() === FALSE)
            return 0;
        else
            return 1;
    }
}
