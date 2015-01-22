php-csv
-------

## Examples

``` php
$csv = CSV::getInstance();
var_dump($csv->decode("Betapsi - Psychology Students' Association,President: Paula Caruana,betapsimalta@gmail.com,http://betapsi.org.mt/,https://www.facebook.com/BetaPsiMalta;
AEGEE-Valletta - The European Students' Forum,President: Christian Frendo,info@aegee-valletta.org,http://www.aegee-valletta.org,http://www.facebook.com/AEGEE.Valletta;
"));
```

``` php
$csv = CSV::getInstance();
$arr = $csv->decode("Betapsi - Psychology Students' Association,President: Paula Caruana,betapsimalta@gmail.com,http://betapsi.org.mt/,https://www.facebook.com/BetaPsiMalta;
AEGEE-Valletta - The European Students' Forum,President: Christian Frendo,info@aegee-valletta.org,http://www.aegee-valletta.org,http://www.facebook.com/AEGEE.Valletta;
");
var_dump($arr);
var_dump($csv->encode($arr));
```