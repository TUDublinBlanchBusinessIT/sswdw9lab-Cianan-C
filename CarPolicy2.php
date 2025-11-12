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

    public function getDiscount() {
        $years = $this->getTotalYearsNoClaims();
        $discount = 0;

        if ($years >= 3 && $years <= 5) {
            $discount = 0.10;
        } else if ($years > 5) {
            $discount = 0.15; 
        }

        return $discount;
    }

    public function getDiscountedPremium() {
        $discount = $this->getDiscount();
        $discountedPremium = $this->yearlyPremium - ($this->yearlyPremium * $discount);
        return $discountedPremium;
    }

    public function __toString() {
        return "PN: " . $this->policyNumber;
    }
}
?>
