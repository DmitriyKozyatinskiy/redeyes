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
        $this->email = $email;
        $this->name = $name;
        $this->password = MD5($password);
    }

    public function signUp()
    {
        if(is_null($this->email) || is_null($this->password) || is_null($this->name)) exit;
        $query = 'INSERT INTO USERS(EMAIL, PASSWORD, NAME) VALUES (?, ?, ?)';
        $stmt = new stmt($this->dbc, $query, array('sss', &$this->email, &$this->password, &$this->name));
        return $stmt->execute();
    }

    public function signIn()
    {
        if(is_null($this->email) || is_null($this->password)) exit;
        $query = 'SELECT SESSION_ID, SECURITY_ID FROM USERS WHERE EMAIL = ? AND PASSWORD = ?';
        $stmt = new stmt($this->dbc, $query, array('ss', &$this->email, &$this->password));
        $result = $stmt->execute(true);
        if(!$result) die();
        $session_id = $result["SESSION_ID"];
        $security_id = $result["SECURITY_ID"];
        setcookie("SESSION_ID", $session_id);
        setcookie("SECURITY_ID", $security_id);
    }
}
