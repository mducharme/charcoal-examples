# Charcoal Examples

Various code examples explaining the Charcoal Framework.
Also serve as Test Cases for all functions.

To run:
- Clone this repository
  - `git clone https://github.com/mducharme/charcoal-examples`
- Run `install.sh`
  - This will install composer
  - This will also create a `charcoal_examples` database and load the example data set.
- Run all scripts with `php run_all.php` or run the examples individually.
- Read the code in the `examples/` folder.

## Examples

- 01.1.1.Understanding-the-Charcoal-Model.php
  - Basic usage of how Model / Metadata / Property are linked together
- 01.2.1.Model-output-with-Charcoal-View.php
  - Build on the previous example and `render()` the model
- 02.2.1.Metadata-JSON-Loader.php
  - No more hardcoded metadata, load from a JSON file
- 02.2.2.Automatic-loading-from-Object-type.php
  - When passing a model ident to the constructor, magic happens
- 02.4.Collection-Loader.php
  - 
