function myFunction_other_search(a) {
  // Declare variables 
  
  var input, filter, table, tr, td, i, name, type, breed;
  input = document.getElementById("Search");
  filter = input.value.toUpperCase();
  table = document.getElementById(a);
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    name = tr[i].getElementsByTagName("td")[1];
	type = tr[i].getElementsByTagName("td")[2];
	breed = tr[i].getElementsByTagName("td")[3];
	gender = tr[i].getElementsByTagName("td")[4];
	age = tr[i].getElementsByTagName("td")[5];
	size = tr[i].getElementsByTagName("td")[6];
    if (name || type || breed) {
    if ((name.innerHTML.toUpperCase().indexOf(filter) > -1) || (type.innerHTML.toUpperCase().indexOf(filter) > -1) || (breed.innerHTML.toUpperCase().indexOf(filter) > -1) || (gender.innerHTML.toUpperCase().indexOf(filter) > -1) || (age.innerHTML.toUpperCase().indexOf(filter) > -1) || (size.innerHTML.toUpperCase().indexOf(filter) > -1)) {
        
		tr[i].style.display = "";
      } else {
		
        tr[i].style.display = "none";
      }
    }
  }
}