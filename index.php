<?php
require 'includes/header.php';
?>
<body>
<main>
    <!-- Introduction Section -->
    <section id="introduction">
        <div class="intro-wrapper">
            <h1>Welcome to Atlanta</h1>
            <p>Atlanta, the capital city of Georgia in the United States, offers a unique blend of history, culture, and modern attractions, making it a favorite destination for visitors worldwide.</p>
            <a class="jump-btn" href="#attractions">See Attractions</a>
        </div>
    </section>
    <!-- City Info Table -->
    <section id="info">
        <div class="table-wrap">
        <h2>Atlanta Quick Facts</h2>
            <table>
            <tbody>
                <tr>
                    <td>Population</td>
                    <td>490,270</td>
                </tr>
                <tr>
                    <td>Geographic Size</td>
                    <td>136.3 mi²</td>
                </tr>
                <tr>
                    <td>Average Temperature</td>
                    <td>61 degrees Fahrenheit</td>
                </tr>
                <tr>
                    <td>Average Hotel Cost Per Night</td>
                    <td>$131</td>
                </tr>
            </tbody>
            </table>
        </div>
    </section>
    <!-- Attractions Section -->
    <section id="attractions">
        <h2>Top Attractions in Atlanta</h2>
        <!-- Attraction List -->
            <div class="attractions-wrap">
                <article>
                    <div class="art-img-wrap">
                        <img src="media/zooAtlanta.jpg" alt="Zoo Atlanta">
                    </div>
                    <div class="art-cont-wrap">
                        <h3>Zoo Atlanta</h3>
                        <p>Zoo Atlanta, nestled in the heart of Atlanta's historic Grant Park, offers an exhilarating journey into the wild. Home to over 1,000 animals from around the globe, the zoo is renowned for its conservation efforts and engaging experiences. Visitors can marvel at the giant pandas, one of the zoo's star attractions, and immerse themselves in the vibrant landscape of the African savanna, complete with majestic elephants and graceful giraffes. The zoo's commitment to education and wildlife preservation makes every visit not just entertaining but also enlightening. Whether it's a family outing or a solo adventure, Zoo Atlanta promises a day filled with wonder and discovery.</p>
                        </div>
                    <div class="button-wrap">
                        <a class="attraction-button" href="https://zooatlanta.org/" target="_blank">Learn more</a>
                        <a class="res-btn" href="reservations.php?attraction=Zoo%20Atlanta">Make Reservations</a>
                    </div>
                </article>
                <article>
                    <div class="art-img-wrap">
                        <img src="media/Georgia_Aquarium.jpg" alt="Georgia Aquarium">
                    </div>
                    <div class="art-cont-wrap">
                        <h3>Georgia Aquarium</h3>
                        <p>The Georgia Aquarium, a majestic window to the aquatic world, stands as one of Atlanta's most awe-inspiring destinations. As one of the largest aquariums in the world, it offers an unforgettable journey through diverse marine ecosystems. Visitors can explore vast underwater habitats, housing thousands of species including whale sharks, beluga whales, and manta rays. The aquarium's interactive exhibits, such as the touch pools and 4D theater, provide a hands-on experience that delights visitors of all ages. From witnessing the graceful dance of jellyfish to the playful antics of sea otters, the Georgia Aquarium is a testament to the wonders of the ocean and a leader in marine conservation and research.</p>
                    </div>
                    <div class="button-wrap">
                        <a class="attraction-button" href="https://www.georgiaaquarium.org/" target="_blank">Learn more</a>
                        <a class="res-btn" href="reservations.php?attraction=Georgia%20Aquarium">Make Reservations</a>
                    </div>
                </article>
                <article>
                    <div class="art-img-wrap">
                        <img src="media/WorldofCoke.webp" alt="World of Coca-Cola">
                    </div>
                    <div class="art-cont-wrap">
                        <h3>World of Coca-Cola</h3>
                        <p>The World of Coca-Cola offers a fascinating journey into the world of one of the most iconic brands in history. Located in the heart of Atlanta, this multimedia attraction brings to life the storied history and global appeal of Coca-Cola through a series of interactive exhibits and multimedia displays. Visitors can relive nostalgic memories in the retro-themed soda fountain, experience the thrilling 4D theater, and even taste over 100 different beverages from around the world. The highlight for many is the Vault of the Secret Formula, where the legendary secret of Coca-Cola's recipe is tantalizingly housed. A visit to the World of Coca-Cola is not just a trip through the history of a beverage, but a celebration of American culture and innovation.</p>
                    </div>
                    <div class="button-wrap">
                        <a class="attraction-button" href="https://www.worldofcoca-cola.com/" target="_blank">Learn more</a>
                        <a class="res-btn" href="reservations.php?attraction=The%20World%20of%20Coca-Cola">Make Reservations</a>
                    </div>
                </article>
                <article>
                    <div class="art-img-wrap">
                        <img src="media/Thevortex.jpg" alt="The Vortex">
                    </div>
                    <div class="art-cont-wrap">
                        <h3>The Vortex</h3>
                        <p>The Vortex Bar and Grill, situated in the eclectic neighborhood of Little Five Points, stands as an emblem of Atlanta's vibrant culinary scene. Known for its bold flavors and equally bold personality, The Vortex is famous for its creatively topped, award-winning burgers and an extensive selection of beers. Its distinctive skull-shaped entrance is not just an architectural statement but also a portal to a dining experience filled with attitude and flair. The interior's quirky décor and the laid-back ambiance make it a favorite haunt for locals and tourists alike. Beyond its famous burgers, The Vortex offers a range of hearty American fare, ensuring every visit is deliciously unforgettable. A meal at The Vortex isn’t just about great food; it’s about soaking in a piece of Atlanta’s unique character.</p>
                    </div>
                    <div class="button-wrap">
                        <a class="attraction-button" href="https://thevortexatl.com/" target="_blank">Learn more</a>
                        <a class="res-btn" href="reservations.php?attraction=The%20Vortex">Make Reservations</a>
                    </div>
                </article>
            </div>
    </section>
</main>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Function to set equal height
    function setEqualHeight() {
        var articles = document.querySelectorAll('#attractions article');
        var maxHeight = 0;

        // Reset articles to default height to get actual height
        articles.forEach(function(article) {
            article.style.height = 'auto';
        });

        // Find the tallest article
        articles.forEach(function(article) {
            if (article.offsetHeight > maxHeight) {
                maxHeight = article.offsetHeight;
            }
        });

        // Set all articles to the height of the tallest one
        articles.forEach(function(article) {
            article.style.height = maxHeight + 'px';
        });
    }

    // Set equal height on initial load
    setEqualHeight();

    // Set equal height on window resize
    window.addEventListener('resize', setEqualHeight);

    // Smooth scroll for navigation links and jump-btn
    document.querySelectorAll('nav a, .jump-btn').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        var targetId = this.getAttribute('href').split('#')[1]; // Extracts the hash part
        if (targetId) {
            var targetSection = document.querySelector('#' + targetId);

            if (targetSection) {
                targetSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }
    });
});
});

</script>
<?php
require 'includes/footer.php';
?>