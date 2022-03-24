import { changeValue } from "./functions/functions.js";

var value_ts_1 = document.getElementById("value_ts_1").value;
var value_ts_2 = document.getElementById("value_ts_2").value;
//var value_ts_3 = document.getElementById("value_ts_2").value;
const ts_1 = document.getElementById("ts_1");
const ts_2 = document.getElementById("ts_2");
//const ts_3 = document.getElementById("ts_3");

console.log("Pruebas");
console.log("Valor inicial de la carta:", value_ts_1);
console.log("Valor inicial del diagnostico:", value_ts_2);
//console.log("Valor inicial del diagnostico:", value_ts_3);
console.log(ts_1);
console.log(ts_2);
//console.log(tracker_3);

//tracker_1.onclick = changeValue(value_tracker_1, "tracker_1");

ts_1.addEventListener("click", function() {changeValue(value_ts_1, "ts_1")});

ts_2.addEventListener("click", function(){ changeValue(value_ts_2, "ts_2")});

//ts_3.addEventListener("click", function(){ changeValue(value_ts_3, "ts_3")});
