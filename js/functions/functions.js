// Function to create the cookie 
export function createCookie(name, value, days) { 
    var expires; 
    if (days) { 
        var date = new Date(); 
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000)); 
        expires = "; expires=" + date.toGMTString(); 
    } 
    else { 
        expires = ""; 
    } 
    document.cookie = escape(name) + "=" +  
    escape(value) + expires + "; path=/;SameSite=Lax"; 
} 

export function changeValue(value, name) {
    if(value ==0){
        value = 1;
        console.log("Dio click en el/la"+ name);
        console.log("El nuevo valor de el/la "+ name +" es ",value);
        createCookie(name, value, 1);
    } else {
        console.log("El/La " + name + " ya fue registrada");
    }
}

export function setNull(value, name) {
    if(value ==0){
        value = null;
        console.log("El nuevo valor de el/la "+ name +" es ",value);
        createCookie(name, value, 1);
    } else {
        console.log("El/La " + name + " ya fue registrada");
    }
}