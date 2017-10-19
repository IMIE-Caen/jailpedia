$(document).ready(function () {
  
  $(".select2-single").select2({
    placeholder: 'Sélectionner un ou plusieurs tags...'
  });
  
  $("#form-ajout-tag").on("submit", function (e) {
    e.preventDefault();
    $.ajax({
      method: "POST",
      url: this.action,
      data: $(this).serialize()
    }).done(function (data) {
      $(".table").append(data);
    });
  });
  
});