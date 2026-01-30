<?php
$titulo = "Página no encontrada";
?>

<div class="contenedor error-404">
    <div class="error-content">
        <h1>404</h1>
        <h2>Página no encontrada</h2>
        <p>Lo sentimos, la página que estás buscando no existe o ha sido movida.</p>
        <div class="error-actions">
            <a href="/" class="boton boton-primario">Volver al inicio</a>
            <a href="/notas-prensa" class="boton boton-secundario">Ver notas de prensa</a>
            <a href="/novedades" class="boton boton-secundario">Ver novedades</a>
        </div>
    </div>
</div>

<style>
.error-404 {
    min-height: 70vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 2rem;
}

.error-content h1 {
    font-size: 8rem;
    font-weight: bold;
    color: var(--color-primario);
    margin: 0;
    line-height: 1;
}

.error-content h2 {
    font-size: 2rem;
    margin: 1rem 0;
    color: var(--color-texto);
}

.error-content p {
    font-size: 1.2rem;
    color: var(--color-texto-secundario);
    margin-bottom: 2rem;
}

.error-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.boton-primario {
    background-color: var(--color-primario);
    color: white;
    padding: 0.8rem 2rem;
    border-radius: 4px;
    text-decoration: none;
    transition: background-color 0.3s;
}

.boton-secundario {
    background-color: var(--color-secundario);
    color: white;
    padding: 0.8rem 2rem;
    border-radius: 4px;
    text-decoration: none;
    transition: background-color 0.3s;
}

.boton-primario:hover,
.boton-secundario:hover {
    opacity: 0.9;
}
</style> 