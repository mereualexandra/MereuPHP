<h1>Hei smecherilor !!!</h1>
<p>
    <?php
    // echo "Hello World! <br>";
    // $abc = 123;
    // echo "abc abc abc $abc";

    // $abc = "'Gheorghe'; drop table users;";
    // $sql = "select * 
    //         from users
    //         where name == $abc";
    // echo $sql;

    // // php is weird with $ -> check error messages
    // //1
    // $x = 5;
    // $y = x + 2;
    // echo $y, $x;

    // //2
    // $x = 5;
    // y = $x + 2;
    // echo $y;

    // // 3
    // $x =  5;
    // $y = array("x" => "am valoare", "y" => "d'aia mare");
    // print $y["x"];

    // // strings and concatenation
    // $abc = 123;
    // echo "biserica
    // acasa
    // rugaciune
    // oi $abc" . 'biserica';


    // // Expressions
    // $x = 5;
    // $y = 10 + $x++;
    // echo "y = $y, x = $x";

    // $x = 5;
    // $y = ($x % 2) ? "e cu rest" : "e pa 0";
    // echo $y;

    // $x = (int)5;
    // $y = (int)2;
    // echo $x / $y;

    // // casting
    // $x = 5;
    // $y = "10" + $x + TRUE;
    // echo "y = $y, x = $x";

    // $x = 5;
    // $y = "10" . $x . TRUE;
    // echo "y = $y, x = $x";

    // $x = 5;
    // echo $x + NULL;

    // echo (int)9.9 - 1;
    // echo "alo " . FALSE . "gara";
    // echo FALSE;
    // echo "alo " . TRUE . "gara";

    // // (if else) + (== vs ===) + (strpos)
    // if ("64" == 64) {
    //     print("yes");
    // } else {
    //     print("no");
    // }

    // if ("694" == 69 + "4") {
    //     print("yes");
    // } else {
    //     print("no");
    // }

    // if (FALSE == "0") {
    //     print("yes");
    // } else {
    //     print("no");
    // }

    // print((5 < 6) == "3" - "1");
    // if ("3" - "1" == (5 < 6)) print("yesssssss");
    // else  print("n000000");

    // if ((5 < 6) === TRUE) {
    //     print("nu are cum sa fie da din nou");
    // } else {
    //     print("no");
    // }

    // if ("5" === 5)
    //     print("yes");
    // else
    //     print("no");

    // $x = "a0123466656789";
    // if (strpos($x, "a")) {
    //     echo "no way";
    // } elseif (strpos($x, FALSE)) {
    //     echo "huh";
    // } else {
    //     echo "hihi " . strpos($x, "3");
    // }

    // //looping
    // $x = 10;
    // while ($x > 0) {
    //     echo $x . "    ";
    //     $x--;
    // }

    // $x = 10;
    // do {
    //     echo $x . "    ";
    //     $x++;
    // } while ($x < 10);

    // for ($i = 0; $i < 10; $i++) {
    //     if ($i == 3) continue;

    //     echo $i . "    ";

    //     if ($i == 5) {
    //         echo $i > 5;
    //         break;
    //     }
    // }


    // // arrays
    // $x = array("a" => array("aa" => array("aaa" => "aloha", "aab" => "blohb"), "ab" => "ab"), "b" => "b");
    // print_r($x);
    // echo "---------<br>";
    // echo "---------<br>";
    // var_dump($x); // you can print "false"
    // var_dump(FALSE);
    // echo "-----------<br>";
    // echo "---------<br>";
    // echo $x["a"]["aa"]["aaa"];

    // $x = array();
    // $x[] = "a";
    // $x[] = "b";
    // print_r($x);
    // echo "<br>";

    // $x = array();
    // $x["abc"] = "a";
    // $x["bcd"] = "b";
    // print_r($x);

    // $x = array("a" => "aa", "b" => "bb", "c" => "cc");
    // var_dump(array_key_exists("d", $x)); // # PHP is weird
    // print($x["d"]);

    // $x = array("a" => "aa", "b" => "bb", "c" => "cc");
    // print "a" . $x["d"];

    // //looping through arrays
    // $x = array("a" => "aa", "b" => "bb", "c" => "cc");
    // foreach ($x as $key => $value) {
    //     echo "key: $key, value: $value <br>";
    // }

    // $x = array("a", "b", "c");
    // foreach ($x as $key => $value) {
    //     echo "key: $key, value: $value <br>";
    // }
    // for ($i = 0; $i < count($x); $i++) {
    //     echo $x[$i] . "<br>";
    // }

    // // sorting arrays
    // $x = array(1, 3, 4, 1, 4, 7, 2,);
    // sort($x);
    // echo "<br> sort: ";
    // print_r($x);


    // $x = array("a" => 1, "c" => 2, "b" => 5);
    // sort($x);
    // echo "<br> sort: ";
    // print_r($x);

    // $x = array("a" => 1, "c" => 2, "b" => 5);
    // asort($x);
    // echo "<br> asort: ";
    // print_r($x);

    // $x = array("a" => 1, "c" => 2, "b" => 5);
    // ksort($x);
    // echo "<br> ksort: ";
    // print_r($x);

    // functions
    // function fist_function($x, &$y, $z = 5)
    // {
    //     $x = 10;
    //     $y = 20;
    //     return $x + $y + $z;
    // }

    // $x = 1;
    // $y = 2;
    // $z = 3;
    // $xyz = fist_function($x, $y, $z);
    // echo "x = $x, y = $y, xyz = $xyz";

    // function upd_arry($x)
    // {
    //     $x["a"] = 10;
    // }


    // $x = array("a" => 1, "b" => 2);
    // upd_arry($x);
    // print_r($x);

    // function upd_list($y)
    // {
    //     $y[0] = 10;
    // }

    // $y = array(1, 2, 3, 4);

    // upd_list($y);
    // print_r($y);

    ?>
</p>