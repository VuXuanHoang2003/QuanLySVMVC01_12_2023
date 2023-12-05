<?php

class E_Khoa
{
    public $KhoaID;
    public $TenKhoa;
    public function __construct($KhoaID, $TenKhoa) {
        $this->KhoaID = $KhoaID;
        $this->TenKhoa = $TenKhoa;
    }
}