<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reservasi</title>
    <link rel="stylesheet" href="tampilan_scan/style.css">
    
    <!-- font awesome icons cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <header class="header">
        <nav class="header--menu">
            <div class="burger--icon">
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="search--box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="searchInput" placeholder="search" />
            </div>
        </nav>
    </header>

    <!-- cover section -->
    <section class="cover" style="background-image: url({{ $galleris[0]->image->getUrl('preview') }})">
        <div class="cover--overlay">
            <h1>{{ $galleris[0]->title }}</h1>
            <span class="slogan">{!! $galleris[0]->description !!}</span>
        </div>
    </section>

    <!-- menu list -->
    <main>
        @yield('carditem')
    </main>
    <script>
        // Search functionality
        const searchInput = document.getElementById('searchInput');

        searchInput.addEventListener('input', () => {
            const searchText = searchInput.value.toLowerCase().trim();

            const cardItems = document.querySelectorAll('.card');

            cardItems.forEach(item => {
                const itemName = item.querySelector('.card--title').textContent.toLowerCase();
                if (itemName.includes(searchText)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });

    </script>
</body>
</html>
