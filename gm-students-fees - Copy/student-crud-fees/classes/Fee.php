<?php
class Fee {
    public $id;
    public $student_id;
    public $amount;
    public $date_paid;

    public function __construct($id, $student_id, $amount, $date_paid) {
        $this->id = $id;
        $this->student_id = $student_id;
        $this->amount = $amount;
        $this->date_paid = $date_paid;
    }
}
?>
