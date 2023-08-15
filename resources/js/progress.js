var array = new Array();
array[''] = new Array({cd:"0", label:"選択してください"});

document.getElementById('prefecture').onchange = function(){
  city = document.getElementById("city");
  city.options.length = 0
  var changedPref = prefecture.value;
  for (let i = 0; i < array[changedPref].length; i++) {
    var op = document.createElement("option");
    value = array[changedPref][i]
    op.value = value.cd;
    op.text = value.label;
    city.appendChild(op);
  }
}