<?php
// init PHP
require_once "./lib.php";
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Home</title>
    <link rel='stylesheet' href='css/styles.css'>
    <link rel='stylesheet' href='css/index-style.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css'>
    <link rel="icon" type="image/png" href="img/fav.png" />

</head>

<body>
    <?php
    printNav();
    ?>
    <div class='main'>
        <img class='home-img' src='img/cars-home.jpg' alt='Home page'>
        <div class='home-img-text'>
            <span>Welcome To Nova</span>
            <h2>Purchase Dream Product & Try.</h2>
            <p>Access to the largest possible number of cars of different types. <br> The possibility of selling any car, regardless of its specifications. <br> The possibility of selling any car that had a collision or specific problems. </p>
            <a href='#home-body' class='button'>Explore</a>
        </div>
    </div>
    <div class='home-body' id='home-body'>
        <div class="best-items">
            <h1>Best Items</h1>
            <p>Explore on the world"s best & largest marketplace with our beautiful products. <br> We want to be a part of your smile, success and future growth. </p>
        </div>
        <div class='cards-grid'>
        <?php            
            $res = Database("select name, price, img_path ,id from items order by id DESC limit 6", 1);
            for($i = 0; $i < count($res); $i++) {
                    $name = $res[$i][0];
                    $price = $res[$i][1];
                    $img_p = $res[$i][2];
                    $item_id = $res[$i][3];
        ?>
                <div class='card'>
                <img src="<?php echo $img_p; ?>" alt=''>
                <span id='name'><?php echo $name; ?></span>
                <br>
                <span>Price: <bold><?php echo $price; ?>$</bold>
                </span>
                <br>
                <a href='/Nova-Auction/pages/item.php?item_id=<?php echo $item_id?>' ><button class='button b_card' >View</button></a>
            </div>

        <?php  }?>

        </div>
        <a class='button' href='/Nova-Auction/pages/products.php'>View More!</a>
    </div>
    <footer class='footer'>
        <p>Copyright © 2022 Nova | Design By Humble Ghost Team</p>
        
    <?php
         $carsRes =  Database('Select cars.id, cars.makes_name, cars.model_name, cars.color, items.price, cars.year_of_make from cars, items where items.car_id = cars.id', 1, MYSQLI_NUM);
         $carsJson = json_encode($carsRes);
         echo "<script>var carsData = " . $carsJson . ";</script>";
        
         $userRes = Database("Select car_id from view_history where user_id = {$_SESSION['user_id']}", 1, MYSQLI_NUM);
         $userJson = json_encode($userRes);
         echo "<script>var userData = " . $userJson . ";</script>";

    ?>
    </footer>

</body>
<script>   
let cars = carsData;
let car_history_ids = userData;

const updatedCars = new Map();

cars.push([1, "BMW", "SUV", "Black", "38677", "2014"]);
cars.push([2, "Chevrolet", "SUV", "Yellow", "40649", "2016"]);
cars.push([3, "BMW", "SUV", "Black", "38677", "2015"]);
cars.push([4, "Subaru", "Hatchback", "Orange", "25650", "2015"]);
cars.push([1, "BMW", "SUV", "Black", "38677", "2014"]);
cars.push([2, "Chevrolet", "SUV", "Yellow", "40649", "2016"]);
cars.push([3, "BMW", "SUV", "Black", "38677", "2015"]);
cars.push([4, "Subaru", "Hatchback", "Orange", "25650", "2015"]);
cars.push([5, "Toyota", "Sedan", "Gray", "39285", "2016"]);
cars.push([6, "Ford", "Truck", "Silver", "42092", "2011"]);
cars.push([7, "Chevrolet", "SUV", "Gray", "49168", "2012"]);
cars.push([8, "Subaru", "SUV", "Blur", "49168", "2012"]);
cars.push([9, "BMW", "SUV", "Gray", "38677", "2012"]);
cars.push([10, "BMW", "Sedan", "Red", "42092", "2016"]);
cars.push([11, "Mercedes-Benz", "Pickup Truck", "Red", "37038", "2015"]);
cars.push([12, "Mercedes-Benz", "Pickup Truck", "Orange", "37038", "2015"]);
cars.push([13, "Volvo", "Sports Car", "Brown", "29614", "2012"]);
cars.push([14, "Nissan", "Coupe", "Yellow", "49168", "2016"]);
cars.push([15, "Chevrolet", "Hatchback", "Gray", "47867", "2015"]);
cars.push([16, "Toyota", "Hatchback", "Gray", "47867", "2015"]);
cars.push([17, "Subaru", "SUV", "Black", "45633", "2016"]);


/* Convert the data to numbers */
const nominalFeatureIndex = [1, 2, 3];
const numaricFeatureIndex = [4, 5];

const uniqueList = unqList(cars, nominalFeatureIndex);

var numberOfElements = 0;

for (let l of cars) {
    const key = l[0];
    const l1 = minMax(l, numaricFeatureIndex);
    const l2 = OneShotEncoding(l, uniqueList);
    const fl = l1.concat(l2);
    updatedCars.set(key, fl);
}

console.log(updatedCars.get(1).length)

const userVector = new Array(updatedCars.get(1).length).fill(0);

for (let i of car_history_ids) {
    const l = updatedCars.get(i);
    for (let z = 0; z < numberOfElements; z++) {
        userVector[z] += l[z];
    }
}

for (let k = 0; k < numberOfElements; k++) {
    userVector[k] /= car_history_ids.length;
}

//Calculate similarity
const finalList = new Map();
updatedCars.forEach((v, k) => {
    const similarity = EuclideanSimilarity(userVector, v);
    finalList.set(similarity, k);
});

//Sort
const sortedByKey = new Map(
    Array.from(finalList).sort((a, b) => a[0] > b[0] ? 1 : -1)
);

//Print
console.log(sortedByKey)

function EuclideanSimilarity(vector1, vector2) {
    let res = 0.0;
    let sum = 0;
    for (let i = 0; i < vector1.length; i++) {
        const diff = vector1[i] - parseFloat(vector2[i]);
        sum += diff ** 2;
    }

    res = Math.sqrt(sum);
    return res;
}

function unqList(daList, nominalIndexes) {
    const map = new Map();
    const res = [];
    for (let i of nominalIndexes) {
        for (let l of daList) {
            map.set(l[i], i);
        }
    }

    map.forEach((value, key) => {
        res.push(key);
    });
    numberOfElements = map.size;
    return res;
}

function OneShotEncoding(list, uniqueList) {
    const res = [];
    for (let l of uniqueList) {
        if (list.includes(l)) {
            res.push(1.0);
        } else {
            res.push(0.0);
        }
    }

    return res;
}

function minMax(list, numaricIndexes) {
    const res = [];

    for (const i of numaricIndexes) {
        let min = Number.MAX_VALUE;
        let max = Number.MIN_VALUE;

        // find the min and the max
        for (const row of cars) {
            const num = parseFloat(row[i]);
            if (num < min) {
                min = num;
            }
            if (num > max) {
                max = num;
            }
        }

        // Calculation
        for (let j = 0; j < list.length; j++) {
            if (i === j) {
                res.push((parseFloat(list[i]) - min) / (max - min));
            }
        }
    }

    return res;
}


</script>
</html>