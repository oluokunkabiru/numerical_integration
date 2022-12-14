<?php

function func($x)
{
    $value = $x ** 2 - 2;
    return $value;
}



function deriv($d)
{
    return 2 * $d;
}


function label($label = []){
    return $label;
}


function newton($fuc, $der, $x0, $tolerance, $max_iter = 100)
{
    $x1 = 0;

    if (abs($x0 - $x1) <= $tolerance && abs(($x0 - $x1) / $x0) <= $tolerance) {
        return $x0;
    } else {
        
        $k = 1;
        $i = 1;
        while ($k <= $max_iter) {
            $x1 = $x0 - (func($x0) / deriv($x0));

            echo "
            <tr>
           
            <td>$k</td>
            <td>$x0</td>
            <td>$x1</td>
            <td>" . func($x1) . "</td>
            </tr>";

            // K=$k \t X0= $x0 \t X1 = $x1 Function = ". func($x1);

            if (abs($x0 - $x1) <= $tolerance && abs(($x0 - $x1) / $x0) <= $tolerance) {
                return $x1;
            }
            $x0 = $x1;
            $k = $k + 1;
            if ($k > $max_iter) {
                return $x1;
            }
            // $label[] = $k;
            // label($k);
            // echo $x1;
            $i++;
            # plt.plot(x0, function(x0), 'or')
        }
      
    }
}




// $sqrt = newton(func(2), deriv(2), 1.7, 0.0000001);
// print("The approximate value of x is: ". ($sqrt))


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newton Ramson Method</title>
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
                    <h6 class="text-center text-italic">Topic : <span class="font-weight-bold text-upperse">Newton Ramson Method </span> </h6>


                    <h4 class="text-center text-italic">Supervised by <span class="font-weight-bold text-uppercase">Supervisor goes here</span> </h4>



                    

                    <div class="container">
                    <?php if (isset($_GET['fx']) && ! empty($_GET['fx']) && isset($_GET['derivative']) && ! empty($_GET['derivative']) ){ ?>
                        <div class="card">
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                    
                                  
                                    <td>K</td>
                                    <td>X0</td>
                                    <td>X1</td>
                                    <td>Function(X)</td>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    <?php 

                                    $sqrt = newton(func($_GET['fx']), deriv($_GET['derivative']), 1.7, 0.0000001);
                                    
                                    print_r(label());
                                    ?>
                                </tbody>
                            </table>

                            <div class="card-footer">
                                <h3><?= "The approximate value of x is: ". ($sqrt) ?></h3>
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
                            <label for="email">Function  <i>f(x)</i>  Value</label>
                            <input type="number" class="form-control" step="0.01" name="fx" value="<?= $_GET['fx']??"" ?>" id="lowerlimit">
                            <span class="lerror text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Derivative Value</label>
                            <input type="number" class="form-control" step="0.01" name="derivative"  value="<?= $_GET['derivative']??"" ?>" id="upperlimit">
                            <span class="uerror text-danger"></span>
                        </div>
                       

                        <!-- <h2 id="generate" class="btn btn-primary">Submit</h2> -->
                        <button type="submit" class="btn btn-secondary">Generate Ramson Table</button>
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