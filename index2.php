<?php


// $EPSILON = 0.01;
define('EPSILON', 0.01);
 
// An example function whose
// solution is determined
// using Bisection Method.
// The function is x^3 - x^2 + 2
function func($x)
{
    return $x * $x * $x -
           $x * $x + 2;
}
 
// Prints root of func(x)
// with error of EPSILON
function bisection($a, $b)
{
    // EPSILON;
    if (func($a) *
        func($b) >= 0)
    {
        echo "<h2 class='text-danger'> have not assumed " .
                 "right a and b</h2>You";
        // return;
    }
 
    $i = 1;
    $c = $a;
    while (($b - $a) >= EPSILON)
    {
        // Find middle point
        $c = ($a + $b) / 2;
 
        // Check if middle
        // point is root
        if (func($c) == 0.0){
            break;
 
        // Decide the side to
        // repeat the steps
        }elseif(func($c) * func($a) < 0){

            $b = $c;
        }
        else{
            $a = $c;
        }

        echo "<tr><td>$i</td>  <td>$a</td>  <td>$b  </td> <td>$c</td> ";

        $i++;
    }
    echo " <h3 class='font-weight-bold text-success my-2 py-2'>The value of root is : $c</h3>  " ;
}
 
// Driver Code
 
// Initial values assumed
// $a =-200;
// $b = 300;
$a = $_GET['a'];
$b = $_GET['b'];



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Bisection Method to implement non-linear equation</title>
    <link rel="stylesheet" href="bootsrap/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="chart/Chart.min.css">
</head>

<body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-uppercase card-title font-weight-bold text-center">Names Goes here
                    </h3>
                    <h6 class="font-weight-bold text-center">Matric Numbers Goes here</h6>

                </div>
                <div class="card-body">
                    <h5 class="text-center text-italic">Course <span class="font-weight-bold text-uppercase">CSE
                            405</span> </h5>
                    <h6 class="text-center text-italic">Topic : <span class="font-weight-bold text-upperse">Bisection Method to implement non-linear equation </span> </h6>


                    <h4 class="text-center text-italic">Supervised by <span class="font-weight-bold text-uppercase">Supervisor goes here</span> </h4>



                    

                    <div class="container">
                    <?php if (isset($_GET['a']) && ! empty($_GET['a']) && isset($_GET['b']) && ! empty($_GET['b']) ){ ?>
                        <div class="card">
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                    
                                  
                                    <td>S/N</td>
                                    <td>A</td>
                                    <td>B</td>
                                    <td>C</td>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    <?php 

                                    $root = bisection($_GET['a'], $_GET['b']);;
                                    
                                    // print_r(label());
                                    ?>
                                </tbody>
                            </table>

                            <div class="card-footer">
                            </div>
                        </div>


                        <!-- <div class="card-body">
                            <canvas id="graphy"></canvas>
                          </div> -->


                        <?php } ?>
                    </div>

                    <div class="row mt-4">
                        
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form id="simpsonform">
                        <div class="form-group">
                            <label for="email">Function  <i>f(a)</i> </label>
                            <input type="number" class="form-control" step="0.01" name="a" value="<?= $_GET['a']??"" ?>" id="lowerlimit">
                            <span class="lerror text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Function  <i>f(b)</i></label>
                            <input type="number" class="form-control" step="0.01" name="b"  value="<?= $_GET['b']??"" ?>" id="upperlimit">
                            <span class="uerror text-danger"></span>
                        </div>
                       

                        <!-- <h2 id="generate" class="btn btn-primary">Submit</h2> -->
                        <button type="submit" class="btn btn-secondary">Generate Bisecion Table</button>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>


                </div>


            </div>
        </div>
    </div>



    <script src="bootsrap/jquery.js"></script>
    <script src="bootsrap/popper.js"></script>
    <script src="bootsrap/bootstrap.min.js"></script>
    <script src="chart/chart.min.js"></script>
    <!-- <script src="chart/chart-config.js"></script> -->

    <script>
new Chart($("#graphy"), {
    type: 'line',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: 'Newton Ramson Graphy',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
    </script>
</body>

</html>