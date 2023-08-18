<?php

class config
{
    public string $host;
    public string $user;
    public string $pass;
    public string $db;

    public function __construct()
    {
        $this->host = "localhost";
        $this->user = "root";
        $this->pass = "root";
        $this->db = "phplesson";
    }
}