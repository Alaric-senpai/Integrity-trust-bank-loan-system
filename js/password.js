const password = document.querySelectorAll('.password')
const show = Document.querySelectorAll('.show')

for(i =0; i < show.length; i++){
    show[i].addEventListener('click', ()=>{
        if(password[i].classList.contains("fa-eye")){
            password[i].classList.replace("fa-eye", "fa-eye-slash")
            password[i].type = "text"
        }else{
            password[i].classList.replace("fa-eye-slash", "fa-eye")
            password[i].type = "password"

        }
    })
}