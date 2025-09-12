const input = document.getElementById("quantity");
const btnDecrement = document.getElementById("decrement");
const btnIncrement = document.getElementById("increment");

btnDecrement.addEventListener("click", () => {
  let currentValue = parseInt(input.value) || 1;
  const min = parseInt(input.min) || 1;

  if (currentValue > min) {
    input.value = currentValue - 1;
  }
});

btnIncrement.addEventListener("click", () => {
  let currentValue = parseInt(input.value) || 1;
  input.value = currentValue + 1;
});
