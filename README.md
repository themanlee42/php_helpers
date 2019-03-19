# php_helpers

php helpers util useful functions

I could not find a good scientific e notation to decimal notation converter that supports a LARGE number.
So I have decided to make my own.

It is not pretty.  But It does the job.

```
$test = array(
    '1.426456123654165416513514E+24',
    '1.1345435345342424324234324329e-17',    
    '3.32343242342344345e7',
    '12323432234325475234345456345435345345345345',
     '.00001134543534534242432423432432e+17',
     1.1e+17,
    '0.000010000023432432423432324321e+30',
    '0.000010000E+10',
    3.2343e-6,
    '0.002e-6',
    '23300.1e-3',
    23300.1e-5,
    '.233001e-5',
    '2e-6',
    2000e-5,
    '2000e-3',
    '2000e-4',
    '234327389473984739473892342454545434545342344542123274829374300.1e-7',
    '200.1e-234',
    '2343249483094834374890E233'
);
foreach($test as $e_notation){
    echo sci_to_dec((string)$e_notation);    
  echo "<BR>";    
}

Outputs

1426456123654165416513514

0.000000000000000011345435345342424324234324329

33234324.2342344345

12323432234325475234345456345435345345345345

1134543534534.242432423432432

110000000000000000

10000023432432423432324321

100000

0.0000032343

0.000000002

23.3001

0.233001

0.000002330010233001

0.000002

0.02

2

0.2000

23432738947398473947389234245454543454534234454212327482.93743001

0.000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000
0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000002001

23432494830948343748900000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000
0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000

