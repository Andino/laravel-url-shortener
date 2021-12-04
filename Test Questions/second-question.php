<?php /**
* Write a function that validates a Universal Product Code (UPC).
*
* UPC codes are always 12 numeric digits.
*
* The final digit of a UPC is a check digit computed as follows:
*
* 1. Add the digits in the odd-numbered positions from the right (first, third, fifth, etc. - not
including the check
* digit) together and multiply by three.
* 2. Add the digits (up to but not including the check digit) in the even-numbered positions
(second, fourth, sixth,
* etc.) to the result.
* 3. Take the remainder of the result divided by 10 (ie. the modulo 10 operation). If the
remainder is equal to 0 then
* use 0 as the check digit, and if not 0 subtract the remainder from 10 to derive the check
digit.
*
* Example 1:
* - Input: 012345678905
* - Output: true
*
* Example 2:
* - Input: 01234567a905
* - Output: false
*
* Example 3:
* - Input: 036000241457
* - Output: true
*
* Example 4:
* - Input: 01
* - Output: false
*
* Example 5:
* - Input: 010101010105
* - Output: true
*
* @param string $upc
*
* @return bool
*/
function isValid(string $upc): bool
{
    $splitted_values = str_split($upc);
    $stringLength = count($splitted_values);
    $oddValue = 0;
    $evenValue = 0;
    foreach($splitted_values as $key => $value){
        if(count($splitted_values)- 1 == $key){
            break;
        }
        else if($value % 2 ){
            $evenValue += $value;
        } else {
            $oddValue += $value;
        }
    }
    $oddValue = $oddValue * 3;
    $totalValue = $oddValue + $evenValue;
    $isDivided = $totalValue % 10;
    if($isDivided == 0){
        $check_digit = 0;
    } else{
        $check_digit = $isDivided;
    }
    
    
    if($stringLength == 12 && $splitted_values[$stringLength-1] == $check_digit){
        return true;
    }
    return false;
}

$UPC = '010101010105';
var_dump(isValid($UPC));