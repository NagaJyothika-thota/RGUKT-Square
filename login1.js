let signIn = ()=>{
    document.querySelector('.signUp').style.display = "none";
    document.querySelector('.signIn').style.display = "block";
    document.querySelector('.primary__btn').style.display = "none";
    document.querySelector('.secondary__btn').style.display = "block";
}
let signUp = ()=>{
    document.querySelector('.signUp').style.display = "block";
    document.querySelector('.signIn').style.display = "none";
    document.querySelector('.primary__btn').style.display = "block";
    document.querySelector('.secondary__btn').style.display = "none";
}