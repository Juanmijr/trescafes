var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var vidas = 3;
var puntajeA = 0 ;
var puntaje = 0 ; 
var boton = document.getElementById("boton");

boton.addEventListener("click", iniciarJuego);

//JUGADOR
var jugador = {
    x: canvas.width/2,
    y: canvas.height-10,
    w: 70,
    h: 10,
    img : document.createElement("img"),
    derecha : false,
    izquierda : false,
    velocidad : 7,
    atrapado : false
};

jugador.img.src = "img/prueba.png";

function dibujarJugador(){
    
    ctx.drawImage(jugador.img, jugador.x, jugador.y);
    
}
function moverJugador(){
    if (jugador.izquierda && jugador.x < canvas.width - jugador.w ){
        jugador.x += jugador.velocidad;
    }
    if (jugador.derecha && jugador.x >0){
        jugador.x -= jugador.velocidad;
    }
}

document.addEventListener("keydown", function(){

    if (event.keyCode == 39){
        jugador.izquierda = true;
    }
    if (event.keyCode == 37){
        jugador.derecha = true;

    }

});

document.addEventListener("keyup", function(){
    if (event.keyCode == 39){
        jugador.izquierda = false;
    }
    if (event.keyCode == 37){
        jugador.derecha = false;

    }
});
//Fin del jugador


//INICIO OBJETO

var objetos = [];
function crearObjetos (){
    for (i = 0 ; i< 10; i++){

        objetos[i] = {
            tipoObjeto : (Math.round(Math.random())),
            x: Math.random() * (canvas.width),
            y: 0,
            w: 70,
            h: 10,
            img : document.createElement("img"),
            status : 1 ,
            velocidad : 2,
            
        };
        
       
    }
}

crearObjetos();
for (i = 0 ; i<10 ; i++){
    if (objetos[i].tipoObjeto == 0){
        objetos[i].img.src = "img/bomba.png";
    }
    else{
        objetos[i].img.src = "img/FINAL.png";
    }
    
}


function dibujarObjetos (){
    for (i=0; i<10; i++){
        if (objetos[i].status == 1 ){
            ctx.drawImage(objetos[i].img, objetos[i].x, objetos[i].y);
        }
      
    }
}

function moverObjetos(){
    for (i=0; i<10; i++){
        
var bolaTerminada ; 
        
        if ( objetos[i].y < canvas.width + objetos[i].w || jugador.atrapado == false ){
            objetos[i].y += objetos[i].velocidad;
        }

        else{
            if (jugador.atrapado == true){
                objetos[i].status = 0 ; 
                puntaje += 10;
                bolaTerminada = true;
                
            }
            else{
                objetos[i].status = 0;
                perderVida();
                bolaTerminada == true;
            }
        }

       
    }
}



//FIN OBJETO




function dibujar(){
    ctx.clearRect(0,0,canvas.width, canvas.height);
    dibujarJugador();
    dibujarInfo();
    dibujarObjetos();
}
function actualizar(){
    moverJugador();
    moverObjetos();

}
function colisiones(){

for ( i = 0 ; i<10 ; i++){
    if (objetos[i].y == jugador.y && objetos[i].x == jugador.x){
        if (objetos[i].tipoObjeto==0){
            perderVida();
            
        }
        else{
          persona.atrapado = true;
        }
         
}
else{
    if (objetos[i].y>= canvas.width ){
        perderVida();
        
    }
}
  
}

    
}
function playSonido(){

}
function perderVida(){
    if (vidas >0){
        vidas--;
        alert("Te matastes");
    }
    else {
        findeJuego();
        alert("Fin de juego");
        
    }
}
function findeJuego(){
    document.location.reload();
}

function dibujarInfo(){
    ctx.fillStyle = "blue";
    ctx.fillText("Vidas restantes: "+ vidas, 5, 15);
    ctx.fillText("Puntos: " + puntaje, canvas.width-50, 15);

}
function frame(){
    actualizar();
    colisiones();
    dibujar();
    requestAnimationFrame(frame);
}

function iniciarJuego(){
    var modal = document.getElementById("modal");
    modal.style.display = "none";
    frame();
}