var downloadCities, downloadCitiesForAdmin, jsDelete, submitSearchForm;

downloadCities = function(e) {
  var county_id;
  county_id = $('#county').val();
  return $.get('/city_list/' + county_id).done(function(data) {
    return $("#city").empty().html(data.html);
  });
};

downloadCitiesForAdmin = function(e) {
  var county_id;
  county_id = $('#county_id').val();
  return $.get('/admin/city_list/' + county_id).done(function(data) {
    return $("#admin_form_city_list").empty().html(data.html);
  });
};

submitSearchForm = function(e) {
  var formData;
  e.preventDefault();
  formData = $('#form-search').serialize();
  return $.post('/search_result', formData).done(function(data) {
    return $('#list').empty().html(data.html);
  });
};

jsDelete = function(e) {
  e.preventDefault();
  if (!confirm('Are you sure you want to delete this ?')) {
    return;
  }
  return $.ajax({
    type: 'DELETE',
    url: $(this).attr('href'),
    success: function(results) {
      return location.reload();
    }
  });
};

$(function() {
  $('#county').on('change', downloadCities);
  $('#form-search').addClass('bound').on('submit', submitSearchForm);
  $('#county_id').on('change', downloadCitiesForAdmin);
  return $('a.js-delete').on('click', jsDelete);
});
