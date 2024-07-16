// declaring toast function
const Toast = Swal.mixin({
    toast: true,
    position: "top-right",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
    }
  })
document.getElementById("loginForm").addEventListener("submit", function(e) {
    e.preventDefault();

    var formData = new FormData(this);

    fetch("./assets/php/login.php", {
        method: "POST",
        body: formData
    })
    .then(response => {
        if(!response.ok){
            throw new Error("response network was not okey");
        }
        return response.json();
    })
    .then(data => {
        if(data.status){
            Toast.fire({
            icon: "success",
            title: data.title,
            text: data.message
    })
    setTimeout(function(){
        window.location.href = './dashboards.php'
    }, 5000)
    }else{
        Toast.fire({
        icon: "error",
        title: data.title,
        text: data.message
    })
    }
    }).catch(error => {
        console.log("Error",error);
    })
})