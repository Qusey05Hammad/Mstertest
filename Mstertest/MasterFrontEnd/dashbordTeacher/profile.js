
const profile = document.getElementById('profile');
const clickProfile = document.getElementById('btn-pr');
const cont = document.getElementById('cont')
const editPr = document.getElementById('edit-pr')
const dBtn = document.querySelectorAll('.ccccc')
const txt = document.getElementById('txt-d')
const img = document.getElementById('img')
const closeProfile = document.getElementById('closeProfile')
clickProfile.addEventListener('click' , ()=>{
    profile.style.opacity = "1"
    cont.style.filter = "blur(20px)"
    closeProfile.style.display = "block"
    editPr.style.display = "block"
    txt.style.display = "block"
    img.style.display = "block"
})
closeProfile.addEventListener('click' , ()=>{
    profile.style.opacity = "0"
    cont.style.filter = "blur(0px)"
    closeProfile.style.display = "none"  
    editPr.style.display = "none"  
    txt.style.display = "none"
    img.style.display = "none"
})
