# FileConverter

Converts CSV files to YAML files.

## Why?

I wanted a quick way to turn a CSV file generated by a `SELECT * INTO OUTFILE 'the_file.csv' FROM my_table` into a YAML formatted file.
*Note:* Rows containing `NULL` values (changed to `\N` by MySQL) when parsed will be removed. 
