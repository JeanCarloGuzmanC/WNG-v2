document.addEventListener('DOMContentLoaded', function() {
    const crearAnuncioBtn = document.getElementById('crearAnuncioBtn');
    const modal = document.getElementById('crearAnuncioModal');
    const closeBtn = document.querySelector('.close');

    crearAnuncioBtn.addEventListener('click', function() {
        modal.style.display = 'block';
    });

    closeBtn.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });

    const crearAnuncioForm = document.getElementById('crearAnuncioForm');
    crearAnuncioForm.addEventListener('submit', function(event) {
        event.preventDefault(); 

        const titulo = document.getElementById('titulo').value;
        const descripcion = document.getElementById('descripcion').value;
        const lenguaje = document.getElementById('lenguaje').value;
        const precio = document.getElementById('precio').value;

        const nuevoAnuncio = document.createElement('div');
        nuevoAnuncio.classList.add('anuncio');
        nuevoAnuncio.innerHTML = `
            <span class="precio">Precio: $${precio}</span>
            <h3>${titulo}</h3>
            <p>Lenguaje: ${lenguaje}</p>
            <p>${descripcion}</p>
            <div class="comentarios">
                <h4>Comentarios</h4>
            </div>
            <form class="nuevo-comentario">
                <textarea placeholder="Escribe tu comentario"></textarea>
                <button type="submit">Comentar</button>
            </form>
        `;

        const mainContent = document.getElementById('mainContent');
        mainContent.appendChild(nuevoAnuncio);

        modal.style.display = 'none';

        crearAnuncioForm.reset();
    });

    document.addEventListener('submit', function(event) {
        event.preventDefault(); 

        const nuevoComentarioForm = event.target;
        const comentarioTexto = nuevoComentarioForm.querySelector('textarea').value;

        const nuevoComentario = document.createElement('div');
        nuevoComentario.classList.add('comentario');
        nuevoComentario.innerHTML = `
            <p>${comentarioTexto}</p>
        `;

        const comentariosContainer = nuevoComentarioForm.previousElementSibling;
        comentariosContainer.appendChild(nuevoComentario);

        nuevoComentarioForm.reset();
    });
});
