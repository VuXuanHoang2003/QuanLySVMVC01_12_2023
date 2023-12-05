<?php
declare(strict_types=1);
include_once("./E_Khoa.php");
class M_Khoa
{
    public mysqli $db;
    public function __construct()
    {
        $this->db = new mysqli("localhost", "root", "", "test888");
    }

    public function getAllKhoas(): array
    {
        $sql = "SELECT * FROM khoa";
        $rs = mysqli_query($this->db, $sql);
        $khoas = [];
        while ($row = mysqli_fetch_assoc($rs)) {
            $khoa = new E_Khoa($row["KhoaID"], $row["TenKhoa"]);
            $khoas[] = $khoa;
        }
        return $khoas;
    }

    public function insertKhoa($KhoaID, $TenKhoa): bool
    {
        $sql = "INSERT INTO khoa (KhoaID, TenKhoa) VALUES ('$KhoaID', '$TenKhoa')";
        return mysqli_query($this->db, $sql);
    }

    public function updateKhoa($KhoaID, $TenKhoa): bool
    {
        $sql = "UPDATE khoa SET TenKhoa = '$TenKhoa' WHERE KhoaID = '$KhoaID'";
        return mysqli_query($this->db, $sql);
    }

    public function deleteKhoa($KhoaID): bool
    {
        $sql = "DELETE FROM khoa WHERE KhoaID = '$KhoaID'";
        return mysqli_query($this->db, $sql);
    }
}