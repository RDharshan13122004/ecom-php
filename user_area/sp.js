const password = document.querySelector("#textPassword");
const Checkbox = document.querySelector("#show");

Checkbox.addEventListener('click',function(){
    const type = password.getAttribute("type")==="password" ? "text":"password";
    password.setAttribute("type",type);
});
