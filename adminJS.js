//script to create course selection dropdown 

var jsonURL = 'https://comas-api.ecrl.marist.edu/userrank/'; // change this to the table to get
var fetchObj = [];  //will house the converted json object
var fetchArr = [];  //will hold the x-dimensional array of pertinent information only
var xmlhttp = new XMLHttpRequest(); //define the request function

xmlhttp.onreadystatechange = function() { //executes when state change
	if (this.readyState == 4 && this.status == 200) {  //some ready state?
		fetchObj = JSON.parse(this.responseText); //puts the response to the request in this var as a JSON
		let textReturn// = "<select>";
		for (var i = 0; i<fetchObj.length; i++){    //creation of the neccesary information
			fetchArr.push([]); //create new 2d array slot
			fetchArr[i][0] = fetchObj[i].userRankName; //as many of this line as you need for the nested data
		};  //array is now created with the desired information
		for (var i=0; i<fetchArr.length; i++){
            var label = fetchArr[i][0];
            console.log('labelllll', label)
			textReturn += `<option value=${label} > ${label} </option>`;
		}
		//textReturn += "</select>";
		document.getElementById('userRanks').innerHTML = textReturn; 
		}
       };

xmlhttp.open("GET", jsonURL + "", true ); 
xmlhttp.send();

$('#createUser').on('click', (e) => {
           console.log('vvvvvvvv', e.preventDefault)
           e.preventDefault();
           const userFirstName = $('#userFirstName').val();
           const userLastName = $('#userLastName').val();
           const userEmail = $('#userEmail').val();
           const userPassword = $('#userPassword').val();
           const passwordVerify = $('#passwordVerify').val();
           const userCreditReq = $('#userCreditReq').val();
           const userStartYear = $('#userStartYear').val();
           console.log(userFirstName, userLastName, userEmail, userPassword, passwordVerify, userCreditReq, userStartYear)   
           if (userPassword == passwordVerify) {
               fetch('/createUser', {
                   method: 'POST',
                   headers: {
                       'Accept': 'application/json',
                       'Content-Type': 'application/json'
                   },
                   body: JSON.stringify({
                    userEmail: userEmail,
                    userPassword: userPassword,
                    userFirstName: userFirstName,
                    userLastName: userLastName,
                    userCreditReq: userCreditReq,
                    userYearStarted: userStartYear
                    })
               }).then(res => res.json(),
                updateSuccess('User Created!', '#updatePasswordMessage'),
                document.getElementById("registrationForm").reset())
               .catch(err => console.log('errrrr', err))
           } else if(userPassword != passwordVerify){
            updateError(null, 'Passwords Do not Match!', '#updatePasswordMessage');
           }         
       });

    function updateError(err, msg, el) {
        $(el).html(msg);
        $(el).addClass('alert alert-danger');
        console.log(err);
     }
     
    function updateSuccess(msg, el) {
        $(el).text(msg);
        // TODO: clear inputs
        $(el).removeClass('alert alert-danger')
        $(el).addClass('alert alert-success');
     }
