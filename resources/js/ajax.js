

exports.get = function ajaxGet( url, callback )
{
  $.ajax({
    type: 'GET',
    url: url,
    dataType: 'json',
  }).done(function (data) {
    callback(data);
  });
}
