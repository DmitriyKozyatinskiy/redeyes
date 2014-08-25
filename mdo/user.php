<?php namespace mdo;

class User
{
    private $dbc;
    private $security_id;
    private $session_id;
    private $id;
    private $name;
    private $is_admin;

    public function __construct($dbc)
    {
        $this->dbc = $dbc;
        if (isset($_COOKIE['SECURITY_ID']) && isset($_COOKIE['SESSION_ID'])) {
            $this->security_id = $_COOKIE['SECURITY_ID'];
            $this->session_id = $_COOKIE['SESSION_ID'];
            $this->checkUserInfo();
//            if (!is_null($this->id))
//                $this->is_admin = $this->checkAdmin();
        } else {
            $this->id = NULL;
            $this->name = NULL;
        }
    }

    private function checkUserInfo()
    {
        $query = 'SELECT ID, NAME FROM USERS WHERE SECURITY_ID = ? AND SESSION_ID = ?';
        $stmt = new stmt($this->dbc, $query, array('ss', &$this->security_id, &$this->session_id));
        $result = $stmt->execute(true);
        $result = $result->fetch_assoc();
        if ($result['ID'] != '') {
            $this->id = $result['ID'];
            $this->name = $result['NAME'];
        } else {
            $this->id = NULL;
            $this->name = NULL;
        }
    }

    private function checkAdmin()
    {
        $query = 'SELECT COUNT(*) FROM ADMINS WHERE USER_ID = ?';
        $stmt = new stmt($this->dbc, $query, array('i', &$this->id));
        $result = $stmt->execute(true);
        if ($result->fetch_row()[0] > 0)
            return true;
        else
            return false;
    }

    public function isRegisteredUser()
    {
        echo $this->id;
        if (is_null($this->id))
            return false;
        else
            return true;
    }

    public function isAdmin()
    {
        return $this->is_admin;
    }


    public function getUserID()
    {
        return $this->id;
    }

    public function getUserName()
    {
        return $this->name;
    }

    public function exitIfRegistered($go_to = null)
    {
        if (!is_null($this->id)) {
            $this->dbc->close();
            if (!is_null($go_to))
                echo '<script>document.location.href="', $go_to, '.php"</script>';
            exit;
        }
    }

    public function exitIfNotRegistered($go_to = null)
    {
        if (is_null($this->id)) {
            $this->dbc->close();
            if (!is_null($go_to))
                echo '<script>document.location.href="', $go_to, '.php"</script>';
            exit;
        }
    }
}