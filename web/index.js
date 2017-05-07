var triggerChange = function(event) {
  event.target.dispatchEvent(new Event('change'));
};

var validateName = function(event) {
  var name = event.target.value;
  var error = event.target.
    parentElement.
    nextElementSibling.
    children[0];

  if (/^[A-Za-z\s]+$/.test(name)) {
     error.style.display = 'none';
  }
  else {
    error.style.display = 'block';
  }
};

var validateAddress = function(event) {
  var address = event.target.value;
  var error = event.target.
    parentElement.
    nextElementSibling.
    children[0];

  var pattern = /^[a-zA-Z0-9-\/] ?([a-zA-Z0-9-\/]|[a-zA-Z0-9-\/] )*[a-zA-Z0-9-\/]$/;

  if (address.match(pattern)) {
    error.style.display = 'none';
  }
  else {
    error.style.display = 'block';
  }
};

var validateCity = function(event) {
  var city = event.target.value;
  var error = event.target.
    parentElement.
    nextElementSibling.
    children[0];

  if (/^[A-Za-z\s]+$/.test(city)) {
     error.style.display = 'none';
  }
  else {
    error.style.display = 'block';
  }
};

var validateState = function(event) {
   var state = event.target.value;
  var error = event.target.
    parentElement.
    nextElementSibling.
    children[0];

  var pattern = /\b([A-Z]{2})\b/;

  if (state.match(pattern)) {
    error.style.display = 'none';
  }
  else {
    error.style.display = 'block';
  }
};

var validateZip = function(event) {
  var zip = event.target.value;
  var error = event.target.
    parentElement.
    nextElementSibling.
    children[0];
  var pattern = /^\d{5}$/;

  if (zip.match(pattern)) {
    error.style.display = 'none';
  }
  else {
    error.style.display = 'block';
  }
};
