function start(){
    let foundDrive = document.getElementById("foundDrive");
    foundDrive.style.display='none'; 
}

start();


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


function checkEntriesFA(){
   let inputsFA = document.getElementsByTagName('input');
   let noInputFA = false;
 /*  let today = new Date();
   let givenDate = document.getElementById('givenDate');*/

   for(let i = 0; i < inputsFA.length; i++){
       if(inputsFA[i].value == ""){
           noInputFA = true;
       }
   }
   let selectFA = document.getElementById('selectFA');
   if(selectFA.value == "Bitte auswählen ..."){
       noInputFA = true;
   }
    if(!noInputFA){
       /* alert("Daten werden gespeichert"); */
    }
    if(givenDate.value.getTime() < today.getTime()) {
        alert("Bitte Datum in der Zukunft angeben");
    }
    
    if(noInputFA){
        alert("Bitte Daten eingeben"); 
   }
}


