var asmatmap = document.getElementById("asmat-map"),
	distrikInfo = document.getElementById("distrikInfo"),
	allDistrics = asmatmap.querySelectorAll("g");
	asmatmap.addEventListener("click", function(e){ 
		var distric = e.target.parentNode;
		if(e.target.nodeName == "path") {
		for (var i=0; i < allDistrics.length; i++) {
			allDistrics[i].classList.remove("active");
		}
		distric.classList.add("active");
		var districName = distric.querySelector("title").innerHTML,
		districPara = distric.querySelector("desc p");
		sourceImg = distric.querySelector("img"),
		imgPath = "http://192.168.1.10/pbpm/public/jqvmap/img/";
		distrikInfo.innerHTML = "";
		distrikInfo.insertAdjacentHTML("afterbegin", "<img src="+imgPath + sourceImg.getAttribute('href')+" alt='"+sourceImg.getAttribute('alt')+"'><h1>"+districName+"</h1><p>"+districPara.innerHTML+"</p>");
		distrikInfo.classList.add("show");
		}
	})