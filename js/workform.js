//this function is for adding rows in workform dynamically
//this method is called in addrow button
function addRow(tableID) {
 
            var table = document.getElementById(tableID);
 
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
 
            var cell1 = row.insertCell(0);
			newRowCount=rowCount-2;
			cell1.innerHTML = newRowCount + 1;
						
			var cell2 = row.insertCell(1);
			var element2 = document.createElement("input");
            element2.type = "text";
			element2.style.width="99%";
			element2.style.height="100%";
            element2.id=newRowCount;
            cell2.appendChild(element2);
 
            var cell3 = row.insertCell(2);
            var element3 = document.createElement("input");
            element3.type = "text";
			element3.style.width="99%";
			element3.style.height="100%";
            element3.id=newRowCount+100;
            cell3.appendChild(element3);
			
			var cell4 = row.insertCell(3);
            var element4 = document.createElement("input");
            element4.type = "text";
			element4.style.width="99%";
			element4.style.height="100%";
            element4.id=newRowCount+200;
            cell4.appendChild(element4);
			
			var cell5 = row.insertCell(4);
            var element5 = document.createElement("input");
            element5.type = "text";
			element5.style.width="99%";
			element5.style.height="100%";
            element5.id=newRowCount+300;
            cell5.appendChild(element5);
			
			var cell6 = row.insertCell(5);
            var element6 = document.createElement("input");
            element6.type = "text";
			element6.style.width="99%";
			element6.style.height="100%";
            element6.id=newRowCount+400;
            cell6.appendChild(element6);
			
			var cell7 = row.insertCell(6);
            var element7 = document.createElement("input");
            element7.type = "text";
			element7.style.width="99%";
			element7.style.height="100%";
            element7.id=newRowCount+500;
            cell7.appendChild(element7);
			
			var cell8 = row.insertCell(7);
            var element8 = document.createElement("input");
            element8.type = "text";
			element8.style.width="99%";
			element8.style.height="100%";
            element8.id=newRowCount+600;
            cell8.appendChild(element8);
			
			
        }
		
	
//this function display message while sending workform data in the same page without refreshing the page
function sendWorkformData(){
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
			
			//this is for catching activity field values
			var i=0;
			var arr1 = new Array();
			
			while (document.getElementById(i)!=null) {
			if ((document.getElementById(i).value)!=""){				
				var activity = document.getElementById(i).value;			
				arr1[i] = activity;
			}			
			i++;
			}
			
			//this is for catching unit field values
			var j=100;
			var arr2 = new Array();
			
			while (document.getElementById(j)!=null) {
			if ((document.getElementById(j).value)!=""){				
				var unit = document.getElementById(j).value;			
				arr2[j-100] = unit;
			}			
			j++;
			}
			
			//this is for catching weightage field values
			var k=200;
			var arr3 = new Array();
			
			while (document.getElementById(k)!=null) {
			if ((document.getElementById(k).value)!=""){				
				var weight = document.getElementById(k).value;			
				arr3[k-200] = weight;
			}			
			k++;
			}
			
			//this is for catching performance 100 field values
			var l=300;
			var arr4 = new Array();
			
			while (document.getElementById(l)!=null) {
			if ((document.getElementById(l).value)!=""){				
				var p1 = document.getElementById(l).value;			
				arr4[l-300] = p1;
			}			
			l++;
			}
			
			
			//this is for catching performance 75 field values
			var m=400;
			var arr5 = new Array();
			
			while (document.getElementById(m)!=null) {
			if ((document.getElementById(m).value)!=""){				
				var p2 = document.getElementById(m).value;			
				arr5[m-400] = p2;
			}			
			m++;
			}
			
			
			//this is for catching performance 50  field values
			var n=500;
			var arr6 = new Array();
			
			while (document.getElementById(n)!=null) {
			if ((document.getElementById(n).value)!=""){				
				var p3 = document.getElementById(n).value;			
				arr6[n-500] = p3;
			}			
			n++;
			}
			
			
			//this is for catching performance less than 50 field values
			var o=600;
			var arr7 = new Array();
			
			while (document.getElementById(o)!=null) {
			if ((document.getElementById(o).value)!=""){				
				var p4 = document.getElementById(o).value;			
				arr7[o-600] = p4;
			}			
			o++;
			}
			
			//var params = 'activity='+JSON.stringify(arr1);
			var params = 'activity='+JSON.stringify(arr1) + '&unit='+JSON.stringify(arr2) + '&weight='+JSON.stringify(arr3) + '&p1='+JSON.stringify(arr4) + '&p2='+JSON.stringify(arr5) + '&p3='+JSON.stringify(arr6) + '&p4='+JSON.stringify(arr7) ;
			xmlhttp.open('POST','../system/storeworkform.php', true);
			xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
			
			xmlhttp.send(params);
			document.getElementById("message").innerHTML = "Sending...";
			}	



//this function edit the it division workform
function editITWorkform(){
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
			xmlhttp.open('POST','../system/admin_edit_itworkform.php', true);
			xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
			
			xmlhttp.send();
			document.getElementById("maindiv").innerHTML = "Getting ready...";
			//xmlhttp.send();
			}
			

			//this function edit the HR division workform
function editHRWorkform(){
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
			xmlhttp.open('POST','../system/admin_edit_hrworkform.php', true);
			xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
			
			xmlhttp.send();
			document.getElementById("maindiv").innerHTML = "Getting ready...";
			//xmlhttp.send();
			}
			
			
			//this function edit the RTE division workform
function editRTEWorkform(){
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
			xmlhttp.open('POST','../system/admin_edit_rteworkform.php', true);
			xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
			
			xmlhttp.send();
			document.getElementById("maindiv").innerHTML = "Getting ready...";
			//xmlhttp.send();
			}
			
			
//this function save the it division workform
function saveITWorkform(){
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
			
			//this is for catching activity field values
			var i=0;
			var arr1 = new Array();
			
			while (document.getElementById(i)!=null) {
			if ((document.getElementById(i).value)!=""){				
				var activity = document.getElementById(i).value;			
				arr1[i] = activity;
			}			
			i++;
			}
			
			//this is for catching unit field values
			var j=100;
			var arr2 = new Array();
			
			while (document.getElementById(j)!=null) {
			if ((document.getElementById(j).value)!=""){				
				var unit = document.getElementById(j).value;			
				arr2[j-100] = unit;
			}			
			j++;
			}
			
			//this is for catching weightage field values
			var k=200;
			var arr3 = new Array();
			
			while (document.getElementById(k)!=null) {
			if ((document.getElementById(k).value)!=""){				
				var weight = document.getElementById(k).value;			
				arr3[k-200] = weight;
			}			
			k++;
			}
			
			//this is for catching performance 100 field values
			var l=300;
			var arr4 = new Array();
			
			while (document.getElementById(l)!=null) {
			if ((document.getElementById(l).value)!=""){				
				var p1 = document.getElementById(l).value;			
				arr4[l-300] = p1;
			}			
			l++;
			}
			
			
			//this is for catching performance 75 field values
			var m=400;
			var arr5 = new Array();
			
			while (document.getElementById(m)!=null) {
			if ((document.getElementById(m).value)!=""){				
				var p2 = document.getElementById(m).value;			
				arr5[m-400] = p2;
			}			
			m++;
			}
			
			
			//this is for catching performance 50  field values
			var n=500;
			var arr6 = new Array();
			
			while (document.getElementById(n)!=null) {
			if ((document.getElementById(n).value)!=""){				
				var p3 = document.getElementById(n).value;			
				arr6[n-500] = p3;
			}			
			n++;
			}
			
			
			//this is for catching performance less than 50 field values
			var o=600;
			var arr7 = new Array();
			
			while (document.getElementById(o)!=null) {
			if ((document.getElementById(o).value)!=""){				
				var p4 = document.getElementById(o).value;			
				arr7[o-600] = p4;
			}			
			o++;
			}
			
			//var params = 'activity='+JSON.stringify(arr1);
			var params = 'activity='+JSON.stringify(arr1) + '&unit='+JSON.stringify(arr2) + '&weight='+JSON.stringify(arr3) + '&p1='+JSON.stringify(arr4) + '&p2='+JSON.stringify(arr5) + '&p3='+JSON.stringify(arr6) + '&p4='+JSON.stringify(arr7) ;
			xmlhttp.open('POST','../system/store_updated_it_workform.php', true);
			xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
			
			xmlhttp.send(params);
			document.getElementById("message").innerHTML = "Saving...";
			}	
			

			//this function save the HR division workform
function saveHRWorkform(){
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
			
			//this is for catching activity field values
			var i=0;
			var arr1 = new Array();
			
			while (document.getElementById(i)!=null) {
			if ((document.getElementById(i).value)!=""){				
				var activity = document.getElementById(i).value;			
				arr1[i] = activity;
			}			
			i++;
			}
			
			//this is for catching unit field values
			var j=100;
			var arr2 = new Array();
			
			while (document.getElementById(j)!=null) {
			if ((document.getElementById(j).value)!=""){				
				var unit = document.getElementById(j).value;			
				arr2[j-100] = unit;
			}			
			j++;
			}
			
			//this is for catching weightage field values
			var k=200;
			var arr3 = new Array();
			
			while (document.getElementById(k)!=null) {
			if ((document.getElementById(k).value)!=""){				
				var weight = document.getElementById(k).value;			
				arr3[k-200] = weight;
			}			
			k++;
			}
			
			//this is for catching performance 100 field values
			var l=300;
			var arr4 = new Array();
			
			while (document.getElementById(l)!=null) {
			if ((document.getElementById(l).value)!=""){				
				var p1 = document.getElementById(l).value;			
				arr4[l-300] = p1;
			}			
			l++;
			}
			
			
			//this is for catching performance 75 field values
			var m=400;
			var arr5 = new Array();
			
			while (document.getElementById(m)!=null) {
			if ((document.getElementById(m).value)!=""){				
				var p2 = document.getElementById(m).value;			
				arr5[m-400] = p2;
			}			
			m++;
			}
			
			
			//this is for catching performance 50  field values
			var n=500;
			var arr6 = new Array();
			
			while (document.getElementById(n)!=null) {
			if ((document.getElementById(n).value)!=""){				
				var p3 = document.getElementById(n).value;			
				arr6[n-500] = p3;
			}			
			n++;
			}
			
			
			//this is for catching performance less than 50 field values
			var o=600;
			var arr7 = new Array();
			
			while (document.getElementById(o)!=null) {
			if ((document.getElementById(o).value)!=""){				
				var p4 = document.getElementById(o).value;			
				arr7[o-600] = p4;
			}			
			o++;
			}
			
			//var params = 'activity='+JSON.stringify(arr1);
			var params = 'activity='+JSON.stringify(arr1) + '&unit='+JSON.stringify(arr2) + '&weight='+JSON.stringify(arr3) + '&p1='+JSON.stringify(arr4) + '&p2='+JSON.stringify(arr5) + '&p3='+JSON.stringify(arr6) + '&p4='+JSON.stringify(arr7) ;
			xmlhttp.open('POST','../system/store_updated_hr_workform.php', true);
			xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
			
			xmlhttp.send(params);
			document.getElementById("message").innerHTML = "Saving...";
			}	
			
			
			//this function save the RTE division workform
function saveRTEWorkform(){
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
			
			//this is for catching activity field values
			var i=0;
			var arr1 = new Array();
			
			while (document.getElementById(i)!=null) {
			if ((document.getElementById(i).value)!=""){				
				var activity = document.getElementById(i).value;			
				arr1[i] = activity;
			}			
			i++;
			}
			
			//this is for catching unit field values
			var j=100;
			var arr2 = new Array();
			
			while (document.getElementById(j)!=null) {
			if ((document.getElementById(j).value)!=""){				
				var unit = document.getElementById(j).value;			
				arr2[j-100] = unit;
			}			
			j++;
			}
			
			//this is for catching weightage field values
			var k=200;
			var arr3 = new Array();
			
			while (document.getElementById(k)!=null) {
			if ((document.getElementById(k).value)!=""){				
				var weight = document.getElementById(k).value;			
				arr3[k-200] = weight;
			}			
			k++;
			}
			
			//this is for catching performance 100 field values
			var l=300;
			var arr4 = new Array();
			
			while (document.getElementById(l)!=null) {
			if ((document.getElementById(l).value)!=""){				
				var p1 = document.getElementById(l).value;			
				arr4[l-300] = p1;
			}			
			l++;
			}
			
			
			//this is for catching performance 75 field values
			var m=400;
			var arr5 = new Array();
			
			while (document.getElementById(m)!=null) {
			if ((document.getElementById(m).value)!=""){				
				var p2 = document.getElementById(m).value;			
				arr5[m-400] = p2;
			}			
			m++;
			}
			
			
			//this is for catching performance 50  field values
			var n=500;
			var arr6 = new Array();
			
			while (document.getElementById(n)!=null) {
			if ((document.getElementById(n).value)!=""){				
				var p3 = document.getElementById(n).value;			
				arr6[n-500] = p3;
			}			
			n++;
			}
			
			
			//this is for catching performance less than 50 field values
			var o=600;
			var arr7 = new Array();
			
			while (document.getElementById(o)!=null) {
			if ((document.getElementById(o).value)!=""){				
				var p4 = document.getElementById(o).value;			
				arr7[o-600] = p4;
			}			
			o++;
			}
			
			//var params = 'activity='+JSON.stringify(arr1);
			var params = 'activity='+JSON.stringify(arr1) + '&unit='+JSON.stringify(arr2) + '&weight='+JSON.stringify(arr3) + '&p1='+JSON.stringify(arr4) + '&p2='+JSON.stringify(arr5) + '&p3='+JSON.stringify(arr6) + '&p4='+JSON.stringify(arr7) ;
			xmlhttp.open('POST','../system/store_updated_rte_workform.php', true);
			xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
			
			xmlhttp.send(params);
			document.getElementById("message").innerHTML = "Saving...";
			}	
			

