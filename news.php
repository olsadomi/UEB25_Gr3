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
            background-color: rgb(255, 196, 54);
            ;
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
            <?php
            require 'db.php';

            $stmt = $conn->prepare("SELECT id, title FROM news ORDER BY created_at DESC LIMIT 4");
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()):
                ?>
                <span class="carousel-item">
                    <?php echo htmlspecialchars($row['title']); ?>
                </span>
            <?php endwhile; ?>
            <?php $stmt->close(); ?>
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
    class Post
    {
        private $id;
        private $title;
        private $date;
        private $category;
        private $image;
        private $description;
        private $link;

        public function __construct($id, $title, $date, $category, $image, $description, $link)
        {
            $this->id = $id;
            $this->title = $title;
            $this->date = $date;
            $this->category = $category;
            $this->image = $image;
            $this->description = $description;
            $this->link = $link;
        }

        public function getId()
        {
            return $this->id;
        }
        public function getTitle()
        {
            return $this->title;
        }
        public function getDate()
        {
            return $this->date;
        }
        public function getCategory()
        {
            return $this->category;
        }
        public function getImage()
        {
            return $this->image;
        }
        public function getDescription()
        {
            return $this->description;
        }
        public function getLink()
        {
            return $this->link;
        }
    }

    class PostManager
    {
        private $posts = [];

        public function addPost(Post $post)
        {
            return $this->posts[] = $post;
        }

        public function sortByTitle($ascending = true)
        {
            $titles = [];
            foreach ($this->posts as $index => $post) {
                $titles[$index] = $post->getTitle();
            }

            if ($ascending) {
                asort($titles);
            } else {
                arsort($titles);
            }

            $sorted = [];
            foreach (array_keys($titles) as $index) {
                $sorted[] = $this->posts[$index];
            }
            $this->posts = $sorted;
        }

        public function sortByDate($newestFirst = true)
        {
            $dates = [];
            foreach ($this->posts as $index => $post) {
                $dates[$index] = strtotime($post->getDate());
            }

            if ($newestFirst) {
                arsort($dates);
            } else {
                asort($dates);
            }

            $sorted = [];
            foreach (array_keys($dates) as $index) {
                $sorted[] = $this->posts[$index];
            }
            $this->posts = $sorted;
        }

        public function getAllPosts()
        {
            return $this->posts;
        }
    }

    require 'db.php';

    $postManager = new PostManager();
    $result = $conn->query("SELECT * FROM news ORDER BY created_at DESC");

    while ($row = $result->fetch_assoc()) {
        $postManager->addPost(new Post(
            $row['id'],
            $row['title'],
            $row['created_at'],
            $row['category'],
            $row['image_path'],
            substr($row['content'], 0, 120) . "...",
            'post-details.php?id=' . $row['id']
        ));
    }

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
        <a href="?sort=date_desc"
            class="<?= (!isset($_GET['sort']) || $sort_method === 'date_desc') ? 'active' : '' ?>">Data (më të
            rejat)</a>
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
    <div id="footer-placeholder"></div>
    <script src="/UEB25_GR3/script/news.js"></script>
</body>

</html>