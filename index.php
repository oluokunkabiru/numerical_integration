<?php
// PHP Program to decompose
// a matrix into lower and
// upper triangular matrix
$MAX = 100;
 
function luDecomposition($mat, $n)
{
    $lower=[];
    $upper=[];
    for($i = 0; $i < $n; $i++){
        for($j = 0; $j < $n; $j++)
        {
            $lower[$i][$j]= 0;
            $upper[$i][$j]= 0;
        }
    }
    // Decomposing matrix
    // into Upper and Lower
    // triangular matrix
    for ($i = 0; $i < $n; $i++)
    {
 
        // Upper Triangular
        for ($k = $i; $k < $n; $k++)
        {
 
            // Summation of
            // L(i, j) * U(j, k)
            $sum = 0;
            for ($j = 0; $j < $i; $j++){
                $sum += ($lower[$i][$j] *
                         $upper[$j][$k]);
            }
 
            // Evaluating U(i, k)
            $upper[$i][$k] = $mat[$i][$k] - $sum;
        }
 
        // Lower Triangular
        for ($k = $i; $k < $n; $k++)
        {
            if ($i == $k)
                $lower[$i][$i] = 1; // Diagonal as 1
            else
            {
 
                // Summation of L(k, j) * U(j, i)
                $sum = 0;
                for ($j = 0; $j < $i; $j++){
                    $sum += ($lower[$k][$j] *
                             $upper[$j][$i]);
                }
 
                // Evaluating L(k, i)
                $lower[$k][$i] = (int)(($mat[$k][$i] -
                                $sum) / $upper[$i][$i]);
            }
        }
    }
 
    // setw is for
    // displaying nicely
   
 
    // Displaying the result :
    echo "<br>Lower Triangular<br>";
    echo "<table>";
    for ($i = 0; $i < $n; $i++)
    {
        // Lower
        echo "<tr>";
        for ($j = 0; $j < $n; $j++){
            echo "<td>" . $lower[$i][$j] . " </td>";
        echo " ";
        }
        echo "</tr>";
        
        // Upper
        for ($j = 0; $j < $n; $j++){
            // echo $upper[$i][$j] . " ";
        }
        echo "";
    }
    echo "</table>";


    echo "<br>Upper Triangular<br>";
    echo "<table>";
    for ($i = 0; $i < $n; $i++)
    {
      
         echo "<tr>";
        // Upper
        for ($j = 0; $j < $n; $j++){
            echo "<td>". $upper[$i][$j] . " </td>";
        }
        echo "</tr>";
    }
    echo "</table>";

}
 
// Driver code
$mat = [[ 7,  3, -1,  2],
[ 3,  8,  1, -4],
[-1,  1,  4, -1],
[ 2, -4, -1,  6]];

// array(array(2, -1, -2),
//              array(-4, 6, 3),
//              array(-4, -2, 8));
 
luDecomposition($mat, 4);
 
// This code is contributed by mits
