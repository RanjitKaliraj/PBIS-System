//this function add rows dynamically in progress form
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
            element2.name="ActName[]";
            cell2.appendChild(element2);
 
            var cell3 = row.insertCell(2);
            var element3 = document.createElement("input");
            element3.type = "text";
			element3.style.width="99%";
			element3.style.height="100%";
            element3.name = "txtbox[]";
            cell3.appendChild(element3);
			
			var cell4 = row.insertCell(3);
            var element4 = document.createElement("input");
            element4.type = "text";
			element4.style.width="99%";
			element4.style.height="100%";
            element4.name = "txtbox[]";
            cell4.appendChild(element4);
			
			var cell5 = row.insertCell(4);
            var element5 = document.createElement("input");
            element5.type = "text";
			element5.style.width="99%";
			element5.style.height="100%";
            element5.name = "txtbox[]";
            cell5.appendChild(element5);
			
			var cell6 = row.insertCell(5);
            var element6 = document.createElement("input");
            element6.type = "text";
			element6.style.width="99%";
			element6.style.height="100%";
            element6.name = "txtbox[]";
            cell6.appendChild(element6);
			
			var cell7 = row.insertCell(6);
            var element7 = document.createElement("input");
            element7.type = "text";
			element7.style.width="99%";
			element7.style.height="100%";
            element7.name = "txtbox[]";
            cell7.appendChild(element7);
			
			var cell8 = row.insertCell(7);
            var element8 = document.createElement("input");
            element8.type = "text";
			element8.style.width="99%";
			element8.style.height="100%";
            element8.name = "txtbox[]";
            cell8.appendChild(element8);
			
			var cell9 = row.insertCell(8);
            var element9 = document.createElement("input");
            element9.type = "text";
			element9.style.width="99%";
			element9.style.height="100%";
            element9.name = "txtbox[]";
            cell9.appendChild(element9);
			
			var cell10 = row.insertCell(9);
            var element10 = document.createElement("input");
            element10.type = "text";
			element10.style.width="99%";
			element10.style.height="100%";
            element10.name = "txtbox[]";
            cell10.appendChild(element10);
			
			var cell11 = row.insertCell(10);
            var element11 = document.createElement("input");
            element11.type = "text";
			element11.style.width="99%";
			element11.style.height="100%";
            element11.name = "txtbox[]";
            cell11.appendChild(element11);
			
			var cell12 = row.insertCell(11);
            var element12 = document.createElement("input");
            element12.type = "text";
			element12.style.width="99%";
			element12.style.height="100%";
            element12.name = "txtbox[]";
            cell12.appendChild(element12);
			
 
 
        } 
		
		
//this function display message while sending progressform data in the same page without refreshing the page
function sendProgressformData(){
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
			
			
			//this is for counting the row of table
			//var rowCount = table.rows.length;
			var row = document.getElementById("table").rows.length;
			var rowCount = (row - 2);
			
			//this is for catching measurement field values
			var i=0;
			var arr1 = new Array();
			
			while (document.getElementById(i)!=null) {
			if ((document.getElementById(i).value)!=""){				
				var measure = document.getElementById(i).value;			
				arr1[i] = measure;
			}			
			i++;
			}
			
			
			
			
			//this is for catching score field values
			var j=100;
			var arr2 = new Array();
			
			while (document.getElementById(j)!=null) {
			if ((document.getElementById(j).value)!=""){				
				var score = document.getElementById(j).value;			
				arr2[j-100] = score;
			}			
			j++;
			}
			
			//this is for catching progress values
			var k=200;
			var arr3 = new Array();
			
			while (document.getElementById(k)!=null) {
			if ((document.getElementById(k).value)!=""){				
				var progress = document.getElementById(k).value;			
				arr3[k-200] = progress;
			}			
			k++;
			}
			
			//this is for catching indicator measurement basis
			var l=300;
			var arr4 = new Array();
			
			while (document.getElementById(l)!=null) {
			if ((document.getElementById(l).value)!=""){				
				var indicator = document.getElementById(l).value;			
				arr4[l-300] = indicator;
			}			
			l++;
			}
			
			
			
			
			
			
			//var params = 'activity='+JSON.stringify(arr1);
			var params = 'measurement='+JSON.stringify(arr1) + '&score='+JSON.stringify(arr2) + '&progress='+JSON.stringify(arr3) + '&imd='+JSON.stringify(arr4) + '&row='+rowCount;
			xmlhttp.open('POST','../system/storeprogressform.php', true);
			xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
			
			xmlhttp.send(params);
			document.getElementById("message").innerHTML = "Sending...";
			}	