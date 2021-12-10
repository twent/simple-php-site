//
// Авторизация в модальном окне
//

const modalSigninForm = document.querySelector('#modalSigninForm')
const signinBtn = document.querySelector('#signIn')
const modalMessages = document.querySelector('.modal-messages')

signinBtn.addEventListener('click', function(event) {
  event.preventDefault()
  const formData = new FormData(modalSigninForm)
  postData(formData)
  async function postData() {
    const response = await fetch('auth.php', {
      method: 'POST',
      body: formData
    })
    var messages = await response.text()
    var Messages = JSON.parse(messages)   

    if (Messages.errors.length) {
      modalMessages.innerHTML = ''
      Object.entries(Messages.errors).forEach(([key, message]) => {
        var errorsDiv = document.createElement('div')
        errorsDiv.classList.add('alert','alert-danger')
        errorsDiv.innerHTML = message
        modalMessages.append(errorsDiv)
      });
    }
    
    if (Messages.success.length) {
      modalMessages.innerHTML = ''
      Object.entries(Messages.success).forEach(([key, message]) => {
        successDiv = document.createElement('div')
        successDiv.classList.add('alert','alert-success')
        successDiv.innerHTML = message
        modalMessages.append(successDiv)
        redirOnTimer = window.setTimeout(function() { window.location = "/master"; }, 1500)
      });
    
    }
    
  }

})

//
// Слайдер для изображений заявки
//

function slideTicketImage(id) {
  const ticketSlider = document.querySelector(`#image-slider-`+id)
  const images = ticketSlider.querySelectorAll('.image-slider__image')

  images.forEach(image => {
    image.classList.toggle('active')
  })

}

//
// Выбор категории
//
const categoryIdEl = document.querySelector('input.category-select');
const ticketCategory = $(categoryIdEl).val()

Array.from(document.querySelector("#category-select").options).forEach(function(option_element) {
  let option_text = option_element.text;
  let option_value = option_element.value;
  let is_option_selected = option_element.selected;

  (option_text === ticketCategory) ? option_element.selected = true : console.log()

});

//
// Выбор статуса
//
const statusIdEl = document.querySelector('input.status-select');
const ticketStatus = $(statusIdEl).val()

Array.from(document.querySelector("#status-select").options).forEach(function(option_element) {
  let option_text = option_element.text;
  let option_value = option_element.value;
  let is_option_selected = option_element.selected;

  (option_text === ticketStatus) ? option_element.selected = true : console.log()

});

//console.clear();