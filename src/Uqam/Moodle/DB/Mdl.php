<?php
/**
 * Created by PhpStorm.
 * User: nmoller
 * Date: 14/01/19
 * Time: 10:15 AM
 */

namespace Uqam\Moodle\DB;


class Mdl
{
    private $hostname;
    private $database;
    private $user;
    private $password;
    private $cn = null;

    public function __construct($hostname, $database, $user, $password)
    {
        $this->hostname = $hostname;
        $this->database = $database;
        $this->user = $user;
        $this->password = $password;
        if ($this->cn == null) {
            mysqli_report(MYSQLI_REPORT_ALL);
            try {
                $this->cn = new \mysqli($this->hostname, $this->user, $this->password, $this->database);
            } catch (\mysqli_sql_exception $e) {
                exit($e->getMessage());
            }
        }
    }

    public function connect() {
        /*
        if ($this->cn == null) {
            mysqli_report(MYSQLI_REPORT_ALL);
            try {
                $this->cn = new \mysqli($this->hostname, $this->user, $this->password, $this->database);
            } catch (\mysqli_sql_exception $e) {
                exit($e->getMessage());
            }
        }
        */
        return $this->cn;
    }

    public function getDB() {
        $this->connect();
    }
}