<?php
function isLoanListNotEmpty($loan) {
    $loanslist = $loan->find([]);
    // Use iterator_to_array to check if the cursor has any documents
    $loansArray = iterator_to_array($loanslist);
    return !empty($loansArray);
}