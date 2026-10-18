
const formulario = document.querySelector("form");
const campos = formulario.querySelectorAll(
    'input[type="number"]'
);

formulario.addEventListener("reset", function () {
    // Remove o resultado anterior quando os campos são limpos.
    const resultado = document.querySelector(".resultado");

    if (resultado) {
        resultado.remove();
    }
});

campos.forEach(function (campo) {
    campo.addEventListener("input", function () {
        campo.setCustomValidity("");
    });
});
