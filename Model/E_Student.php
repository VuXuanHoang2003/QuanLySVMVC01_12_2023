<?php
class E_Student {
    public $MSV;
    public $Hovaten;
    public $Gioitinh;
    public $Khoa;

    public function __construct($MSV, $Hovaten, $Gioitinh, $Khoa) {
        $this->MSV = $MSV;
        $this->Hovaten = $Hovaten;
        $this->Gioitinh = $Gioitinh;
        $this->Khoa = $Khoa;
    }
}