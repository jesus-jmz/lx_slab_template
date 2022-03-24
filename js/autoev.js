import { changeValue, setNull } from "./functions/functions.js";

var trackers = document.getElementsByClassName("tracker");
var value_ts_7 = document.getElementById("value_ts_7").value;
var value_ts_8 = document.getElementById("value_ts_8").value;
var value_ts_9 = document.getElementById("value_ts_9").value;
var ts_values = [value_ts_7, value_ts_8, value_ts_9];
var slabId = document.getElementById("slabId").value;


console.log("Pruebas");
console.log("Hay ",trackers.length," elementos");
console.log("Tracker 1 = ",trackers[0]);
console.log("Tracker 2 = ",trackers[1]);
console.log("Tracker 3 = ",trackers[2]);
console.log("Slab ID = ", slabId);

//El nombre de la cookie debería ser una combinación entre el ID
// y el nombre del tracker
for(let i = 0; i < 3; i++){
    const altName = slabId+"_ts_"+[i+7];
    if(typeof trackers[i] !== "undefined"){
        console.log("El tracker " + i + " sí existe");
    } else {
        console.log("El tracker " + i + " no existe");
        setNull(ts_values[i], altName);
    }
}

for (let i = 0; i < trackers.length; i++) {
    const name = slabId+"_ts_"+[i+7];
    console.log(name);
    trackers[i].addEventListener("click", function(){changeValue(ts_values[i], name)});
}