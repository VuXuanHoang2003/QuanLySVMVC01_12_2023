<?php
declare(strict_types=1);
include_once("./M_Student.php");
class M_Student
{
    public mysqli $db;
    public function __construct()
    {
        $this->db = new mysqli("localhost", "root", "", "test888");
    }

    public function getAllStudents(): array
    {
        $sql = "SELECT * FROM student";
        $rs = mysqli_query($this->db, $sql);
        $students = [];
        while ($row = mysqli_fetch_array($rs)) {
            $student = new E_Student($row["MSV"], $row["Hovaten"], $row["Khoa"], $row["Gioitinh"]);
            $students[] = $student;
        }
        return $students;
    }

    public function insertStudent($MSV, $Hovaten, $Khoa, $Gioitinh): bool
    {
        $sql = "INSERT INTO student (MSV, Hovaten, Khoa, Gioitinh) VALUES ('$MSV', '$Hovaten', '$Khoa', '$Gioitinh')";
        return mysqli_query($this->db, $sql);
    }

    public function updateStudent($MSV, $Hovaten, $Khoa, $Gioitinh): bool
    {
        $sql = "UPDATE student SET Hovaten = '$Hovaten', Khoa = '$Khoa', Gioitinh = '$Gioitinh' WHERE MSV = '$MSV'";
        return mysqli_query($this->db, $sql);
    }

    public function deleteStudent($MSV, $Hovaten): bool
    {
        $sql = "DELETE FROM student WHERE MSV = '$MSV'";
        return mysqli_query($this->db, $sql);
    }


}