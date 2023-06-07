<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
</head>
<body>
    <nav x-data="{ open: false }" class="bg-teal-800 border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <x-application-mark class="block h-9 w-auto" />
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')"
                            class="text-white">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link href="{{ route('books.index') }}" :active="request()->routeIs('books.index')">
                            {{ __('Manage Products') }}
                        </x-nav-link>
                    </div>
                </div>

                <!-- Right Navigation -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <!-- Profile -->
                    <x-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')"
                        class="text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 19l-7-7 7-7" />
                        </svg>
                        {{ __('Profile') }}
                    </x-nav-link>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-nav-link href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="text-white ml-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                            {{ __('Logout') }}
                        </x-nav-link>
                    </form>
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = !open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-white focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Responsive Navigation Links -->
            <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')"
                        class="text-white">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.index')"
                        class="text-white">
                        {{ __('Manage Users') }}
                    </x-nav-link>
                </div>

                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="flex items-center px-4">
                        <div class="text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </div>
                        <div class="ml-2">
                            <x-nav-link href="{{ route('profile.show') }}"
                                :active="request()->routeIs('profile.show')" class="text-white">
                                {{ __('Profile') }}
                            </x-nav-link>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-nav-link href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="text-white ml-4">
                            {{ __('Logout') }}
                        </x-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </nav>




{{-- navv endddd --}}



<div class="py-5">

<div class="flex h-full justify-between items-center">





</div>

</nav>
</div>



<!--Graph Content -->
<div id="main-content" class="w-full flex-1">

<div class="flex flex-1 flex-wrap">

<div class="w-full xl:w-2/3 p-6 xl:max-w-6xl">

    <!--"Container" for the graphs"-->
    <div class="max-w-full lg:max-w-3xl xl:max-w-5xl">

        <!--Graph Card-->
        <div class="border-b p-3">
            <h5 class="font-bold text-black">Graph</h5>
        </div>
        <div class="p-5">
            <div class="ct-chart ct-golden-section" id="chart1"></div>
        </div>
        <!--/Graph Card-->

    </div>

</div>

<div class="w-full xl:w-1/3 p-6 xl:max-w-4xl border-l-1 border-gray-300">

    <!--"Container" for the graphs"-->
    <div class="max-w-sm lg:max-w-3xl xl:max-w-5xl">

        <!--Graph Card-->

        <div class="border-b p-3">
            <h5 class="font-bold text-black">Graph</h5>
        </div>
        <div class="p-5">
            <div class="ct-chart ct-golden-section" id="chart2"></div>
        </div>

        <!--/Graph Card-->

        <!--Graph Card-->
        <div class="border-b p-3">
            <h5 class="font-bold text-black">Graph</h5>
        </div>
        <div class="p-5">
            <div class="ct-chart ct-golden-section" id="chart3"></div>
        </div>

        <!--/Graph Card-->


    </div>

</div>

</div>

</div>

</div>
</div>
<script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
<script>
/* Refer to https://gionkunz.github.io/chartist-js/examples.html for setting up the graphs */

var mainChart = new Chartist.Line('#chart1', {
labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
series: [
[1, 5, 2, 5, 4, 3],
[2, 3, 4, 8, 1, 2],
[5, 4, 3, 2, 1, 0.5]
]
}, {
low: 0,
showArea: true,
showPoint: false,
fullWidth: true
});

mainChart.on('draw', function(data) {
if (data.type === 'line' || data.type === 'area') {
data.element.animate({
    d: {
        begin: 1000 * data.index,
        dur: 1000,
        from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
        to: data.path.clone().stringify(),
        easing: Chartist.Svg.Easing.easeOutQuint
    }
});
}
});

var chartScatter = new Chartist.Line('#chart2', {
labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
series: [
[12, 9, 7, 8, 5, 4, 6, 2, 3, 3, 4, 6],
[4, 5, 3, 7, 3, 5, 5, 3, 4, 4, 5, 5],
[5, 3, 4, 5, 6, 3, 3, 4, 5, 6, 3, 4],
[3, 4, 5, 6, 7, 6, 4, 5, 6, 7, 6, 3]
]
}, {
low: 0
});

chartScatter.on('draw', function(data) {
if (data.type === 'line' || data.type === 'area') {
data.element.animate({
    d: {
        begin: 500 * data.index,
        dur: 1000,
        from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
        to: data.path.clone().stringify(),
        easing: Chartist.Svg.Easing.easeOutQuint
    }
});
}
});

var chartBar = new Chartist.Bar('#chart3', {
labels: ['Q1', 'Q2', 'Q3', 'Q4'],
series: [
[800000, 1200000, 1400000, 1300000],
[200000, 400000, 500000, 300000],
[100000, 200000, 400000, 600000]
]
}, {
stackBars: true,
axisY: {
labelInterpolationFnc: function(value) {
    return (value / 1000) + 'k';
}
}
})

chartBar.on('draw', function(data) {
if (data.type === 'bar') {
data.element.attr({
        style: 'stroke-width: 30px'
    }),
    data.element.animate({
        y2: {
            dur: '0.5s',
            from: data.y1,
            to: data.y2
        }
    });
}
});

var chartPie = new Chartist.Pie('#chart4', {
series: [10, 20, 50, 20, 5, 50, 15],
labels: [1, 2, 3, 4, 5, 6, 7]
}, {
donut: true,
showLabel: true
});

chartPie.on('draw', function(data) {
if (data.type === 'slice') {
var pathLength = data.element._node.getTotalLength();
data.element.attr({
    'stroke-dasharray': pathLength + 'px ' + pathLength + 'px'
});

var animationDefinition = {
    'stroke-dashoffset': {
        id: 'anim' + data.index,
        dur: 200,
        from: -pathLength + 'px',
        to: '0px',
        easing: Chartist.Svg.Easing.easeOutQuint,
        fill: 'freeze'
    }
};

if (data.index !== 0) {
    animationDefinition['stroke-dashoffset'].begin = 'anim' + (data.index - 1) + '.end';
}

data.element.attr({
    'stroke-dashoffset': -pathLength + 'px'
});

data.element.animate(animationDefinition, false);
}
});
</script>

<script>
/*Toggle dropdown list*/
/*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

var userMenuDiv = document.getElementById("userMenu");
var userMenu = document.getElementById("userButton");

document.onclick = check;

function check(e) {
var target = (e && e.target) || (event && event.srcElement);

//User Menu
if (!checkParent(target, userMenuDiv)) {
// click NOT on the menu
if (checkParent(target, userMenu)) {
    // click on the link
    if (userMenuDiv.classList.contains("invisible")) {
        userMenuDiv.classList.remove("invisible");
    } else {
        userMenuDiv.classList.add("invisible");
    }
} else {
    // click both outside link and outside menu, hide menu
    userMenuDiv.classList.add("invisible");
}
}

}

function checkParent(t, elm) {
while (t.parentNode) {
if (t == elm) {
    return true;
}
t = t.parentNode;
}
return false;
}
</script>


</body>
</html>
