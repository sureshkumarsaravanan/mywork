<?php
/**
Script to resolve the below scenario
-------------------------------------
Some computer programs try to prevent easily guessable passwords being used, 
by rejecting those that do not meet some simple rules. 
One simple rule is to reject passwords which contain any sequence of letters immediately 
followed by the same sequence.

For example:
APPLE Rejected (P is repeated)
CUCUMBER Rejected (CU is repeated)
ONION Accepted (ON is not immediately repeated)
APRICOT Accepted

* @author Suresh Kumar <suresvelan@gmail.com>
* @copyright (c) 2015, Suresh Kumar
*/
function validate( $string ) 
{
    $length = strlen($string);
    $divident = floor( $length / 2 );
    
    for ( $i=1; $i<=$divident; $i++ ) {
        $compare = '';
        for ( $j=0; $j<$length;) {
            if ( $compare == substr($string, $j, $i) && $compare != '' ) {
                return false;
            }
            $compare = substr($string, $j, $i);
            $j = $j+$i;
        }
    }
    return true;
}

print "Enter string: ";

$handle   = fopen ("php://stdin","r");
$password = fgets($handle);

echo "You entered: $password";

if ( validate( trim($password) ) ) {
    echo "\nValid password\n";
} else {
    echo "\nInvalid password one or more characters repeated\n";
}
