async function sendr(){
    let response = await fetch('UserController.php',{
        method: 'POST',
        body: new FormData(document.forms.fform)
    });

    if (response.ok){
        document.getElementById("res").innerHTML = await response.text();
    }
}