<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de satisfacción</title>
    <link rel="icon" href="{{ asset('FiscaliaLogo.jpeg') }}" type="image/x-icon" />
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <style>
        .card {
            border-radius: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .hidden {
            display: none;
        }

        .logo-card {
            position: fixed;
            top: 15px;
            left: 50%;
            transform: translateX(-50%);
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.295);
            max-height: 100px;
            height: auto;
        }
    </style>
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <img class="logo-card" src="{{ asset('logoazul.png') }}" alt="Logo Fiscalía">

    <div class="container">
        <div class="text-center pb-4">
            <h1>Formulario de Satisfacción</h1>
            <span>Curso en Materia de Violencia de Género</span>
        </div>

        <div class="card p-4">
            <!-- Barra de progreso -->
            <div class="progress mb-3">
                <div id="progress-bar" class="progress-bar progress-bar-striped bg-success" role="progressbar"
                    style="width: 0%">
                    0%
                </div>
            </div>

            <!-- Contenido -->
            <form id="formulario" method="POST" action="{{ route('formulario.guardar') }}">
                @csrf

                <!-- Pregunta 1 -->
                <div class="step">
                    <h5>1. Por favor, califique su nivel de satisfacción alcanzado con el curso.</h5>
                    <select class="form-select" name="p1" required>
                        <option value="">Seleccione...</option>
                        <option>Excelente</option>
                        <option>Sobresaliente</option>
                        <option>Bueno</option>
                        <option>Regular</option>
                        <option>Malo</option>
                    </select>
                </div>

                <!-- Pregunta 2 -->
                <div class="step hidden">
                    <h5>2. ¿Cree que la duración del curso fue lo suficientemente adecuada para satisfacer sus
                        expectativas de formación?</h5>
                    <div>
                        <input type="radio" class="btn-check" name="p2" value="Si" id="p2si">
                        <label class="btn btn-outline-success me-2" for="p2si">Sí</label>

                        <input type="radio" class="btn-check" name="p2" value="No" id="p2no">
                        <label class="btn btn-outline-danger" for="p2no">No</label>
                    </div>
                </div>

                <!-- Pregunta 3 -->
                <div class="step hidden">
                    <h5>3. ¿Cómo calificaría la formación impartida por las instructoras?</h5>
                    <select class="form-select" name="p3" required>
                        <option value="">Seleccione...</option>
                        <option>Excelente</option>
                        <option>Sobresaliente</option>
                        <option>Bueno</option>
                        <option>Regular</option>
                        <option>Malo</option>
                    </select>
                </div>

                <!-- Pregunta 4 -->
                <div class="step hidden">
                    <h5>4. ¿Las instructoras han proporcionado ejemplos y contextualizado la formación?</h5>
                    <select class="form-select" name="p4" required>
                        <option value="">Seleccione...</option>
                        <option>Sí</option>
                        <option>No</option>
                        <option>No en todos los casos</option>
                    </select>
                </div>

                <!-- Pregunta 5 -->
                <div class="step hidden">
                    <h5>5. ¿Cual ha sido la actividad que más le ha aportado en la formación?</h5>
                    <textarea class="form-control" name="p5" rows="3" required></textarea>
                </div>

                <!-- Pregunta 6 -->
                <div class="step hidden">
                    <h5>6. ¿La formación impartida le ha resultado útil para el desarrollo de su trabajo diario?</h5>
                    <div>
                        <input type="radio" class="btn-check" name="p6" value="Si" id="p6si">
                        <label class="btn btn-outline-success me-2" for="p6si">Sí</label>

                        <input type="radio" class="btn-check" name="p6" value="No" id="p6no">
                        <label class="btn btn-outline-danger" for="p6no">No</label>
                    </div>
                </div>

                <!-- Pregunta 7 -->
                <div class="step hidden">
                    <h5>7. ¿Tiene alguna sugerencia de mejora para el curso?:</h5>
                    <textarea class="form-control" name="p7" rows="3" required></textarea>
                </div>

                <!-- Botón continuar -->
                <div class="d-flex justify-content-end mt-3">
                    <button type="button" id="nextBtn" class="btn btn-primary" disabled>Siguiente</button>
                    <button type="submit" id="submitBtn" class="btn btn-success hidden" onclick="endProgress()">
                        <span id="spinner" class="spinner-border spinner-border-sm hidden"></span>
                        Enviar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const steps = document.querySelectorAll(".step");
        const nextBtn = document.getElementById("nextBtn");
        const submitBtn = document.getElementById("submitBtn");
        const progressBar = document.getElementById("progress-bar");
        const form = document.getElementById("formulario");
        const spinner = document.getElementById("spinner");
        const thankyou = document.getElementById("thankyou");

        let currentStep = 0;

        function updateProgress() {
            let percent = Math.round(((currentStep) / steps.length) * 100);
            progressBar.style.width = percent + "%";
            progressBar.innerText = percent + "%";
        }

        function endProgress() {
            let percent = 100;
            spinner.classList.remove("hidden");
            progressBar.style.width = percent + "%";
            progressBar.innerText = percent + "%";
        }

        function validateStep() {
            const inputs = steps[currentStep].querySelectorAll("input, select, textarea");
            let valid = false;
            inputs.forEach(el => {
                if ((el.type === "radio" && el.checked) || (el.type !== "radio" && el.value.trim() !== "")) {
                    valid = true;
                }
            });
            nextBtn.disabled = !valid;
        }

        steps[currentStep].classList.remove("hidden");
        updateProgress();
        steps[currentStep].addEventListener("input", validateStep);

        nextBtn.addEventListener("click", () => {
            steps[currentStep].classList.add("hidden");
            currentStep++;
            if (currentStep < steps.length) {
                steps[currentStep].classList.remove("hidden");
                updateProgress();
                validateStep();
                steps[currentStep].addEventListener("input", validateStep);
            }
            if (currentStep === steps.length - 1) {
                nextBtn.classList.add("hidden");
                submitBtn.classList.remove("hidden");
            }
        });
    </script>
</body>

</html>
