$('#login').submit(function (e) {
  e.preventDefault();

  let $form = $(this);

  $.ajax({
    type: "POST",
    url: site_url + 'login/auth',
    data: $form.serialize(),
    dataType: "html",
    success: function (response) {
      var response = JSON.parse(response);

      if(response.status){
        alert(response.message);
        window.location.href = site_url + 'home/';
      }else{
        alert(response.message);
      }
    },
    error: function () { alert("Error"); }
  });
});
