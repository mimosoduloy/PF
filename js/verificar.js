window.onload = function(){
    var cemiterio = document.querySelector("#cem");
        let qua = document.querySelector("#quarte")          
        let cam = document.querySelector("#campa")
    cemiterio.onchange = function(){
        let idCem = this.value;
        cam.innerHTML = "<option disabled selected>Escolha a Campa</option>"
        fetch("js/buscar.php?id="+idCem)
        .then(response =>{
            return response.text();
        })
        .then(texto =>{
            qua.innerHTML = texto;
        });
        
 
    }      
    qua.onchange = function(){
          let idCam = this.value;
          console.log(idCam);

        fetch("js/buscar.php?ed="+idCam)
        .then(response =>{
            return response.text();
        })
        .then(texto =>{
            cam.innerHTML = texto;
        });
      } 
}