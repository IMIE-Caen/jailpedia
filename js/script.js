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

  $(document).on("click", ".btn-delete-tag", function (e) {
    e.preventDefault();
    var line = $(this).parent().parent();
    $.ajax({
      method: "GET",
      url: this.href
    }).done(function (data) {
      line.hide('slow', function(){ line.remove(); });
    });
  });
  
});