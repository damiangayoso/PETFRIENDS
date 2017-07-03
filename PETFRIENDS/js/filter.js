function myFunction_search(a) {
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

function myFunction_other_search(b) {
  // Declare variables 
  
  var inputb, filterb, tableb, trb, td, ib, nameb, typeb, breedb;
  inputb = document.getElementById("Search_other");
  filterb = inputb.value.toUpperCase();
  tableb = document.getElementById(b);
  trb = tableb.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (ib = 0; ib < trb.length; ib++) {
    nameb = trb[ib].getElementsByTagName("td")[1];
	typeb = trb[ib].getElementsByTagName("td")[2];
	breedb = trb[ib].getElementsByTagName("td")[3];
	gender = trb[ib].getElementsByTagName("td")[4];
	age = trb[ib].getElementsByTagName("td")[5];
	size = trb[ib].getElementsByTagName("td")[6];
    if (nameb || typeb || breedb) {
    if ((nameb.innerHTML.toUpperCase().indexOf(filterb) > -1) || (typeb.innerHTML.toUpperCase().indexOf(filterb) > -1) || (breedb.innerHTML.toUpperCase().indexOf(filterb) > -1) || (gender.innerHTML.toUpperCase().indexOf(filterb) > -1) || (age.innerHTML.toUpperCase().indexOf(filterb) > -1) || (size.innerHTML.toUpperCase().indexOf(filterb) > -1)) {
        
		trb[ib].style.display = "";
      } else {
		
        trb[ib].style.display = "none";
      }
    }
  }
}

function myFunction_cachorros_search(c) {
  // Declare variables 
  
  var inputc, filterc, tablec, trc, td, ic, namec, typec, breedc;
  inputc = document.getElementById("Search_cachorros");
  filterc = inputc.value.toUpperCase();
  tablec = document.getElementById(c);
  trc = tablec.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (ic = 0; ic < trc.length; ic++) {
    namec = trc[ic].getElementsByTagName("td")[0];
	typec = trc[ic].getElementsByTagName("td")[1];
	breedc = trc[ic].getElementsByTagName("td")[2];

    if (namec || typec || breedc) {
    if ((namec.innerHTML.toUpperCase().indexOf(filterc) > -1) || (typec.innerHTML.toUpperCase().indexOf(filterc) > -1) || (breedc.innerHTML.toUpperCase().indexOf(filterc) > -1)) {
        
		trc[ic].style.display = "";
      } else {
		
        trc[ic].style.display = "none";
      }
    }
  }
}