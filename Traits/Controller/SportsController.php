<?php

use Model\SportsModel;

require_once 'Traits/Model/SportsModel.php';
require_once 'Traits/Model/Sports.php';
require_once 'Traits/config.php';
session_status() === PHP_SESSION_ACTIVE ? true : session_start();

class SportsController
{

    public function __construct()
    {
        $this->objconfig = new config();
        $this->objsm = new SportsModel($this->objconfig);
    }

    function list()
    {
        $result = $this->objsm->selectRecord(0);
        include "Traits/view/list.php";
    }

// mvc handler request
    public function mvcHandler()
    {
        $act = $_GET['act'] ?? null;
        switch ($act) {
            case 'add':
                $this->insert();
                break;
            case 'update':
                $this->update();
                break;
            case 'delete':
                $this->delete();
                break;
            default:
                $this->list();
        }
    }

    public function insert()
    {
        $sporttb = new Sports();
        if (isset($_POST['add'])) {
            // read form value
            $sporttb->category = trim($_POST['category']);
            $sporttb->name = trim($_POST['name']);
            //call validation
            $chk = $this->checkValidation($sporttb);
            if ($chk) {
                //call insert record
                $pid = $this->objsm->insertRecord($sporttb);
                if ($pid > 0) {
                    $this->list();
                } else {
                    echo "Something is wrong..., try again.";
                }
            } else {
                $_SESSION['sporttbl0'] = serialize($sporttb); //add session obj
                $this->pageRedirect("view/insert.php");
            }
        }
    }

    public function checkValidation($sporttb)
    {
        $noerror = true;
        // Validate category
        if (empty($sporttb->category)) {
            $sporttb->category_msg = "Field is empty.";
            $noerror = false;
        } elseif (!filter_var(
            $sporttb->category,
            FILTER_VALIDATE_REGEXP,
            ["options" => ["regexp" => "/^[a-zA-Z\s]+$/"]])
        ) {
            $sporttb->category_msg = "Invalid entry.";
            $noerror = false;
        } else {
            $sporttb->category_msg = "";
        }
// Validate name
        if (empty($sporttb->name)) {
            $sporttb->name_msg = "Field is empty.";
            $noerror = false;
        } elseif (!filter_var(
            $sporttb->name,
            FILTER_VALIDATE_REGEXP,
            ["options" => ["regexp" => "/^[a-zA-Z\s]+$/"]]
        )) {
            $sporttb->name_msg = "Invalid entry.";
            $noerror = false;
        } else {
            $sporttb->name_msg = "";
        }
        return $noerror;
    }
    public function pageRedirect($url)
    {
        header('Location:' . $url);
    }

}