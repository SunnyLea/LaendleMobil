start();
function start(){
    let foundDrive = document.getElementById("foundDrive");
    foundDrive.style.display='none'; 

function checkEntriesStart(){
   let inputs = document.getElementsByTagName('input');
   let noInput = false;

   for(let i = 0; i < inputs.length; i++){
       if(inputs[i].value == ""){
           noInput = true;
       }
   }
   let select = document.getElementById('seekedTime');
   if(select.value == "Bitte auswählen ..."){
       noInput = true;
   }
    if(!noInput){
       showTable();
    }
    if(noInput){
        alert("Bitte Daten eingeben");
   }
}

function showTable() {
    let foundDrive = document.getElementById("foundDrive");
    foundDrive.style.display='block'; 
}
}
