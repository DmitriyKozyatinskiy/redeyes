<?php namespace mdo;

class User
{
    private $dbc;
    private $security_id;
    private $session_id;
    private $id;
    private $is_admin;

    public function __construct($dbc)
    {
        $this->dbc = $dbc;
        if (isset($_COOKIE["SECURITY_ID"]) && isset($_COOKIE["SESSION_ID"])) {
            $this->security_id = $this->dbc->real_escape_string($_COOKIE["SECURITY_ID"]);
            $this->session_id = $this->dbc->real_escape_string($_COOKIE["SESSION_ID"]);
            $this->id = $this->checkUserID();
            if ($this->getUserID() !== NULL) {
                $this->is_admin = $this->checkAdmin();
            }
        } else
            $this->id = 0;
    }

    private function checkUserID()
    {
        $stmt = $this->dbc->stmt_init();
        $stmt->prepare('SELECT ID FROM USERS WHERE SECURITY_ID = ? AND SESSION_ID = ?');
        $stmt->bind_param("ss", $this->security_id, $this->session_id);
        try {
            $stmt->execute();
        } catch (mysqli_sql_exception $e) {
            exit($e->getMessage());
        }
        $result = $stmt->get_result();
        $stmt->close();
        if ($result->num_rows)
            return $result->fetch_row()[0];
        else
            return NULL;
    }

    private function checkAdmin()
    {
        $stmt = $this->dbc->stmt_init();
        $stmt->prepare("SELECT COUNT(*) FROM ADMINS WHERE USER_ID = ?");
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        if ($result->fetch_row()[0] > 0)
            return true;
        else
            return false;
    }

    public function isRegisteredUser()
    {
        return (id) ? true : false;
    }

    public function isAdmin()
    {
        return $this->is_admin;
    }


    public function getUserID()
    {
        return $this->id;
    }

}