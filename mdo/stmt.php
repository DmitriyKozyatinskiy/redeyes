<?php namespace mdo;

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

    public function execute($with_result = false)
    {
        $this->stmt->prepare($this->query);
        call_user_func_array(array($this->stmt, 'bind_param'), $this->params);
        if (!$with_result) {
            if ($this->stmt->execute() === FALSE)
                return 0;
            else
                return 1;
        } else {
            $result = $stmt->get_result();
            if ($result->num_rows == 0)
                return 0;
            else
                return $result->fetch_assoc();
        }
    }
}
