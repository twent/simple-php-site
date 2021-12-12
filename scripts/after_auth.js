//
// Выбор категории
//
const categoryIdEl = document.querySelector('input.category-select');
const ticketCategory = categoryIdEl.value

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
const ticketStatus = statusIdEl.value

Array.from(document.querySelector("#status-select").options).forEach(function(option_element) {
    let option_text = option_element.text;
    let option_value = option_element.value;
    let is_option_selected = option_element.selected;

    (option_text === ticketStatus) ? option_element.selected = true : console.log()

});

console.clear()