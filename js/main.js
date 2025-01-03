let open = document.getElementById('open');
let close = document.getElementById('close');
let modal = document.getElementById('modal');

open.addEventListener("click", ()=>{
    modal.classList.remove('hidden');
})
close.addEventListener("click", ()=>{
    modal.classList.add('hidden');
})
