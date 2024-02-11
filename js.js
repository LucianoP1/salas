//Motor DOM
document.addEventListener("DOMContentLoaded", function() {
    if (window.location.pathname.includes('index.php')){
        cambiarImagen()
        document.addEventListener('shown.bs.modal', function () {
            document.querySelector('input[placeholder="Usuario"]').focus();
        });
        let toastTrigger = document.getElementById('liveToastBtn')
        let toastLiveExample = document.getElementById('liveToast')
        if (toastTrigger) {
        toastTrigger.addEventListener('click', () => {
            const toast = new bootstrap.Toast(toastLiveExample)

            toast.show()
        })
        }
}   else if (window.location.pathname.includes('Ticket/ventas.php')) {
    tomaCant()
    document.getElementById('canPersonas').addEventListener('input', function(){
        let canPer = this.value;
        let chkDec = document.getElementById('chkDesayuno');
        let chkAlm = document.getElementById('chkAlmuerzo');
        let chkBar = document.getElementById('chkBarra');
        let inputDec = document.getElementById('cantidadDesayuno');
        let textDec = document.getElementById('desayunoText');
        let inputAlm = document.getElementById('cantidadAlmuerzo');
        let textAlm = document.getElementById('almuerzoText');
        let inputBar = document.getElementById('cantidadBarra');
        let textBar = document.getElementById('barraText');
        
        inputDec.setAttribute('max',this.value);
        inputAlm.setAttribute('max',this.value);
        inputBar.setAttribute('max',this.value);

        checkVal()

        document.getElementById('chkDesayuno').addEventListener('click', function(){
            if (this.checked) {
                validaChk(chkDec, inputDec, textDec);
            }else {
                let inputDec = document.getElementById('cantidadDesayuno');
                inputDec.value = '0';
                calMonto();
                checkVal()
                validaChk(chkDec, inputDec, textDec);
            }
        })

        document.getElementById('chkAlmuerzo').addEventListener('click', function(){
            if (this.checked) {
                validaChk(chkAlm, inputAlm, textAlm);
            }else {
                let inputAlm = document.getElementById('cantidadAlmuerzo');
                inputAlm.value = '0';
                calMonto();
                checkVal()
                validaChk(chkAlm, inputAlm, textAlm);
            }  
        })

        document.getElementById('chkBarra').addEventListener('click', function(){
            if (this.checked) {
                validaChk(chkBar, inputBar, textBar);
            }else {
                let inputBar = document.getElementById('cantidadBarra');
                inputBar.value = '0';
                calMonto();
                checkVal()
                validaChk(chkBar, inputBar, textBar);
            }  
            
        })
        if (canPer > '1') {
            calMonto();
        } 
    })  

   //Verifica cantidad y envia input a funcion de calculo
    document.getElementById('cantidadDesayuno').addEventListener('input', function(){
        calMonto();
    })  
    document.getElementById('cantidadAlmuerzo').addEventListener('input', function(){
        calMonto();
    })  
    document.getElementById('cantidadBarra').addEventListener('input', function(){
        calMonto();
    })  
} else if (window.location.pathname.includes('Ticket/checkout.php')) {
    alert("hola")
}
}) 



if (window.location.pathname.includes('index.php')){
    document.querySelector("#carouselExample").addEventListener('slid.bs.carousel', function() {
        cambiarImagen();
    });
}

//Carga imagen y texto
function cambiarImagen() {
    let imagenActiva = document.querySelector("#carouselExample .carousel-item.active img");
    let titulo = document.getElementById("tituloTexto");
    let texto = document.getElementById("texto");
    let idImgActiva = imagenActiva.getAttribute("id");

    switch (idImgActiva) {
        case "1":
            titulo.textContent = "Sala TechComfort";    
            texto.textContent = "Disfrute de nuestras instalaciones de última generación reservando nuestra sala de reuniones diseñada para recibir cómodamente hasta 10 personas. Con vista panorámica a la ciudad, este espacio se encuentra equipado con sillas ergonómicas y un tv 60 pulgadas que añade un toque impactante a sus reuniones.";
            break;
        case "2":
            titulo.textContent = "Sala SmartLuxury";   
            texto.textContent = "Experimente la excelencia en nuestras instalaciones al reservar nuestra espaciosa sala de reuniones, diseñada para albergar a grupos de hasta 12 personas. Aquí, la comodidad y la funcionalidad se encuentran en perfecto equilibrio, con asientos ergonómicos y diseño que garantiza que su equipo se sienta a gusto mientras colabora de manera efectiva. Además de las comodidades estándar, nuestra sala le ofrece el control total sobre la iluminación y la temperatura ambiente, permitiéndole personalizar el entorno según sus preferencias. La conectividad de vanguardia sigue siendo un pilar fundamental, junto con una impresionante tv de 60 pulgadas que agrega un toque moderno a sus presentaciones.";
            break;
        case "3":
            titulo.textContent = "Sala EliteElegance";   
            texto.textContent = "Sumérjase en el lujo y la sofisticación reservando nuestra exclusiva sala de reuniones, diseñada para albergar cómodamente hasta 16 personas. Este espacio elegante ofrece una experiencia única donde la opulencia se encuentra con la funcionalidad. La sala va más allá al brindarle el control total sobre la iluminación y la calefacción, permitiéndole personalizar el ambiente según sus preferencias. Además de estas características destacadas, la sala cuenta con asientos cómodos que complementan la estética elegante del espacio combinado con un avanzado sistema de proyección y audio cine. Este entorno exclusivo es perfecto para reuniones ejecutivas, presentaciones de alto impacto o sesiones estratégicas donde la elegancia y el rendimiento se fusionan de manera armoniosa.";
            break;
        default:
            titulo.textContent = "";   
            texto.textContent = "";
    }
}

//Carga valor de cada boton y redirecciona
function btnReserva(opcion){
    let Cant="0";
    switch (opcion) {
        case '1':
            Cant = "10";
            window.location.href = './Ticket/ventas.php?max=' + Cant;
        break;
        case '2':
            Cant = "12";
            window.location.href = './Ticket/ventas.php?max=' + Cant;
        break;
        case '3':
            Cant = "16";
            window.location.href = './Ticket/ventas.php?max=' + Cant;
        break;
    }
}

//Toma parametro de valor maximo
function tomaCant(){
    let urlParam = new URLSearchParams(window.location.search);
    let variableRec = urlParam.get('max');
    cantPersonas = document.getElementById('canPersonas');
    cantPersonas.setAttribute('max',variableRec);
}

//Verifica checkbox y activa o desactiva input y texto.
function validaChk (chk, inputVar, text) {
        if (chk.checked){
            inputVar.style.display = 'block';
            text.style.display = 'block';
        } else {
            inputVar.style.display = 'none';
            text.style.display = 'none';
        }
}

//Funcion que activa o desactiva checkbox
function checkVal() {

    let chkDec = document.getElementById('chkDesayuno');
    let chkAlm = document.getElementById('chkAlmuerzo');
    let chkBar = document.getElementById('chkBarra');
    let btnR = document.getElementById('btnReservar');

    if (document.getElementById('canPersonas').value > "1"){
        chkDec.disabled = false;
        chkAlm.disabled = false;
        chkBar.disabled = false;
        btnR.disabled = false;
    } else {
        chkDec.disabled = true;
        chkAlm.disabled = true;
        chkBar.disabled = true;
        btnR.disabled = true;
    }
}

//Funcion Calcular valores
function calMonto() {
    let cantPer = '0';
    let cantDec = '0';
    let cantAlm = '0';
    let cantBar = '0';
    
    let varPer = document.getElementById('canPersonas').value;
    if (varPer !== '') {
        cantPer = parseInt(varPer) * '8';
    }
    let varDec = document.getElementById('cantidadDesayuno').value;
    if (varDec !== '') {
        cantDec = parseInt(varDec) * '5';
    }
    let varAlm = document.getElementById('cantidadAlmuerzo').value;
    if (varAlm !== '') {
        cantAlm = parseInt(varAlm) * '10';
    }
    let varBar = document.getElementById('cantidadBarra').value;
    if (varBar !== '') {
        cantBar = parseInt(varBar) * '8';
    }

    let varTotal = parseInt(cantPer) + parseInt(cantDec) + parseInt(cantAlm) + parseInt(cantBar);
    let Total = document.getElementById("Total");
    Total.innerText="Total= $" + varTotal;
    Total.style.display = "block";
    
}
// Modal bootstrap editar 
const editM = document.getElementById('editModal');
if (editM) {
    editM.addEventListener('show.bs.modal', event => {
    // Boton del modal
    const button = event.relatedTarget;
    // Extra info del usuario
    let name = button.getAttribute('nameToEdit');
    let id = button.getAttribute('idToEdit');
    let tel = button.getAttribute('telToEdit');
    let dir = button.getAttribute('dirToEdit');
    let baja = button.getAttribute('bajaToEdit');

    // Actualiza modal
    const modalTitle = editM.querySelector('.modal-title');
    modalTitle.textContent = "Edición de usuario: " + name;
    const idsp = editM.querySelector('#idUser');
    idsp.textContent = id;
    const idUs = editM.querySelector('#idUsr');
    idUs.value = id;
    const modalBodyInputName = editM.querySelector('#name');
    modalBodyInputName.value = name;
    const modalBodyInputTel = editM.querySelector('#tel');
    modalBodyInputTel.value = tel;
    const modalBodyInputDir = editM.querySelector('#dir');
    modalBodyInputDir.value = dir;
    const modalCheckActive = editM.querySelector('#success-outlined');
    const modalCheckInactive = editM.querySelector('#danger-outlined');
    let status = editM.querySelector('#status');
    if (baja === "0") {
        modalCheckActive.checked = true;
        modalCheckInactive.checked = false;
        status.value = "0";
    } else if (baja === "1") {
        modalCheckActive.checked = false;
        modalCheckInactive.checked = true;
        status.value = "1";
    }
    if (modalCheckActive) {
        modalCheckActive.addEventListener('click', function(){
            status.value = "0";
        })
    }
    if (modalCheckInactive) {
        modalCheckInactive.addEventListener('click', function(){
            status.value = "1";
        })
    }
    })
}
