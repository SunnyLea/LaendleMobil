function showTable() {
    let foundDrive = document.getElementById("foundDrive");
    foundDrive.style.display='block'; 
}

function start(){
    let foundDrive = document.getElementById("foundDrive");
    foundDrive.style.display='none'; 
}

function checkEntries(){
   /* for(var i=0; i<)*/
   let inputs = document.getElementsByTagName('input');
   let noInput = false;
   for(let i = 0; i<inputs.length; i++){
       if(inputs[i].value == ""){
           noInput = true;
       }
       else{
           showTable();
       }
   }
   let select = document.getElementsByTagName('select');
   if(select.value === "Bitte auswählen ..."){
       noInput = true;
   }
   if(noInput){
        alert("Bitte Daten eingeben");
   }
}

start();