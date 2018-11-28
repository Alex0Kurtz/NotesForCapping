AEAWEAWE

<?php 
$title = "Advanced Search";
include( 'includes/header.php' ); ?>
<style>
.search{
	height:50px;
	width:100px;
	margin: 40px 160px;
	padding-left: 30px;
	font-size:20px;
	border-radius: 10px;
}
.searchBar{
	float:left;
	width: 420px;
    height: 48px;
	margin: -28px 246px;
    padding: 10px 5px; 
    background: #ebebeb;
	border: 2px solid black;
	font-size:20px;
	border-radius: 10px 10px 10px 0px;
	position: relative;
}
input[type=text]:focus {
    outline: 0;
    background: #fff;
}
input[type=text]:disabled{
	background:#485563;
}
h3{
	margin:-14px 30px;
	font-size:36px;
	float:left;
}
input[type=checkbox]{
	visibility: hidden;
}
.checkboxes {
	width: 20px;
	height: 20px;
	background: #ddd;
	margin: 20px 20px 80px;
	float:left;
	position: absolute;
	box-shadow: 0px 1px 3px rgba(0,0,0,0.5);
}
.checkboxes label {
	width: 12px;
	height: 12px;

	transition: all .5s ease;
	cursor: pointer;
	position: absolute;
	top: 4px;
	left: 4px;
	z-index: 1;

	background: #333;
	box-shadow:inset 0px 1px 3px rgba(0,0,0,0.5);
}
.checkboxes input[type=checkbox]:checked + label {
	background: #c85e17;
}
select{
	color: #999999;
	float:left;
    height: 48px;
	margin: -28px 246px;
    padding: 8px 5px; 
    background: #ebebeb;
	border: 2px solid black;
	font-size:20px;
	border-radius: 10px 10px 0px 0px;
	position: relative;
}
select:disabled{
	background:#485563;
}

input[type=radio]{
	visibility: hidden;
}
.radiobuttons {
	width: 14px;
	height: 14px;
	background: #ddd;
	margin-left: 320px;
	float:left;
	position: absolute;
	border-radius: 100%;
	box-shadow: 0px 1px 3px rgba(0,0,0,0.5);
}
.radiobuttons label {
	width: 8px;
	height: 8px;
	border-radius: 100%;
	transition: all .5s ease;
	cursor: pointer;
	position: absolute;
	top: 3px;
	left: 3px;
	z-index: 1;

	background: #333;
	box-shadow:inset 0px 1px 3px rgba(0,0,0,0.5);
}
.radiobuttons input[type=radio]:checked + label {
	background: #c85e17;
}
.yesradio{
	
}
.noradio{
	margin-left:60
}
.yeslabel{
	font-size:24px;
	margin-left:20px;
}
.nolabel{
	font-size:24px;
	margin-left:80px;
}
</style>

<div style="float:left">
	<h1> Advanced Search Options:</h1>
</div>
<br><br><br><br>
<div>
	<form action="">
		<div class="checkboxes">
			<input type="checkbox" value="Title" id="checkboxesInput1" name="TitleCheckbox" onclick="checkEnabled()">

			<label for="checkboxesInput1">
			  <h3> Title </h3>
			  <input type="text" placeholder="Enter a Title here..." id="TitleSearchBar" class="searchBar" disabled>
			</label>
		</div>
		<br><br><br><br>
		<div class="checkboxes">
			<input type="checkbox" value="Theme" id="checkboxesInput2" name="ThemeCheckbox" onclick="checkEnabled()"> 
			<label for="checkboxesInput2">
			  <h3> Theme </h3>
				<input type="text" placeholder="Enter a Theme here..." id="ThemeSearchBar" class="searchBar" disabled>
			</label>
		</div>
		<br><br><br><br>
		<div class="checkboxes">
			<input type="checkbox" value="Genre" id="checkboxesInput3" name="GenreCheckbox" onclick="checkEnabled()"> 
			<label for="checkboxesInput3">
			  <h3> Genre </h3>
				<input type="text" placeholder="Enter a Genre here..." id="GenreSearchBar" class="searchBar" disabled>
			</label>
		</div>
		<br><br><br><br>
		<div class="checkboxes">
			<input type="checkbox" value="Character" id="checkboxesInput4" name="CharacterCheckbox" onclick="checkEnabled()"> 
			<label for="checkboxesInput4">
			  <h3> Character </h3>
				<input type="text" placeholder="Enter a Character here..." id="CharacterSearchBar" class="searchBar" disabled>
			</label>
		</div>
		<br><br><br><br>
		<div class="checkboxes">
			<input type="checkbox" value="KeyWord" id="checkboxesInput5" name="KeyWordCheckbox" onclick="checkEnabled()"> 
			<label for="checkboxesInput5">
			  <h3> Word </h3>
				<input type="text" placeholder="Enter a Key Word here..." id="KeyWordSearchBar" class="searchBar" disabled>
			</label>
		</div>
		<br><br><br><br>
		<div class="checkboxes">
			<input type="checkbox" value="KeyWord" id="checkboxesInput6" name="KeyWordCheckbox" onclick="checkEnabled()"> 
			<label for="checkboxesInput6">
			  <h3> Type </h3>
			  <select id="TypeDropdown"disabled>
				<option>Single Issue</option>
				<option>Prestige Edition</option>
				<option>Digital Comic</option>
				<option>Digital First</option>
				<option>Collected Edition</option>
				<option>Original Graphic Novel</option>
			  </select>
			</label>
		</div>
		<br><br><br><br>
		<div class="checkboxes">
			<input type="checkbox" value="KeyWord" id="checkboxesInput7" name="KeyWordCheckbox" onclick="checkEnabled()"> 
			<label for="checkboxesInput7">
			  <h3 id="yadult">YoungAdult</h3>
			  <div class="radiobuttons">
			    <input type="radio" name="adult" value="yes" id="yes" class="yesradio"> 
				  <label for="yes"><h3 class="yeslabel"> Yes </h3></label>
			    <input type="radio" name="adult" value="no" id = "no" class="noradio">
				  <label for="no"><h3 class="nolabel"> No </h3></label>
			  </div>
			</label>
		</div>
	</form>

</div>


  <br><br>
<form class="search" method="GET" action="SearchResults.php">
	<input type="submit" value="Search">
</form>

<script>
	function checkEnabled(){
		if(document.getElementById('checkboxesInput1').checked == true){
			document.getElementById('TitleSearchBar').disabled = false;
		}else{
		    document.getElementById('TitleSearchBar').disabled = true;
		}
		if(document.getElementById('checkboxesInput2').checked == true){
		    document.getElementById('ThemeSearchBar').disabled = false;
		}else{
		    document.getElementById('ThemeSearchBar').disabled = true;
		}
		if(document.getElementById('checkboxesInput3').checked == true){
		    document.getElementById('GenreSearchBar').disabled = false;
		}else{
		    document.getElementById('GenreSearchBar').disabled = true;
		}
		if(document.getElementById('checkboxesInput4').checked == true){
		    document.getElementById('CharacterSearchBar').disabled = false;
		}else{
		    document.getElementById('CharacterSearchBar').disabled = true;	
		}
		if(document.getElementById('checkboxesInput5').checked == true){
		    document.getElementById('KeyWordSearchBar').disabled = false;
		}else{
		    document.getElementById('KeyWordSearchBar').disabled = true;	
		}
				if(document.getElementById('checkboxesInput6').checked == true){
		    document.getElementById('TypeDropdown').disabled = false;
		}else{
		    document.getElementById('TypeDropdown').disabled = true;	
		}
	}	
</script>

<?php include( 'includes/footer.php' ); ?>