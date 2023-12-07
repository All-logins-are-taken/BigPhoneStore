# How to run application

Task link: https://dev.ecdltd.com/ecd-public/interview-project-1

#### Requirement:

PHP 7 or higher<br>
The code is executable from a terminal.
Parsing needed files should be put into the `files` folder.<br>
Available extension: CSV and TSV<br>
Expecting file headings:
- make: 'Apple' (string, required) - Brand name
- model: 'iPhone 6s Plus' (string, required) - Model name
- condition: 'Working' (string) - Condition name
- grade: 'Grade A' (string) - Grade Name
- capacity: '256GB' (string) - GB Spec name
- colour: 'Red' (string) - Colour name
- network: 'Unlocked' (string) - Network name

Possible parsing file formats can be added in future: JSON, XML

#### Example Application API:

`parser.php --file parsing_file_name.csv --headings=make#model#condition#grade#capacity#colour#network --unique-combinations=combination_count.csv`

When the above is run the parser will display row by row each product object representation of the row from `/files/parsing_file_name.csv` <br>
regarding parameter -- file and actual name of the file from files folder<br>
Required headings (Make (brand) and Model) if ain't found within file will throw an exception.
Headings parameter keeps full heading list of a parsing file.<br>
You should map list `'make', 'model', 'colour', 'capacity', 'network', 'grade', 'condition', 'count'` of interesting for parsing headings<br>
For instance: your file has 10 headings in different order: some1,....,some10. Then parameter list would look this way (with `#` as delimiter):<br>
`--headings=some1#make#model#some4#grade#capacity#some7#condition#colour#network`<br>
If you know that make information exists in the second heading you put it second<br>
if model in the third then one has it place<br>
and so on<br>
Main thing to keep right mapping name and place in the list of headings, don't skip any.<br> 
Other names (which are not interesting for parsing or don't correlate with one from the mapped list above) can be taken from file as it is or have dumb name, let's say `some<br>

If parameter --unique-combinations is passed then will be created a file with a grouped count for each unique combination in files folder with the name from parameter and extension csv.<br>

#### Example Unique Combinations File:
- make: 'Apple'
- model: 'iPhone 6s Plus'
- colour: 'Red'
- capacity: '256GB'
- network: 'Unlocked'
- grade: 'Grade A'
- condition: 'Working'
- count: 129

Short tests example can be run with:

`parsertest.php -t tsv`

Tests represented only for tsv just for introduction
