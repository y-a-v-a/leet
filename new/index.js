module.exports.leetify = function(stringToLeet, config) {
  let stringAsArray = stringToLeet.split('');

  stringAsArray = stringAsArray.map((element) => {
    const dictEntry = dictionary[element.toLowerCase()];
    if (!dictEntry) {
      return element;
    }
    const index = (config && config.predictive) ? 0 : Math.floor(Math.random() * dictEntry.length);
    return dictEntry[index];
  });

  return stringAsArray.join('');
};


const dictionary = {
  a: ['@', '/-\\', '/\\', '4'],
  b: ['|3', '13', 'I3', '6', ']3', '!3', '(3', '/3', ')3', '8'],
  c: ['(', '[', '©', '<'],
  d: ['|)', '])', '[)', 'I>', '|>'],
  e: ['3'],
  f: ['|=', '/=', 'ph', 'PH'],
  g: ['6', '9', '(_-', '&', '(_+', 'C-'],
  h: ['|-|', ']-[', '[-]', '|~|', '#', ')-('],
  i: ['1', '|', '!'],
  j: ['_|', '_/'],
  k: ['|<', '|{'],
  l: ['|_', '1', '1_'],
  m: ['|\/|', '//\\\\//\\\\', '|v|', ']V[', '/\/\\', '/|\\', '|V|', '//.', '.\\\\\\'],
  n: ['|\|', ']\[', '/\/'],
  o: ['0', '()'],
  p: ['|?', '|>', '9', 'q'],
  q: ['(_),', '()_', 'O,', '0_'],
  r: ['2', '|~', '|2', '®'],
  s: ['5', '$', 'Z', 'z'],
  t: ['+', '7'],
  u: ['|_|', '(_)'],
  v: ['\/', '\\\\\\//'],
  w: ['\\\\\\//\\\\\\//', '`//', '\\/\\/', '\\\\\'', '\V/'],
  x: ['}{', '><'],
  y: ['`/'],
  z: ['2', '7_', '~/_'],
};
