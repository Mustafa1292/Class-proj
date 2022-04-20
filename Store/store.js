let btnAdd = document.querySelector("#add-env");
let btnSubtract = document.querySelector("#subtract-env");

let stampAdd = document.querySelector("#add-stamp");
let stampSubtract = document.querySelector("#subtract-stamp");

let bagAdd = document.querySelector("#add-bag");
let bagSubtract = document.querySelector("#subtract-bag");

let input = document.querySelector("input");


btnAdd.addEventListener("click", () => {
  input.value = parseInt(input.value) + 4.99;
});
btnSubtract.addEventListener("click", () => {
  (input.value = parseInt(input.value) - 4.99).toFixed(3);
});

stampAdd.addEventListener("click", () => {
  (input.value = parseInt(input.value) + 1.49).toFixed(3);
});
stampSubtract.addEventListener("click", () => {
  (input.value = parseInt(input.value) - 1.49).toFixed(3);
});

bagAdd.addEventListener("click", () => {
  (input.value = parseInt(input.value) + 15.99).toFixed(3);
});
bagSubtract.addEventListener("click", () => {
  (input.value = parseInt(input.value) - 15.99).toFixed(3);
});