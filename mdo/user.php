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
            $this->id = NULL;
    }

    private function checkUserID()
    {
        $query = 'SELECT ID FROM USERS WHERE SECURITY_ID = ? AND SESSION_ID = ?';
        $stmt = new stmt($dbc, $query, array('ss', $this->security_id, $this->session_id));
        $result = $stmt->execute(true);
        if ($result->num_rows)
            return $result->fetch_row()[0];
        else
            return NULL;
    }

    private function checkAdmin()
    {
        $query = 'SELECT COUNT(*) FROM ADMINS WHERE USER_ID = ?';
        $stmt = $this->dbc->stmt_init();
        $stmt = new stmt($dbc, $query, array('i', $this->id));
        $result = $stmt->execute(true);
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