$(".btnedit").click((e) => {
  let textValues = displayData(e);

  let cust_id = $("input[name*='cust_id']");
  let room_id = $("input[name*='room_id']");
  let rating = $("input[name*='rating']");

  cust_id.val(textValues[0]);
  room_id.val(textValues[1]);
  rating.val(textValues[2]);
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
