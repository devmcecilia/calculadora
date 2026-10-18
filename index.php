
<?php
$resultado = null;
$erro = "";

$num1 = "";
$num2 = "";
$ope = "+";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $num1 = $_POST["numero1"] ?? "";
    $num2 = $_POST["numero2"] ?? "";
    $ope = $_POST["operacao"] ?? "+";

    if (
        $num1 === "" ||
        $num2 === "" ||
        !is_numeric($num1) ||
        !is_numeric($num2)
    ) {
        $erro = "Digite dois números válidos!";
    } else {
        $a = floatval($num1);
        $b = floatval($num2);

        switch ($ope) {
            case "+":
                $resultado = $a + $b;
                break;

            case "-":
                $resultado = $a - $b;
                break;

            case "*":
                $resultado = $a * $b;
                break;

            case "/":
                if ($b == 0) {
                    $erro = "Não é possível dividir por zero!";
                } else {
                    $resultado = $a / $b;
                }
                break;

            default:
                $erro = "Operação inválida!";
                break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Calculadora PHP</title>

    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
</head>
<body>

    <main class="calculadora">
        <h1>Calculadora</h1>
        <p class="subtitulo">Seus cálculos de forma simples.</p>

        <form method="POST">
            <label for="numero1">Primeiro número</label>
            <input
                type="number"
                step="any"
                name="numero1"
                id="numero1"
                value="<?= htmlspecialchars((string)$num1) ?>"
                required
            >

            <label for="operacao">Operação</label>
            <select name="operacao" id="operacao">
                <option value="+" <?= $ope === "+" ? "selected" : "" ?>>
                    Adição (+)
                </option>

                <option value="-" <?= $ope === "-" ? "selected" : "" ?>>
                    Subtração (-)
                </option>

                <option value="*" <?= $ope === "*" ? "selected" : "" ?>>
                    Multiplicação (×)
                </option>

                <option value="/" <?= $ope === "/" ? "selected" : "" ?>>
                    Divisão (÷)
                </option>
            </select>

            <label for="numero2">Segundo número</label>
            <input
                type="number"
                step="any"
                name="numero2"
                id="numero2"
                value="<?= htmlspecialchars((string)$num2) ?>"
                required
            >

            <button type="submit">Calcular</button>

            <button type="reset" class="botao-secundario">
                Limpar campos
            </button>
        </form>

        <?php if ($erro !== ""): ?>
            <div class="resultado erro" role="alert">
                <?= htmlspecialchars($erro) ?>
            </div>

        <?php elseif ($resultado !== null): ?>
            <div class="resultado" aria-live="polite">
                <span>Resultado</span>

                <strong>
                    <?= htmlspecialchars((string)$resultado) ?>
                </strong>
            </div>
        <?php endif; ?>

    </main>

</body>
</html>
