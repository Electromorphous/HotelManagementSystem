$(".btnedit").click((e) => {
  let textValues = displayData(e);
  console.log(textValues);

  let res_id = $("input[name*='res_id']");
  let cust_id = $("input[name*='cust_id']");
  let room_id = $("input[name*='room_id']");
  let start_date = $("input[name*='start_date']");
  let end_date = $("input[name*='end_date']");

  res_id.val(textValues[0]);
  cust_id.val(textValues[1]);
  room_id.val(textValues[2]);
  start_date.val(textValues[3]);
  end_date.val(textValues[4]);
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
