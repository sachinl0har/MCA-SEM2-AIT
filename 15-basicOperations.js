let result = '0';
let operations = [];

function updateResult() {
  document.getElementById('result').textContent = result;
}

function appendToResult(value) {
  if (result === '0') {
    result = value.toString();
  } else {
    result += value.toString();
  }
  updateResult();
}

function clearResult() {
  result = '0';
  updateResult();
}

function performOperation(operator) {
  operations.push(result);
  operations.push(operator);
  result = '0';
  updateResult();
}

function calculate() {
  operations.push(result);
  let expression = operations.join(' ');
  result = eval(expression).toString();
  operations = [];
  updateResult();
}

updateResult();
