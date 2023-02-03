$('#Modal').on('show.bs.modal', function(event)
{
  let button = $(event.relatedTarget);
  let idVal = button.data('id');
  let titleVal = button.data('title');
  let contentVal = button.data('content');
  let modal = $(this);
  let id = document.getElementById("advice_id").value = idVal;
  let catch1 = document.getElementById("advice_title").value = titleVal;
  let catch2 = document.getElementById("advice_content").value = contentVal;
});

