var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var vidas = 3;
var puntajeA = 0;
var puntaje = 0;
var nivel = 0;
var boton = document.getElementById("boton");



boton.addEventListener("click", iniciarJuego);

//Raqueta
var raqueta = {
    x: canvas.width / 2,
    y: canvas.height - 10,
    w: 70,
    h: 10,
    img: document.createElement("img"),
    derecha: false,
    izquierda: false,
    velocidad: 7
};
raqueta.img.src = "./img/imgArkanoid/prueba.png";
function dibujarRaqueta() {
    ctx.drawImage(raqueta.img, raqueta.x, raqueta.y);
}
function moverRaqueta() {
    if (raqueta.izquierda && raqueta.x < canvas.width - raqueta.w) {
        raqueta.x += raqueta.velocidad;
    }
    if (raqueta.derecha && raqueta.x > 0) {
        raqueta.x -= raqueta.velocidad;
    }
}

document.addEventListener("keydown", function () {
    if (event.keyCode == 39) {
        raqueta.izquierda = true;
    }
    if (event.keyCode == 37) {
        raqueta.derecha = true;
    }
});
document.addEventListener("keyup", function () {
    if (event.keyCode == 39) {
        raqueta.izquierda = false;
    }
    if (event.keyCode == 37) {
        raqueta.derecha = false;
    }
});
//Fin de la raqueta

//Pelota
var bola = {
    x: canvas.width / 2,
    y: canvas.height / 2,
    r: 10,
    xdir: 2,
    ydir: 2,
    color: "#e3a364"
};
function dibujarPelota() {
    ctx.fillStyle = bola.color;
    ctx.beginPath();
    ctx.arc(bola.x, bola.y, bola.r, 0, Math.PI * 2);
    ctx.fill();
}
function moverPelota() {
    bola.x += bola.xdir;
    bola.y += bola.ydir;
}
function nivelBola() {
    bola.x = canvas.width / 2;
    bola.y = canvas.height / 2;
    bola.xdir = Math.abs(bola.xdir);
    bola.ydir = Math.abs(bola.ydir);
    bola.xdir++;
    bola.ydir++;
}
//fin de la pelota

//bloques
var bloques = [];
var infoBloque = {
    ancho: 75,
    columnas: 5,
    filas: 3,
    alto: 20,
    margen: 5,
    top: 30,
    left: 30,
    img: document.createElement("img")
};
infoBloque.img.src = "./img/imgArkanoid/FINAL.png";
function crearBloques() {
    for (c = 0; c < infoBloque.columnas; c++) {
        bloques[c] = [];
        for (f = 0; f < infoBloque.filas; f++) {
            var bloqueX = infoBloque.left + (c * (infoBloque.ancho + infoBloque.margen));
            var bloqueY = infoBloque.top + (f * (infoBloque.alto + infoBloque.margen));
            bloques[c][f] = {x: bloqueX, y: bloqueY, status: 1};
        }
    }
}
crearBloques();
function dibujarBloques() {
    for (c = 0; c < infoBloque.columnas; c++) {
        for (f = 0; f < infoBloque.filas; f++) {
            if (bloques[c][f].status == 1) {
                ctx.drawImage(infoBloque.img, bloques[c][f].x, bloques[c][f].y);
            }
        }
    }
}
function colisionBloques() {
    for (c = 0; c < infoBloque.columnas; c++) {
        for (f = 0; f < infoBloque.filas; f++) {
            var bloqueA = bloques[c][f];
            if (bloqueA.status == 1) {
                if (bola.x > bloqueA.x && bola.x < (bloqueA.x + infoBloque.ancho) && bola.y > bloqueA.y && bola.y < (bloqueA.y + infoBloque.alto)) {
                    bloqueA.status = 0;
                    bola.ydir = -bola.ydir;
                    puntajeA++;
                    if (puntajeA == infoBloque.columnas * infoBloque.filas) {
                        aumentarNivel();
                    }
                }
            }
        }
    }
}
//finde los bloques



function aumentarNivel() {
    alert("Felicidades");
    nivel++;
    crearBloques();
    nivelBola();
    puntajeA = puntaje;
    puntajeA = 0;
}

function perderVida() {
    if (vidas > 0) {
        alert("Te mataste");
        vidas--;
    } else {
        alert("Fin de juego");
        findeJuego();
    }
}

function dibujarInfo() {
    ctx.fillStyle = "yellow";
    ctx.fillText("Vidas restantes : " + vidas, 5, 15);
    ctx.fillText("Nivel : " + nivel, canvas.width - 50, 15);
}
function findeJuego() {
    document.location.reload();
}
function dibujar() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    dibujarPelota();
    dibujarRaqueta();
    dibujarInfo();
    dibujarBloques();

}
function actualizar() {
    moverRaqueta();
    moverPelota();
}
function colisiones() {
    if (bola.x <= bola.r || bola.x >= canvas.width - bola.r)
        bola.xdir = -bola.xdir;
    if (bola.y <= 0)
        bola.ydir = -bola.ydir;
    if (bola.y >= canvas.height - bola.r) {
        bola.ydir = -bola.ydir;
        if (!(bola.x > raqueta.x && bola.x < raqueta.x + raqueta.w)) {
            perderVida();
        }
    }
    colisionBloques();
}
function frame() {
    actualizar();
    colisiones();
    dibujar();
    requestAnimationFrame(frame);
}
function iniciarJuego() {
    var modal = document.getElementById("modal");
    modal.style.display = "none";
    frame();
}