const leet = require('../index');

const result = leet.leetify('abc', { predictive: true });

if (!(result === '@|3(')) {
  console.log('test fails');
} else {
  console.log('test passes');
}

for (let i = 0; i < 10; i++) {
  console.log(leet.leetify('The quick brown fox jumps over the lazy dog'));
  console.log('');
}

for (let i = 0; i < 10; i++) {
  console.log(leet.leetify('who  what  where  why  when'));
  console.log('');
}
