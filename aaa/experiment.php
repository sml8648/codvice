<!DOCTYPE html>
<html>

<body>

<h2>Click the Button.</h2>
<p>A script tag with a src attribute is created and placed in the document.</p>
<p>The PHP file returns a call to a function with the JSON object as a parameter.</p>

<button onclick="clickButton()">Click me!</button>

<p id="demo"></p>

<script>
function clickButton() {
    var s = document.createElement("script");
	s.type = "sdfsdf";    
	s.src = "demo_jsonp.php";
    document.body.appendChild(s);
}

function myFunc(myObj) {
  document.getElementById("demo").innerHTML = myObj.name;
}
</script>

</body>
</html>
