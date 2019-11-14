function showTable() {
    let foundDrive = document.getElementById("foundDrive");
    foundDrive.style.display='block'; 
    checkEntries();
}

function start(){
    let foundDrive = document.getElementById("foundDrive");
    foundDrive.style.display='none'; 
}

function checkEntries(){
   /* for(var i=0; i<)*/
   let inputs = document.getElementsByTagName('input');
   for(let i = 0; i<inputs.length; i++){
       if(inputs[i].value == ""){
           alert("Bitte Daten eingeben");  
       }
   }
}

start();