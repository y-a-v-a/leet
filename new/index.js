const dictionary = require('./dictionary');

function getRandomNumber(upperBound) {
  return Math.floor(Math.random() * upperBound);
}

module.exports.leetify = function(stringToLeet, config) {
  let stringAsArray = stringToLeet.split('');

  stringAsArray = stringAsArray.map((element) => {
    const dictEntry = dictionary[element.toLowerCase()];
    if (!dictEntry) {
      return element;
    }
    const index = (config && config.predictive) ? 0 : getRandomNumber(dictEntry.length);
    return dictEntry[index];
  });

  return stringAsArray.join('');
};
