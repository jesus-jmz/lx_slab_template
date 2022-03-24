import { createCookie } from "./functions/functions.js";

var logID = 'log',
  log = $('<div id="'+logID+'"></div>');
var slabId = document.getElementById("slabId").value;
var valueChanged = false;
console.log("Slab ID: ",slabId);
$('body').append(log);
  $('[type*="radio"]').change(function () {
    var me = $(this);
    console.log(me.attr('value'));
    var name = slabId+"_rating" 
    createCookie(name, me.attr('value'),1);
    console.log("Se creó la cookie");
  });