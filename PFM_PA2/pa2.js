function calBmi() {
	var w = document.getElementById("weight").value
	var h = document.getElementById("height").value
	var r = document.getElementById("result")
	var b = document.getElementById("bmi")
	var r_d = document.getElementById("result_data")
	var bmi = 0
	
	if (isNaN(w) || isNaN(h) || h == "" || w == "" || h == null || w == null) {
		alert("Input is invaild");
	} else {
		bmi = w / ( h * h )
		b.innerHTML = bmi.toFixed(2)
		if (bmi <= 18.5) {
			r.innerHTML = "You are underweight"
			r.style.color = "white"
			r_d.style.backgroundColor = "red"
		} else if (bmi > 18.5 && bmi <= 25.0) {
			r.innerHTML = "You are of normal range"
			r.style.color = "white"
			r_d.style.backgroundColor = "green"
		} else {
			r.innerHTML = "You are overweight"
			r.style.color = "white"
			r_d.style.backgroundColor = "red"
		}
	}
}