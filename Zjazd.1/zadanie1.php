$fruits = array("jablko", "banan", "pomarancza");
$fruitsCount = count($fruits);

for ($i = $fruitsCount - 1; $i >= 0; $i--) {
    $reversedFruit = strrev($fruits[$i]);
    echo $reversedFruit . "\n";
    
    if (strtolower($fruits[$i][0]) === 'p') {
        echo "Zaczyna się na literę \"p\"\n";
    }
}