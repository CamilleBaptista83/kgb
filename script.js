

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


function deleteAjaxMission(id, code, id_mission, url) {
  if (confirm('Vous êtes sûr ?')) {
    $.ajax({
      type: 'get',
      url: url,
      data: {
        id: id,
        id_mission: id_mission,
        code: code
      },
      success: function (data) {
        $('#delete' + code).hide()
      }
    })
  }
}
