$(document).ready(function () {

  //When a key is pressed in the input field, run the function
  $("#SearchCust").keyup(SearchCustomer);

  //When the Active button is checked run the function
  $("#checkActive").click(ActCheckbox);

  //When the Disabled button is checked run the function
  $("#checkDisabled").click(DisCheckbox);

});





//Search with first priority the search bar an then the check boxes
function SearchCustomer() {
  var table, tr, filter, tdFilter, tdCheck, i, checkAct, checkDis, filterAct, filterDis, txtCheck, txtFilter;
  checkAct = document.getElementById("checkActive");
  checkDis = document.getElementById("checkDisabled");

  table = document.getElementById("CustTable");
  tr = table.getElementsByTagName("tr");

  filterAct = "Active".toUpperCase();
  filterDis = "Disabled".toUpperCase();
  filter = document.getElementById("SearchCust").value.toUpperCase();

  for (i = 0; i < tr.length; i++) {
    tdFilter = tr[i].getElementsByTagName("td")[0];
    tdCheck = tr[i].getElementsByTagName("td")[2];

    if (tdFilter) {
      txtFilter = tdFilter.textContent || tdFilter.innerText;

      if (txtFilter.toUpperCase().indexOf(filter) > -1)
        tr[i].style.display = "";
      else
        tr[i].style.display = "none";
    }

    if (checkAct.checked || checkDis.checked) {
      if (tdCheck && tr[i].style.display != "none") {
        txtCheck = tdCheck.textContent || tdCheck.innerText;
        if ((txtCheck.toUpperCase().indexOf(filterAct) > -1) && checkAct.checked ||
          (txtCheck.toUpperCase().indexOf(filterDis) > -1) && checkDis.checked)
          tr[i].style.display = "";
        else
          tr[i].style.display = "none";
      }
    }
  }
}



//If checked to active, uncheck to allo j search customers
function ActCheckbox() {
  checkDis = document.getElementById("checkDisabled");

  if (checkDis.checked == true)
    checkDis.checked = false

  SearchCustomer()
}

//If checked to disabled, uncheck to allo j search customers
function DisCheckbox() {
  checkAct = document.getElementById("checkActive");

  if (checkAct.checked == true)
    checkAct.checked = false

  SearchCustomer()
}
