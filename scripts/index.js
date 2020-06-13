$(document).ready(function () {
  $('.change-language').change(function () {
    const lang = $('.change-language').val()
    $.post(
      '/src/settings/setLanguage.php',
      {
        lang,
      },
      function () {
        location.replace('')
      }
    )
  })

  let deleteButtons = document.querySelectorAll('.delete-user')
  let editButtons = document.querySelectorAll('.edit-user')

  for (let i = 0; i < deleteButtons.length; i++) {
    deleteButtons[i].onclick = () => {
      let id = deleteButtons[i].value
      $.post(
        '/src/privilege/delete.php',
        {
          id,
        },
        function () {
          location.replace('')
        }
      )
    }
  }

  setTimeout(() => {
    let alert = document.querySelector('.mes')
    alert.style.display = 'none'
  }, 3000)
})
