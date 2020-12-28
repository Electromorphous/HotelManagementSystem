$(".btnedit").click((e) => {
  let textValues = displayData(e);

  let cust_id = $("input[name*='cust_id']");
  let cust_name = $("input[name*='cust_name']");
  let cust_phone = $("input[name*='cust_phone']");
  let email = $("input[name*='email']");

  cust_id.val(textValues[0]);
  cust_name.val(textValues[1]);
  cust_phone.val(textValues[2]);
  email.val(textValues[3]);
});

function displayData(e) {
  let counter = 0;
  const td = $("#tbody tr td");
  let textValues = [];

  for (const value of td) {
    if (value.dataset.id === e.target.dataset.id) {
      textValues[counter++] = value.textContent;
    }
  }
  return textValues;
}
