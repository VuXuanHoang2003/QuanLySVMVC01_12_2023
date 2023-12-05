<?php
declare(strict_types=1);
include_once("./E_Account.php");
class M_Account
{
    public mysqli $db;
    public function __construct()
    {
        $this->db = mysqli_connect("localhost", "root", "", "test888");
    }

    public function getAllAccounts(): array
    {
        $sql = "SELECT * FROM accounts";
        $rs = mysqli_query($this->db, $sql);
        $accounts = [];
        while ($row = mysqli_fetch_assoc($rs)) {
            $account = new E_Account($row["username"], $row["password"]);
            $accounts[] = $account;
        }
        return $accounts;
    }

    public function insertAccount($username, $password): bool
    {
        $sql = "INSERT INTO accounts (username, password) VALUES ('$username', '$password')";
        return mysqli_query($this->db, $sql);
    }

    public function updateAccount($username, $password): bool
    {
        $sql = "UPDATE accounts SET password = '$password' WHERE username = '$username'";
        return mysqli_query($this->db, $sql);
    }

    public function deleteAccount($username): bool
    {
        $sql = "DELETE FROM accounts WHERE username = '$username'";
        return mysqli_query($this->db, $sql);
    }

    public function checkLogin($username, $password): bool
    {
        $sql = "SELECT * FROM accounts WHERE username = '$username' AND password = '$password'";
        $rs = mysqli_query($this->db, $sql);
        if (mysqli_num_rows($rs) > 0) {
            return true;
        }
        return false;
    }
}