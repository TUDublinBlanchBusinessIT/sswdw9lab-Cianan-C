<?php
class CarPolicy {

    private $policyNumber;
    private $yearlyPremium;
    private $dateOfLastClaim;

    public function __construct($pn, $yp) {
        $this->policyNumber = $pn;
        $this->yearlyPremium = $yp;
    }

    public function setDateOfLastClaim($doc) {
        $this->dateOfLastClaim = $doc;
    }

    public function getTotalYearsNoClaims() {
        $currentDate = new DateTime();
        $lastDate = new DateTime($this->dateOfLastClaim);
        $interval = $currentDate->diff($lastDate);
        return $interval->format("%y");
    }

    public function __toString() {
        return "PN: " . $this->policyNumber;
    }
}
?>
