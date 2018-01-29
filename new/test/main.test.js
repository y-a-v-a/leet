const leet = require('../index');

const result = leet.leetify('abc', { predictive: true });

if (!(result === '@|3(')) {
  console.log('test fails');
} else {
  console.log('test passes');
}

for (let i = 0; i < 10; i++) {
  console.log(leet.leetify('Bye bye!'));
}
