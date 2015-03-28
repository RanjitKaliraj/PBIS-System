
//this function edit the it division workform
function approveITProgressform(){
			if (window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();
				}
			else
				{
				xmlhttp = new ActiveXobject ('Mircosoft.XMLHTTP');
				}
				
			xmlhttp.onreadystatechange = function(){
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
				{
					document.getElementById('maindiv').innerHTML = xmlhttp.responseText;
				}
			}
			//x = document.getElementById('text1').value;
			//y = document.getElementById('text2').value;
			//a = 'text1='+x+'&text2='+y;
			

			//parameters1 = 'text1='+document.getElementById('textx2').value;
			xmlhttp.open('POST','../system/exco2_approve_it_progressform.php', true);
			xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
			
			xmlhttp.send();
			document.getElementById("maindiv").innerHTML = "Approving the progress form...";
			//xmlhttp.send();
			}
			

			//this function edit the HR division workform
function approveHRProgressform(){
			if (window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();
				}
			else
				{
				xmlhttp = new ActiveXobject ('Mircosoft.XMLHTTP');
				}
				
			xmlhttp.onreadystatechange = function(){
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
				{
					document.getElementById('maindiv').innerHTML = xmlhttp.responseText;
				}
			}
			//x = document.getElementById('text1').value;
			//y = document.getElementById('text2').value;
			//a = 'text1='+x+'&text2='+y;
			

			//parameters1 = 'text1='+document.getElementById('textx2').value;
			xmlhttp.open('POST','../system/exco2_approve_hr_progressform.php', true);
			xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
			
			xmlhttp.send();
			document.getElementById("maindiv").innerHTML = "Approving the progress form...";
			//xmlhttp.send();
			}
			
			
			//this function edit the RTE division workform
function approveRTEProgressform(){
			if (window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();
				}
			else
				{
				xmlhttp = new ActiveXobject ('Mircosoft.XMLHTTP');
				}
				
			xmlhttp.onreadystatechange = function(){
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
				{
					document.getElementById('maindiv').innerHTML = xmlhttp.responseText;
				}
			}
			//x = document.getElementById('text1').value;
			//y = document.getElementById('text2').value;
			//a = 'text1='+x+'&text2='+y;
			

			//parameters1 = 'text1='+document.getElementById('textx2').value;
			xmlhttp.open('POST','../system/exco2_approve_rte_progressform.php', true);
			xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
			
			xmlhttp.send();
			document.getElementById("maindiv").innerHTML = "Approving the progress form...";
			//xmlhttp.send();
			}
			
			

//this function edit the it division workform
function disapproveITProgressform(){
			if (window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();
				}
			else
				{
				xmlhttp = new ActiveXobject ('Mircosoft.XMLHTTP');
				}
				
			xmlhttp.onreadystatechange = function(){
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
				{
					document.getElementById('maindiv').innerHTML = xmlhttp.responseText;
				}
			}
			//x = document.getElementById('text1').value;
			//y = document.getElementById('text2').value;
			//a = 'text1='+x+'&text2='+y;
			

			//parameters1 = 'text1='+document.getElementById('textx2').value;
			xmlhttp.open('POST','../system/exco2_disapprove_it_progressform.php', true);
			xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
			
			xmlhttp.send();
			document.getElementById("maindiv").innerHTML = "dis-approving the progress form...";
			//xmlhttp.send();
			}
			

			//this function edit the HR division workform
function disapproveHRProgressform(){
			if (window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();
				}
			else
				{
				xmlhttp = new ActiveXobject ('Mircosoft.XMLHTTP');
				}
				
			xmlhttp.onreadystatechange = function(){
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
				{
					document.getElementById('maindiv').innerHTML = xmlhttp.responseText;
				}
			}
			//x = document.getElementById('text1').value;
			//y = document.getElementById('text2').value;
			//a = 'text1='+x+'&text2='+y;
			

			//parameters1 = 'text1='+document.getElementById('textx2').value;
			xmlhttp.open('POST','../system/exco2_disapprove_hr_progressform.php', true);
			xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
			
			xmlhttp.send();
			document.getElementById("maindiv").innerHTML = "dis-approving the progress form...";
			//xmlhttp.send();
			}
			
			
			//this function edit the RTE division workform
function disapproveRTEProgressform(){
			if (window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();
				}
			else
				{
				xmlhttp = new ActiveXobject ('Mircosoft.XMLHTTP');
				}
				
			xmlhttp.onreadystatechange = function(){
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
				{
					document.getElementById('maindiv').innerHTML = xmlhttp.responseText;
				}
			}
			//x = document.getElementById('text1').value;
			//y = document.getElementById('text2').value;
			//a = 'text1='+x+'&text2='+y;
			

			//parameters1 = 'text1='+document.getElementById('textx2').value;
			xmlhttp.open('POST','../system/exco2_disapprove_rte_progressform.php', true);
			xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
			
			xmlhttp.send();
			document.getElementById("maindiv").innerHTML = "dis-approving the progress form...";
			//xmlhttp.send();
			}
	