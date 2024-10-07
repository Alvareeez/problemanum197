<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descodificador</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            margin: 15px;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form {
            width: 100%;
        }

        .form-group {
            width: 80%;
        }

        .btn {
            width: 50%;
            margin-top: 10px;
        }

        .color {
            color: green;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center">
        <!-- First Card -->
        <div class="card col-md-5">
            <div class="card-body">
                <h5 class="card-title">X'' to X' and X' to X</h5>
                <form action="" method="get">
                    <div class="form-group">
                        <label for="x2">X'' to X' : </label>
                        <input type="text" class="form-control" id="x2" name="x2" placeholder="Valor a descifrar...">
                    </div>
                    <button type="submit" class="btn btn-primary">Descodificar</button>
                </form>
                <?php
                function x2tox1($x2)
                {
                    $n = strlen($x2);
                    $x1 = str_repeat(' ', $n);
                    $inicio = 0;
                    $fin = $n - 1;

                    for ($i = 0; $i < $n; $i++) {
                        if ($i % 2 == 0) {
                            $x1[$inicio] = $x2[$i];
                            $inicio++;
                        } else {
                            $x1[$fin] = $x2[$i];
                            $fin--;
                        }
                    }
                    return $x1;
                }

                if (isset($_GET['x2'])) {
                    $x2 = $_GET['x2'];
                    if (empty($x2)) {
                        echo "<script>alert('Por favor, introduzca un valor.');</script>";
                    } else {
                        $x1 = x2tox1($x2);
                        echo "<p class='mt-3 color'>Resultado (X'' to X'): " . $x1 . "</p>";
                    }
                }
                ?>

                <form action="" method="get">
                    <div class="form-group">
                        <label for="x1">X' to X : </label>
                        <input type="text" class="form-control" id="x1" name="x1" placeholder="Valor a descifrar...">
                    </div>
                    <button type="submit" class="btn btn-primary">Descodificar</button>
                </form>
                <?php
                function esVocal($letra)
                {
                    $vocales = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
                    return in_array($letra, $vocales);
                }

                function x1tox($x1)
                {
                    $x = "";
                    $consonantes = [];
                    $caracteres = str_split($x1);

                    foreach ($caracteres as $letra) {
                        if (esVocal($letra)) {
                            if (!empty($consonantes)) {
                                $x .= implode('', array_reverse($consonantes));
                                $consonantes = [];
                            }
                            $x .= $letra;
                        } else {
                            $consonantes[] = $letra;
                        }
                    }

                    if (!empty($consonantes)) {
                        $x .= implode('', array_reverse($consonantes));
                    }
                    return $x;
                }

                if (isset($_GET['x1'])) {
                    $x1 = $_GET['x1'];
                    if (empty($x1)) {
                        echo "<script>alert('Por favor, introduzca un valor.');</script>";
                    } else {
                        $x = x1tox($x1);
                        echo "<p class='mt-3 color'>Resultado (X' to X): " . $x . "</p>";
                    }
                }
                ?>
            </div>
        </div>

        <!-- Second Card -->
        <div class="card col-md-5">
            <div class="card-body">
                <h5 class="card-title">X'' to X</h5>
                <form action="" method="get">
                    <div class="form-group">
                        <label for="xplus">X'' to X : </label>
                        <input type="text" class="form-control" id="xplus" name="xplus" placeholder="Valor a descifrar...">
                    </div>
                    <button type="submit" class="btn btn-primary">Descodificar</button>
                </form>
                <?php
                function x2tox($xplus)
                {
                    $n = strlen($xplus);
                    $xplusres = str_repeat(' ', $n);
                    $inicio = 0;
                    $fin = $n - 1;

                    for ($i = 0; $i < $n; $i++) {
                        if ($i % 2 == 0) {
                            $xplusres[$inicio] = $xplus[$i];
                            $inicio++;
                        } else {
                            $xplusres[$fin] = $xplus[$i];
                            $fin--;
                        }
                    }

                    $xplusres2 = "";
                    $consonantes = [];
                    $caracteres = str_split($xplusres);

                    foreach ($caracteres as $letra) {
                        if (esVocal($letra)) {
                            if (!empty($consonantes)) {
                                $xplusres2 .= implode('', array_reverse($consonantes));
                                $consonantes = [];
                            }
                            $xplusres2 .= $letra;
                        } else {
                            $consonantes[] = $letra;
                        }
                    }

                    if (!empty($consonantes)) {
                        $xplusres2 .= implode('', array_reverse($consonantes));
                    }
                    return $xplusres2;
                }

                if (isset($_GET['xplus'])) {
                    $xplus = $_GET['xplus'];
                    if (empty($xplus)) {
                        echo "<script>alert('Por favor, introduzca un valor.');</script>";
                    } else {
                        $xplusres2 = x2tox($xplus);
                        echo "<p class='mt-3 color'>Resultado (X'' to X): " . $xplusres2 . "</p>";
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>