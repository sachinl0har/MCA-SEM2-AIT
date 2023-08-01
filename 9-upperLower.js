// index.js
const yargs = require('yargs');

// Configure yargs to accept the input string as a command-line argument
const argv = yargs
  .command('convert', 'Convert the entered string into uppercase or lowercase', {
    string: {
      describe: 'Input string to convert',
      demandOption: true, // The string argument is required
      alias: 's', // Short form of the argument (e.g., -s)
    },
    uppercase: {
      describe: 'Convert to uppercase',
      type: 'boolean', // A flag that indicates if the conversion should be to uppercase
      alias: 'u', // Short form of the argument (e.g., -u)
    },
  })
  .help() // Provide help options
  .alias('help', 'h')
  .argv;

// Get the input string from the command-line argument
const inputString = argv.string;

// Check if the conversion should be to uppercase or lowercase
const isUppercase = argv.uppercase;

// Perform the conversion based on the flag
const result = isUppercase ? inputString.toUpperCase() : inputString.toLowerCase();

// Display the result
console.log('Result:', result);
