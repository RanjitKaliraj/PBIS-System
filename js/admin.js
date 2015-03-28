//this function display message while sending employee data in the same page without refreshing the page
function sendEmployeeData(){
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
					document.getElementById('message').innerHTML = xmlhttp.responseText;
				}
			}
			//x = document.getElementById('text1').value;
			//y = document.getElementById('text2').value;
			//a = 'text1='+x+'&text2='+y;
			
			var nam = document.getElementById("name").value;
			var add = document.getElementById("address").value;
			var cont = document.getElementById("contact").value;
			var div = document.getElementById("division").value;
			var role = document.getElementById("role").value;
			var params = 'name='+nam + '&address='+add + '&contact='+cont + '&division='+div + '&divrole='+role;

			//parameters1 = 'text1='+document.getElementById('textx2').value;
			xmlhttp.open('POST','../system/addemployeeinfo.php', true);
			xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
			
			xmlhttp.send(params);
			document.getElementById("message").innerHTML = "Sending...";
			//xmlhttp.send();
			}


//this function display message while sending IT division's workform approval message, in the same page without refreshing the page
function sendItWorkformApproval(){
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
					document.getElementById('message').innerHTML = xmlhttp.responseText;
				}
			}
			//x = document.getElementById('text1').value;
			//y = document.getElementById('text2').value;
			//a = 'text1='+x+'&text2='+y;
			

			//parameters1 = 'text1='+document.getElementById('textx2').value;
			xmlhttp.open('POST','../system/admin_approve_itworkform.php', true);
			xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
			
			xmlhttp.send();
			document.getElementById("message").innerHTML = "Sending...";
			//xmlhttp.send();
			}			
			
			
//this function display message while sending HR division's workform approval message, in the same page without refreshing the page
function sendHrWorkformApproval(){
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
					document.getElementById('message').innerHTML = xmlhttp.responseText;
				}
			}
			//x = document.getElementById('text1').value;
			//y = document.getElementById('text2').value;
			//a = 'text1='+x+'&text2='+y;
			

			//parameters1 = 'text1='+document.getElementById('textx2').value;
			xmlhttp.open('POST','../system/admin_approve_hrworkform.php', true);
			xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
			
			xmlhttp.send();
			document.getElementById("message").innerHTML = "Sending...";
			//xmlhttp.send();
			}
			
//this function display message while sending RTE's workform approval message, in the same page without refreshing the page
function sendRteWorkformApproval(){
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
					document.getElementById('message').innerHTML = xmlhttp.responseText;
				}
			}
			//x = document.getElementById('text1').value;
			//y = document.getElementById('text2').value;
			//a = 'text1='+x+'&text2='+y;
			

			//parameters1 = 'text1='+document.getElementById('textx2').value;
			xmlhttp.open('POST','../system/admin_approve_rteworkform.php', true);
			xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
			
			xmlhttp.send();
			document.getElementById("message").innerHTML = "Sending...";
			//xmlhttp.send();
			}
			
//this function display message while forwarding IT's progressform approval message, in the same page without refreshing the page
function forwardItprogressform(){
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
					document.getElementById('message').innerHTML = xmlhttp.responseText;
				}
			}
			//x = document.getElementById('text1').value;
			//y = document.getElementById('text2').value;
			//a = 'text1='+x+'&text2='+y;
			

			//parameters1 = 'text1='+document.getElementById('textx2').value;
			xmlhttp.open('POST','../system/forward_itprogressform_to_exco.php', true);
			xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
			
			xmlhttp.send();
			document.getElementById("message").innerHTML = "Sending...";
			//xmlhttp.send();
			}
//this function display message while forwarding HR's progressform approval message, in the same page without refreshing the page
function forwardHrprogressform(){
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
					document.getElementById('message').innerHTML = xmlhttp.responseText;
				}
			}
			//x = document.getElementById('text1').value;
			//y = document.getElementById('text2').value;
			//a = 'text1='+x+'&text2='+y;
			

			//parameters1 = 'text1='+document.getElementById('textx2').value;
			xmlhttp.open('POST','../system/forward_hrprogressform_to_exco.php', true);
			xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
			
			xmlhttp.send();
			document.getElementById("message").innerHTML = "Sending...";
			//xmlhttp.send();
			}
			
//this function display message while forwarding RTE's progressform approval message, in the same page without refreshing the page
function forwardRteprogressform(){
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
					document.getElementById('message').innerHTML = xmlhttp.responseText;
				}
			}
			//x = document.getElementById('text1').value;
			//y = document.getElementById('text2').value;
			//a = 'text1='+x+'&text2='+y;
			

			//parameters1 = 'text1='+document.getElementById('textx2').value;
			xmlhttp.open('POST','../system/forward_rteprogressform_to_exco.php', true);
			xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
			
			xmlhttp.send();
			document.getElementById("message").innerHTML = "Sending...";
			//xmlhttp.send();
			}
			
			