<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="/Nova-Auction/css/styles.css">
    <link rel="stylesheet" href="/Nova-Auction/css/products.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <?php 
        require "../lib.php";
        printNav(0);
    ?>


    <div class="main">

        <div class="search-options">
            <form class="search-form" action="" method="post">
                <select name="cities" id="cities">
                    <option value="Amman">City</option>
                    <option value="Irbid">Amman</option>
                </select>

                <select name="car-mekes" id="car-mekes">
                    <option value="0">Car makes</option>
                    <option value="BMW">BMW</option>
                </select>

                <select name="Car-type" id="car-type">
                    <option value="0">Car type</option>
                    <option value="BMW">4*4</option>
                </select>

                <select name="model" id="model">
                    <option value="0">Model</option>
                    <option value="BMW">BMW</option>
                </select>

                <select name="Year-from" id="year-from">
                    <option value="0">Year from</option>
                    <option value="BMW">2000</option>
                </select>

                <select name="Year-To" id="year-to">
                    <option value="0">Year to</option>
                    <option value="BMW">2023</option>
                </select>

                <button class="button" type="submit">Search</button>
            </form>
        </div>

        <div class="search-details">
            <p>Showing 1-12 of 24 results</p>
            <select name="Sort" id="sort">
                <option value="0">Sort by</option>
                <option value="a-z">A-Z</option>
            </select>
        </div>

        <div class="cards-grid">
            <div class="card">
                <img src="https://picsum.photos/10?a" alt="">
                <span style="font-size:25px ;">Test car</span><br>
                <span>Current bid: <bold>252$</bold></span><br>
                <button class="button b_card">Place a bid</button>
            </div>
            <div class="card">
                <img src="https://picsum.photos/10?b" alt="">
                <span style="font-size:25px ;">Test car</span><br>
                <span>Current bid: <bold>252$</bold></span><br>
                <button class="button b_card">Place a bid</button>
            </div>
            <div class="card">
                <img src="https://picsum.photos/10?c" alt="">
                <span style="font-size:25px ;">Test car</span><br>
                <span>Current bid: <bold>252$</bold></span><br>
                <button class="button b_card">Place a bid</button>
            </div>
            <div class="card">
                <img src="https://picsum.photos/10?d" alt="">
                <span style="font-size:25px ;">Test car</span><br>
                <span>Current bid: <bold>252$</bold></span><br>
                <button class="button b_card">Place a bid</button>
            </div>
            <div class="card">
                <img src="https://picsum.photos/10?e" alt="">
                <span style="font-size:25px ;">Test car</span><br>
                <span>Current bid: <bold>252$</bold></span><br>
                <button class="button b_card">Place a bid</button>
            </div>
        </div>
        
        <div class="page-counter">
            <button class="button">1</button>
            <button class="button">2</button>
            <button class="button">3</button>
        </div>
        
    </div>
    <footer class="footer">
        <p>Copyright &copy; 2022 Nova Auction | Design By Humble Ghost Team</p>
    </footer>
</body>
</html>