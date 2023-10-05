// var button = document.getElementById("increment-button");
// var counter = document.getElementById("counter");
// var count = 0;

// button.addEventListener("click", function () {
//   count += 1;
//   counter.innerHTML = count;
// });
// var button = document.getElementById("increment-button1");
// var counter = document.getElementById("counter");
// var count = 0;

// button.addEventListener("click", function () {
//   count -= 1;
//   counter.innerHTML = count;
// });
var num = document.getElementById("num");
var amount = num.value;
function cong() {
  amount++;
  document.getElementById("num").value = amount;
}
function tru() {
  if (amount > 1) {
    amount--;
    document.getElementById("num").value = amount;
  }
}
num.addEventListener("input", () => {
  amount = num.value;
  amount = parseInt(amount);
  amount = isNaN(amount) ? 1 : amount;
  document.getElementById("num").value = amount;
});
