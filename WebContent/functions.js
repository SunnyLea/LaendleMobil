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
document.querySelector('#open-dialog').addEventListener('click', toggleDialog);
  
function toggleDialog(){ 
	var dialog = document.querySelector('dialog'),
    	closebutton = document.getElementById('close-dialog'),
    	pagebackground = document.querySelector('body');
			
	if (!dialog.hasAttribute('open')) {
        
		// show the dialog 
		dialog.setAttribute('open','open');
		// after displaying the dialog, focus the closebutton inside it
		closebutton.focus();
		closebutton.addEventListener('click', toggleDialog);
        var div = document.createElement('div');
		div.id = 'backdrop';
        document.body.appendChild(div);
	}
	else {		
       // alert("Fahrt gebucht!");
 		dialog.removeAttribute('open');  
		var div = document.querySelector('#backdrop');
		div.parentNode.removeChild(div);
		lastFocus.focus();
    }
//   src="https://cdn.jsdelivr.net/npm/sweetalert2@9"
}
}
