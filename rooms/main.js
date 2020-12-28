$(".btnedit").click((e) => {
  let textValues = displayData(e);

  let room_id = $("input[name*='room_id']");
  let room_type = $("input[name*='room_type']");
  let room_status = $("input[name*='room_status']");
  let rent = $("input[name*='rent']");

  room_id.val(textValues[0]);
  room_type.val(textValues[1]);
  room_status.val(textValues[2]);
  rent.val(textValues[3].replace("₹ ", ""));
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
