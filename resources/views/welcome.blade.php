<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->

        <style>
            .carousel {
                max-height: 450px; /* Adjust the height as per your requirements */
            }
        </style>


    </head>
    <body class="antialiased  bg-teal-100">
        <div >


            {{-- navbarrrr --}}
<nav class="fixed   top-0 left-0 right-0 z-10 bg-white shadow-md">
    <div class=" navbar bg-base-100 px-4  ">
        <div class="navbar-start">
          <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost lg:hidden">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
            </label>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">

                <ul class="p-2">
                    <li><a>Home</a></li>
                    <li><a> Categories</a></li>
                    <li><a>About Us</a></li>
            </ul>
          </div>
          <a class="text-primary btn btn-ghost normal-case text-xl bg-teal-50">LIVRE .</a>
        </div>
        <div class="navbar-center hidden lg:flex">
          <ul class="menu menu-horizontal px-1 text-primary font-bold text-xl">
            <li><a>Home</a></li>
            <li><a> Categories</a></li>
            <li><a>About Us</a></li>
          </ul>
        </div>

        <div class="navbar-end">

            @if (Route::has('login'))
            <div class>
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-primary hover:text-neutral focus:outline focus:outline-2 focus:rounded-sm focus:outline-secondary">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-primary hover:text-neutral focus:outline focus:outline-2 focus:rounded-sm focus:outline-secondary ">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-primary hover:text-secondary focus:outline focus:outline-2 focus:rounded-sm focus:outline-secondary">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        </div>
      </div>
</nav>

        </div>
{{-- carousal --}}
<div class="carousel w-full mt-24 h-full ">
    <div id="slide1" class="carousel-item relative w-full">
        <img src="https://images.ctfassets.net/usf1vwtuqyxm/5pIAH3yVpI2oNyXJeesr8V/e715826ead9f4170a9d66e0c6e207330/HP_box_landscape.jpg?fm=jpg&q=70&w=2560" class="w-full h-full object-cover" />
        <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
            <a href="#slide4" class="btn btn-circle">❮</a>
            <a href="#slide2" class="btn btn-circle">❯</a>
        </div>
    </div>
    <div id="slide2" class="carousel-item relative w-full ">
        <img src="https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fstatic.onecms.io%2Fwp-content%2Fuploads%2Fsites%2F6%2F2016%2F09%2Fharry-potter-covers-2000.jpg" class="w-full h-full object-cover" />
        <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
            <a href="#slide1" class="btn btn-circle">❮</a>
            <a href="#slide3" class="btn btn-circle">❯</a>
        </div>
    </div>
    <div id="slide3" class="carousel-item relative w-full">
        <img src="https://media.npr.org/assets/img/2022/06/27/book-covers-2022_wide-2f31fc85b4cf63fed4b26f8fadd218106acd01d3.jpg" class="w-full h-full object-cover" />
        <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
            <a href="#slide2" class="btn btn-circle">❮</a>
            <a href="#slide4" class="btn btn-circle">❯</a>
        </div>
    </div>
    <div id="slide4" class="carousel-item relative w-full">
        <img src="https://schoolreadinglist.co.uk/wp-content/uploads/2022/12/books-for-year-5-l.jpg" class="w-full h-full object-cover" />
        <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
            <a href="#slide3" class="btn btn-circle">❮</a>
            <a href="#slide1" class="btn btn-circle">❯</a>
        </div>
    </div>
</div>

<div class="border-t-4 border-primary  m-28">
    <h1 class="text-2xl text-neutral">View All Books</h1>
</div>

{{-- cardsssss --}}

<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 py-10 ">
    @foreach ($books as $book)
        <div class="card w-96 shadow-xl bg-base-100" >
            <figure>
                <img class="w-full h-64 object-cover" src="{{ asset('storage/' . $book->image) }}" alt="Book Image" />
            </figure>
            <div class="card-body">
                <h2 class="card-title">{{ $book->name }}</h2>
                <p>LKR:{{ $book->price }}.00</p>
                <div class="card-actions justify-end">
                    <button class="btn btn-primary">Buy Now</button>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="border-t-4 border-primary  m-28">
    <h1 class="text-2xl text-neutral">Favourite Authors</h1>
</div>
{{-- authorss cardsss --}}
<div class="card card-side bg-base-100 shadow-xl mx-10 ">
    <figure><img src="https://www.telegraph.co.uk/content/dam/women/2021/12/31/TELEMMGLPICT000281656971_trans_NvBQzQNjv4BqmMet6gJxxKTw9P67GxPywPxldIMI_Aa3q72_an6MGFw.jpeg?imwidth=680" alt="Movie"/></figure>
    <div class="card-body">
      <h2 class="card-title">J.K.Rowlings</h2>
      <p>J.K. Rowling, born on July 31, 1965, is a British author best known for creating the immensely popular Harry Potter fantasy series. Rowling's journey to success was not without challenges. Before achieving literary fame, she faced personal struggles and financial difficulties. However, her perseverance and passion for storytelling led to the creation of the magical world of Harry Potter.</p>
      <div class="card-actions justify-end">
        <button class="btn btn-primary">browse</button>
      </div>
    </div>
  </div>
  <div class="card card-side bg-base-100 shadow-xl mx-10 mt-10">
    <figure><img src="https://s.yimg.com/ny/api/res/1.2/4AcnnWquCDdyMmmzXTucUQ--/YXBwaWQ9aGlnaGxhbmRlcjt3PTY0MDtoPTQyNw--/https://media.zenfs.com/en/entertainment_weekly_785/effb632177e875ca197d52f4958ee71a" alt="Movie"/></figure>
    <div class="card-body">
      <h2 class="card-title">Stephen King</h2>
      <p>Stephen King, born on September 21, 1947, is an American author known as the "Master of Horror." He has a remarkable ability to captivate readers with his chilling and suspenseful storytelling. King's extensive body of work spans multiple genres, including horror, supernatural fiction, suspense, and fantasy.</p>
      <div class="card-actions justify-end">
        <button class="btn btn-primary">browse</button>
      </div>
    </div>
  </div>
{{-- get starteddddd --}}
  <div class="border-t-4 border-primary  m-28">

        <h1 class="text-2xl text-neutral">Get Started</h1>


</div>
<div class="hero min-h-screen" style="background-image: url(https://img.freepik.com/premium-vector/girl-is-sitting-reading-book_101980-3.jpg?w=2000);">
    <div class="hero-overlay "></div>
    <div class="hero-content text-center text-neutral-content">
      <div class="max-w-md">
        <h1 class="mb-5 text-5xl font-bold">Hello there</h1>
        <p class="mb-5">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
        <a href="/register">
        <button class="btn btn-primary">Get Started</button>
    </a>
      </div>
    </div>
  </div>
{{-- footerrrrrr --}}

<footer class="footer p-10 bg-base-100 text-base-content">
    <div>
      <span class="footer-title">Categories</span>
      <a class="link link-hover">Fiction</a>
      <a class="link link-hover">Non-fiction</a>
      <a class="link link-hover">Children's Books</a>
      <a class="link link-hover">Self-help</a>
    </div>
    <div>
      <span class="footer-title">About Us</span>
      <a class="link link-hover">Our Story</a>
      <a class="link link-hover">Contact</a>
      <a class="link link-hover">Careers</a>
      <a class="link link-hover">Press Kit</a>
    </div>
    <div>
      <span class="footer-title">Policies</span>
      <a class="link link-hover">Shipping & Delivery</a>
      <a class="link link-hover">Returns & Exchanges</a>
      <a class="link link-hover">Privacy Policy</a>
      <a class="link link-hover">Terms & Conditions</a>
    </div>
    <div>
      <span class="footer-title">Newsletter</span>
      <div class="form-control w-80">
        <form action="{{ route('subscribe') }}" method="POST">
          @csrf
          <label class="label">
            <span class="label-text">Enter your email address</span>
          </label>
          <div class="relative">
            <input type="email" name="email" placeholder="username@site.com" class="input input-bordered w-full pr-16" />
            <button type="submit" class="btn btn-primary absolute top-0 right-0 rounded-l-none">Subscribe</button>
          </div>
        </form>
      </div>
    </div>
  </footer>


    </body>

</html>

