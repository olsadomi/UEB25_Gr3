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
            display: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-left: 20px;
        }
        .sort-buttons a {
            padding: 8px 15px;
            border-radius: 4px;
            text-decoration: none;
            color: #333;
            font-size: 14px;
        }
        .sort-buttons a:hover {
            background-color: #e0e0e0;
        }
        .sort-buttons a.active {
            background-color:rgb(255, 196, 54);;
            color: white;
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
    class Post{
        private $id;
        private $title;
        private $date;
        private $category;
        private $image;
        private $description;
        private $link;

        public function __construct($id,$title,$date,$category,$image,$description,$link){
            $this->id = $id;
            $this->title = $title;
            $this->date = $date;
            $this->category = $category;
            $this->image = $image;
            $this->description = $description;
            $this->link = $link;
        }

        public function getId(){return $this->id;}
        public function getTitle(){return $this->title;}
        public function getDate(){return $this->date;}
        public function getCategory(){return $this->category;}
        public function getImage(){return $this->image;}
        public function getDescription(){return $this->description;}
        public function getLink(){return $this->link;}
    }

    class PostManager{
        private $posts = [];

        public function addPost(Post $post){
            return $this->posts[] = $post;
        }

        public function sortByTitle($ascending = true){
            $titles=[];
            foreach($this->posts as $index => $post){
                $titles[$index] = $post->getTitle();
            }

            if($ascending){
                asort($titles);
            }
            else{
                arsort($titles);
            }

            $sorted = [];
            foreach(array_keys($titles) as $index){
                $sorted[] = $this->posts[$index];
            }
            $this->posts = $sorted;
        }

        public function sortByDate($newestFirst = true){
            $dates = [];
            foreach($this->posts as $index => $post){
                $dates[$index] = strtotime($post->getDate());
            }

            if($newestFirst){
                arsort($dates);
            }
            else{
                asort($dates);
            }

            $sorted = [];
            foreach(array_keys($dates) as $index){
                $sorted[] = $this->posts[$index];
            }
            $this->posts = $sorted;
        }

        public function getAllPosts(){
            return $this->posts;
        }
    }

    $postManager = new PostManager();
    $postManager->addPost(new Post(
        1,
        'Tollovi në Aeroportin e Prishtinës, shkak anulimet e fluturimeve (VIDEO)',
        '2025-01-02',
        'risi',
        'fotot/foto1.webp',
        'Në prag të sezonit dimëror, Aeroporti Ndërkombëtar i Prishtinës ka nisur një sërë përmirësimesh...',
        'post1-details.php'));
    $postManager->addPost(new Post(
        2,
        'Destinacione të Reja për 2024: Aeroporti Shton Disa Linjat Ndërkombëtare',
        '2022-11-12',
        'destinacionet',
        'fotot/foto2.jpg',
        'Nga fillimi i vitit 2024, Aeroporti i Prishtinës do të ofrojë fluturime për destinacione të reja...',
        'post2-details.php'));
    $postManager->addPost(new Post(
        3,
        'Projekti i Ri "Green Airport" Ndryshon Pamjen e Aeroportit të Prishtinës',
        '2024-02-01',
        'risi',
        'fotot/foto3.webp',
        'Aeroporti Ndërkombëtar i Prishtinës ka nisur një projekt ambicioz të quajtur "Green Airport"...',
        'post3-details.php'));
    $postManager->addPost(new Post(
        4,
        'Aeroporti i Prishtinës Organizoi Panairin e Turizmit - Oportunitete të Rrethit Ndërkombëtar',
        '2024-12-10',
        'evente',
        'fotot/foto4.jpg',
        'Aeroporti i Prishtinës ka hapur dyert për një ngjarje të jashtëzakonshme...',
        'post4-details.php'));
    $postManager->addPost(new Post(
        5,
        'Shërbimi i Self Check-in tani edhe në Aeroportin Ndërkombëtar të Prishtinës "Adem Jashari"',
        '2024-12-19',
        'risi',
        'fotot/foto5.webp',
        'Shërbimi i Self Check-in tani edhe në Aeroportin Ndërkombëtar të Prishtinës...',
        'post5-details.php'));
    $postManager->addPost(new Post(
        6,
        'Aeroporti i Prishtinës Zgjeron Destinacionet Evropiane: Lidhje të Reja për Udhëtarët',
        '2021-06-23',
        'destinacionet',
        'fotot/foto6.jpg',
        'Aeroporti Ndërkombëtar i Prishtinës "Adem Jashari" vazhdon të jetë pika kryesore...',
        'post6-details.php'));
    $postManager->addPost(new Post(
        7,
        'Aeroporti i Prishtinës Pret Forumin e Biznesit 2024: Mundësi të Reja për Sipërmarrësit',
        '2024-11-17',
        'evente',
        'fotot/foto7.webp',
        'Aeroporti Ndërkombëtar i Prishtinës "Adem Jashari" është nikoqir i një eventi madhor...',
        'post7-details.php'));

    $sort_method = $_GET['sort'] ?? 'date_desc';

    switch ($sort_method) {
        case 'title_asc':
            $postManager->sortByTitle(true);
            break;

        case 'title_desc':
            $postManager->sortByTitle(false);
            break;
            
        case 'date_asc':
            $postManager->sortByDate(false);
            break;
            
        case 'date_desc':
        default:
            $postManager->sortByDate(true);
            break;
    }
    $posts = $postManager->getAllPosts();
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
            <div class="post-box <?= $post->getCategory() ?>">
                <img src="<?= $post->getImage() ?>" alt="" class="post-img">
                <h2 class="kategoria"><?= ucfirst($post->getCategory()) ?></h2>
                <a href="<?= $post->getLink() ?>" class="post-titulli"><?= $post->getTitle() ?></a>
                <span class="post-date"><?= date('d M Y', strtotime($post->getDate())) ?></span>
                <p class="post-pershkrimi"><?= $post->getDescription() ?></p>
            </div>
        <?php endforeach; ?>
    </section>

    <!--Lidhja me me JS dhe me navbarin-->
    <script src="news.js"></script>
    <div id="footer-placeholder"></div>
</body>

</html>