window.onload = function() {

	screen = document.getElementById('screen');

	var btns = document.getElementsByTagName("button");
	for (var i = 0; i < btns.length ; i++) {
		document.getElementsByTagName("button")[i].addEventListener('click', getValue, false);
	}


	document.getElementById('del').addEventListener('click', function(e) {

		document.getElementById('screen').value = '';

	});

	document.getElementById('eq').addEventListener('click', function(e) {
		if (canCalc(screen.value)) {
			var result;
			switch (op) {
				case '+':
					result = parseFloat(left) + parseFloat(right);
					break;
				case '-':
					result = parseFloat(left) - parseFloat(right);
					break;
				case '*':
					result = parseFloat(left) * parseFloat(right);
					break;
				case '/':
					result = parseFloat(left) / parseFloat(right);
					break;
				case '%':
					result = parseFloat(left) % parseFloat(right);
					break;
			}
			screen.value = result;
			left = 0;
			right = 0;
			result = 0;
		} else {
			alert("ins");
		}
	});

}

function getValue(e) {
	if (e.target.id == "del" || e.target.id == "eq") {
		return false;
	}

	screen.value += e.target.value;
}

function canCalc(val){
	var operators = ['+', '-', '/', '*', '%'];
	if (val == '') {
		return false;
	}

	for (var i = 0; i < operators.length; i++) {
		if (val.indexOf(operators[i]) != -1) {
			op = operators[i];
			break;
		}
	}

	if (typeof op == 'undefined') {
		return false;
	} else {
		var res = val.split(op);
		if (res[1] != '') {
			left = res[0];
			right = res[1];
			return true;
		} else {
			return false;
		}
	}
}
