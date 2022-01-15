// Menu dans l'admin
function show() {
  var divs = ["agents", "cibles", "contacts", "planques", "missions"];
  var i, divId, div;
  for (i = 0; i < divs.length; i++) {
    divId = divs[i];
    div = document.getElementById(divId);
    if (div.style.display === "none") {
      div.style.display = "block";
    }
  }
}

var divs = ["agents", "cibles", "contacts", "planques", "missions"];
var visibleDivId = null;
function divVisibility(divId) {
  if (visibleDivId === divId) {
    visibleDivId = null;
  } else {
    visibleDivId = divId;
  }
  hideNonVisibleDivs();
}
function hideNonVisibleDivs() {
  var i, divId, div;
  for (i = 0; i < divs.length; i++) {
    divId = divs[i];
    div = document.getElementById(divId);
    if (visibleDivId === divId) {
      div.style.display = "block";
    } else {
      div.style.display = "none";
    }
  }
}

//delete with ajax 

function deleteAjax(id, code, url) {
  if (confirm('Vous êtes sûr ?')) {
    $.ajax({
      type: 'get',
      url: url,
      data: { id: id, code: code },
      success: function (data) {
        $('#delete' + code).hide()
      }
    })
  }
}