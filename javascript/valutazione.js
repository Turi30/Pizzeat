
var staron = new Image(); staron.src = "immagini/stellapiena.png";

function star_vota(QT, idpizzeria) {
	document.getElementById('valutazione').style.display="none";
	var p=document.createElement('span');
	p.setAttribute('id', 'aa');
	var txt= document.createTextNode("Hai votato "+QT+" stelle!");
	p.appendChild(txt);
	document.getElementById('valutazione1').appendChild(p);
	var xhr= new XMLHttpRequest();
	method="GET";
	xhr.open(method, "php/inseriscivalutazione.php?q="+QT+"&id="+idpizzeria, true);
	xhr.send();
}

function star_accendi(QT) {
	if (document.getElementById('star_1')) {
		for (i=1; i<=5; i++){
			if (i<=QT)
				document.getElementById('star_' + i).className = 'on';
			else
				document.getElementById('star_' + i).className = '';
		}
	}
}

function star(QT, idpizzeria) {
	document.write('<div id="valutazione" onmouseout="star_accendi(' + QT + ')"><ul>');
	document.write('<li id="star_1" onclick="star_vota(1, '+idpizzeria+')" onmouseover="star_accendi(0); star_accendi(1)"></li>');
	document.write('<li id="star_2" onclick="star_vota(2, '+idpizzeria+')" onmouseover="star_accendi(0); star_accendi(2)"></li>');
	document.write('<li id="star_3" onclick="star_vota(3, '+idpizzeria+')" onmouseover="star_accendi(0); star_accendi(3)"></li>');
	document.write('<li id="star_4" onclick="star_vota(4, '+idpizzeria+')" onmouseover="star_accendi(0); star_accendi(4)"></li>');
	document.write('<li id="star_5" onclick="star_vota(5, '+idpizzeria+')" onmouseover="star_accendi(0); star_accendi(5)"></li>');
	document.write('</ul></div>');
	star_accendi(QT);
}