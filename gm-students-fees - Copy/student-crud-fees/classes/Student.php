<?php
class Student {
    public $id;
    public $name;
    public $email;
    public $phone;
    public $address;

    public function __construct($id, $name, $email, $phone, $address) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
    }
}
?>
