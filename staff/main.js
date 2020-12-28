$(".btnedit").click((e) => {
  let textValues = displayData(e);
  console.log(textValues);

  let staff_id = $("input[name*='staff_id']");
  let name = $("input[name*='name']");
  let job = $("input[name*='job']");
  let salary = $("input[name*='salary']");
  let staff_phone = $("input[name*='staff_phone']");

  staff_id.val(textValues[0]);
  name.val(textValues[1]);
  job.val(textValues[2]);
  salary.val(textValues[3]);
  staff_phone.val(textValues[4]);
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
