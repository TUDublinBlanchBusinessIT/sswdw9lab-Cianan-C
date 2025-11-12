<?php
$yp = $_POST['yearlyPremium'];
$pn = $_POST['policyNumber'];
$dolc = $_POST['dateOfLastClaim'];

include("CarPolicy2.php");

$thisCarPolicy = new CarPolicy($pn, $yp);
$thisCarPolicy->setDateOfLastClaim($dolc);

echo "Yearly premium is: €" . $yp . "<br>";
echo "Discounted premium is: €" . $thisCarPolicy->getDiscountedPremium();
?>
