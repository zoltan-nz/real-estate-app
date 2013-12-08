downloadCities = (e) ->
  county_id = $('#county').val()
  $.get('/city_list/' + county_id).done (data) ->
    $("#city").empty().html(data.html)

downloadCitiesForAdmin = (e) ->
  county_id = $('#county_id').val()
  $.get('/admin/city_list/' + county_id).done (data) ->
    $("#admin_form_city_list").empty().html(data.html)


submitSearchForm = (e) ->
  e.preventDefault()
  formData = $('#form-search').serialize()
  $.post('/search_result', formData).done (data) ->
      $('#list').empty().html(data.html)

jsDelete = (e) ->
  e.preventDefault()

  if (!confirm('Are you sure you want to delete this ?'))
    return

  $.ajax
    type    : 'DELETE',
    url     : $(this).attr('href'),
    success : (results) ->
      location.reload()



$ ->
  $('#county').on 'change', downloadCities
  $('#form-search').addClass('bound').on 'submit', submitSearchForm

  $('#county_id').on 'change', downloadCitiesForAdmin

  $('a.js-delete').on 'click', jsDelete

