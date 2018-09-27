/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



let modal = document.getElementById('modalForm');



function openForm() {
    document.getElementById("modalForm").style.display="flex";
}

function closeForm() {
    document.getElementById("modalForm").style.display="none";
}

function closePop() {
    document.getElementById("popSucc").style.display="none";
    document.getElementById("popFail").style.display="none";
}

window.onclick = function(event) {
    if(event.target === modal) {
        modal.style = display = 'none';
    }
};