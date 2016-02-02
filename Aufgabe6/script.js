document.addEventListener('DOMContentLoaded', update);

function update(){
  var input = document.querySelector('input');
  var select = document.querySelector('select');
  var output = document.querySelector('output');
  var checkbox = document.querySelector('checkbox');

 button.addEventListener('click', function() {

      var ssid = input.value;
      var psw = input.value;
      var encrypt = select.value;
      var box = input.value;

      output.value = 'WIFI:S:<ssid>;T:<encrypt>;P:<psw>;H:<box ? true : false>;;;'

   });

}

function print() {
  var button = document.querySelector('button');
  button.addEventListener('click', function(){

  });
}