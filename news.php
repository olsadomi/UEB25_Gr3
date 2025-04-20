<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="logo-favicon.png">
    <title>Lajmet e fundit - Airport Prishtinë</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="news.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <style>
        .sort-buttons {
            margin: 15px 0;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-left: 
        }
        .sort-buttons a {
            padding: 8px 15px;
            background-color: #f0f0f0;
            border: 1px solid #ddd;
            border-radius: 4px;
            text-decoration: none;
            color: #333;
            font-size: 14px;
        }
        .sort-buttons a:hover {
            background-color: #e0e0e0;
        }
        .sort-buttons a.active {
            background-color: #0056b3;
            color: white;
            border-color: #0056b3;
        }
    </style>
</head>

<body>
    <nav>
        <div id="navbar-placeholder"></div>
    </nav>


    <!--Krijimi i nje section-->
    <section class="news-home">
        <div class="news-text">
            <h2 class="news-titulli">Faqja Kryesore Per Lajme</h2>
            <span class="news-nentitulli">Gjithqka qe ju duhet te dini</span>
        </div>
    </section>

    <!-- Moduli i Lajmeve të Fundit -->
    <div class="latest-news-carousel">
        <h3>Lajmet e Fundit</h3>
        <div class="carousel">
            <span class="carousel-item">Lajmi 1: Tollovi në Aeroportin e Prishtinës, shkak anulimet e
            fluturimeve.</span>
            <span class="carousel-item">Lajmi 2: Event i ri në Aeroport për turistët!</span>
            <span class="carousel-item">Lajmi 3: Fluturime të reja për 2024.</span>
            <span class="carousel-item">Lajmi 4: Shërbimi i Self Check-in.</span>
        </div>
    </div>

    <div class="filter-search-container">
        <!--Post filteri-->
        <div class="filter-center">
            <div class="post-filter">
                <span class="filter-item active-filter" data-filter="all">All</span>
                <span class="filter-item" data-filter="destinacionet">Destinacionet</span>
                <span class="filter-item" data-filter="evente">Evente</span>
                <span class="filter-item" data-filter="risi">Risi</span>
            </div>
        </div>
        <!-- Shiriti i kërkimit -->
        <div class="search-bar">
            <input type="text" id="search-input" placeholder="Kërko postime...">
        </div>
    </div>

    <?php
    $posts = [
        [
            'id' => 1,
            'title' => 'Tollovi në Aeroportin e Prishtinës, shkak anulimet e fluturimeve (VIDEO)',
            'date' => '2025-01-02',
            'category' => 'risi',
            'image' => 'fotot/foto1.webp',
            'description' => 'Në prag të sezonit dimëror, Aeroporti Ndërkombëtar i Prishtinës ka nisur një sërë përmirësimesh...',
            'link' => 'post1-details.php'
        ],
        [
            'id' => 2,
            'title' => 'Destinacione të Reja për 2024: Aeroporti Shton Disa Linjat Ndërkombëtare',
            'date' => '2022-11-12',
            'category' => 'destinacionet',
            'image' => 'fotot/foto2.jpg',
            'description' => 'Nga fillimi i vitit 2024, Aeroporti i Prishtinës do të ofrojë fluturime për destinacione të reja...',
            'link' => 'post2-details.php'
        ],
        [
            'id' => 3,
            'title' => 'Projekti i Ri "Green Airport" Ndryshon Pamjen e Aeroportit të Prishtinës',
            'date' => '2024-02-01',
            'category' => 'risi',
            'image' => 'fotot/foto3.webp',
            'description' => 'Aeroporti Ndërkombëtar i Prishtinës ka nisur një projekt ambicioz të quajtur "Green Airport"...',
            'link' => 'post3-details.php'
        ],
        [
            'id' => 4,
            'title' => 'Aeroporti i Prishtinës Organizoi Panairin e Turizmit - Oportunitete të Rrethit Ndërkombëtar',
            'date' => '2024-12-10',
            'category' => 'evente',
            'image' => 'fotot/foto4.jpg',
            'description' => 'Aeroporti i Prishtinës ka hapur dyert për një ngjarje të jashtëzakonshme...',
            'link' => 'post4-details.php'
        ],
        [
            'id' => 5,
            'title' => 'Shërbimi i Self Check-in tani edhe në Aeroportin Ndërkombëtar të Prishtinës "Adem Jashari"',
            'date' => '2024-12-19',
            'category' => 'risi',
            'image' => 'fotot/foto5.webp',
            'description' => 'Shërbimi i Self Check-in tani edhe në Aeroportin Ndërkombëtar të Prishtinës...',
            'link' => 'post5-details.php'
        ],
        [
            'id' => 6,
            'title' => 'Aeroporti i Prishtinës Zgjeron Destinacionet Evropiane: Lidhje të Reja për Udhëtarët',
            'date' => '2021-06-23',
            'category' => 'destinacionet',
            'image' => 'fotot/foto6.jpg',
            'description' => 'Aeroporti Ndërkombëtar i Prishtinës "Adem Jashari" vazhdon të jetë pika kryesore...',
            'link' => 'post6-details.php'
        ],
        [
            'id' => 7,
            'title' => 'Aeroporti i Prishtinës Pret Forumin e Biznesit 2024: Mundësi të Reja për Sipërmarrësit',
            'date' => '2024-11-17',
            'category' => 'evente',
            'image' => 'fotot/foto7.webp',
            'description' => 'Aeroporti Ndërkombëtar i Prishtinës "Adem Jashari" është nikoqir i një eventi madhor...',
            'link' => 'post7-details.php'
        ]
    ];

    $sort_method = $_GET['sort'] ?? 'date_desc';

    switch ($sort_method) {
        case 'title_asc':
            $titles = [];
            foreach ($posts as $index => $post) {
                $titles[$index] = $post['title'];
            }
            asort(array: $titles);
            
            $sorted_posts = [];
            foreach (array_keys($titles) as $index) {
                $sorted_posts[] = $posts[$index];
            }
            $posts = $sorted_posts;
            break;
            
        case 'title_desc':
            $titles = [];
            foreach ($posts as $index => $post) {
                $titles[$index] = $post['title'];
            }
            arsort($titles); 
            
            $sorted_posts = [];
            foreach (array_keys($titles) as $index) {
                $sorted_posts[] = $posts[$index];
            }
            $posts = $sorted_posts;
            break;
            
        case 'date_asc':
            $dated_posts = [];
            foreach ($posts as $post) {
                $dated_posts[strtotime($post['date'])] = $post;
            }
            ksort($dated_posts);
            $posts = array_values($dated_posts);
            break;
            
        case 'date_desc':
        default:
            $dated_posts = [];
            foreach ($posts as $post) {
                $dated_posts[strtotime($post['date'])] = $post;
            }
            krsort($dated_posts);
            $posts = array_values($dated_posts);
            break;
    }
    ?>

    <div class="sort-buttons">
        <span>Rendit sipas:</span>
        <a href="?sort=title_asc" class="<?= $sort_method === 'title_asc' ? 'active' : '' ?>">Titulli (A-Z)</a>
        <a href="?sort=title_desc" class="<?= $sort_method === 'title_desc' ? 'active' : '' ?>">Titulli (Z-A)</a>
        <a href="?sort=date_desc" class="<?= (!isset($_GET['sort']) || $sort_method === 'date_desc') ? 'active' : '' ?>">Data (më të rejat)</a>
        <a href="?sort=date_asc" class="<?= $sort_method === 'date_asc' ? 'active' : '' ?>">Data (më të vjetrat)</a>
    </div>

    <section class="postet">
        <?php foreach ($posts as $post): ?>
            <div class="post-box <?= $post['category'] ?>">
                <img src="<?= $post['image'] ?>" alt="" class="post-img">
                <h2 class="kategoria"><?= ucfirst($post['category']) ?></h2>
                <a href="<?= $post['link'] ?>" class="post-titulli"><?= $post['title'] ?></a>
                <span class="post-date"><?= date('d M Y', strtotime($post['date'])) ?></span>
                <p class="post-pershkrimi"><?= $post['description'] ?></p>
            </div>
        <?php endforeach; ?>
    </section>

    <!--Lidhja me me JS dhe me navbarin-->
    <script src="news.js"></script>
    <div id="footer-placeholder"></div>
</body>

</html>